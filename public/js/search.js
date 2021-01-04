const entryElements = document.querySelectorAll('[data-product-name]');
const productNames = Array.from(entryElements).map(
                        item => item.dataset.productName
                    );
console.log(productNames);

const entryElements2 = document.querySelectorAll('[data-product-id]');
const productIds = Array.from(entryElements2).map(
                        item => item.dataset.productId
                    );
console.log(productIds);

//putting products ids and product names in one object
var keys = productIds;
var values = productNames;
var result = {};
keys.forEach((key, i) => result[key] = values[i]);

function getKeyByValue(object, value) {
    return Object.keys(object).find(key => object[key] === value);
}

const list = document.getElementById('list');
function setList(group) {
    clearList();
    for (const product of group) {
        // console.log(product);
        let i = 0;
        //creating list item
        const item = document.createElement('li');
        item.classList.add('list-group-item');

        //creating anchor item
        const anchor = document.createElement('a');
        anchor.href = `/product/show/${getKeyByValue(result, product)}`;
        anchor.style.cssText = "cursor: pointer; text-decoration:none; color: black";
        item.appendChild(anchor);

        const text = document.createTextNode(product);
        anchor.appendChild(text);
        list.appendChild(item);
        i++;
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
    const text = document.createTextNode('No results found');
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
        setList(productNames.filter(product => {
            return product.includes(value);
        }).sort((productA, productB) => {
            return getRelevancy(productB, value) - getRelevancy(productA, value);
        }));
    } else {
        clearList();
    }
});