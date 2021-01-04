//getting product names from twig file
const entryElements = document.querySelectorAll('[data-product-name]');
const productNames = Array.from(entryElements).map(
                        item => item.dataset.productName
                    );

//getting product ids from twig file
const entryElements2 = document.querySelectorAll('[data-product-id]');
const productIds = Array.from(entryElements2).map(
                        item => item.dataset.productId
                    );

//putting products ids and product names in one object
var keys = productIds;
var values = productNames;
var result = {};
keys.forEach((key, i) => result[key] = values[i]);

//getting ids by passing the product's name so i can set the route when the user presses the search result
function getKeyByValue(object, value) {
    return Object.keys(object).find(key => object[key] === value);
}
// console.log(getKeyByValue(result, 'product One'));

const list = document.getElementById('list');
function setList(group) {
    clearList();
    for (const productName of group) {
        //creating list item
        const item = document.createElement('li');
        item.classList.add('list-group-item');
        //creating anchor item
        // console.log(getKeyByValue(result, productName));
        const anchor = document.createElement('a');
        anchor.href = `/product/show/${getKeyByValue(result, productName)}`;
        anchor.style.cssText = "cursor: pointer; text-decoration:none; color: black";
        item.appendChild(anchor);
        
        const text = document.createTextNode(productName);
        anchor.appendChild(text);
        list.appendChild(item);
    }
    if (group.length === 0) {
        setNoResults();
    }
}

function clearList() {
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }
}

function setNoResults() {
    const item = document.createElement('li');
    item.classList.add('list-group-item');
    const text = document.createTextNode('No such name...');
    item.appendChild(text);
    list.appendChild(item);
}

function getRelevancy(value, searchTerm) {
    if (value === searchTerm) {
        return 2;
    } else if (value.startsWith(searchTerm)) {
        return 1;
    } else if (value.includes(searchTerm)) {
        return 0;
    } else {
        return -1;
    }
}

searchInput = document.getElementById('search');

searchInput.addEventListener('input', (event) => {
    let value = event.target.value;
    if (value && value.trim().length > 0) {
        value = value.trim().toLowerCase();
        setList(productNames.filter(productName => {
            return productName.includes(value);
        }).sort((productNameA, productNameB) => {
            return getRelevancy(productNameB, value) - getRelevancy(productNameA, value);
        }));
    } else {
        clearList();
    }
});