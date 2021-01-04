const entryEl = document.querySelectorAll('[data-product-id]');
const product_ids = Array.from(entryEl).map(
                        item => item.dataset.productId
                    );

const entryEl2 = document.querySelectorAll('[data-product-code]');
const productCodes = Array.from(entryEl2).map(
                        item => item.dataset.productCode
                    );

//putting products ids and product codes in one object
var ids = product_ids;
var codes = productCodes;
var ids_codes = {};
ids.forEach((key, i) => ids_codes[key] = codes[i]);
console.log(ids_codes);

function getId(object, value) {
    return Object.keys(object).find(key => object[key] === value);
}
// console.log(getId(ids_codes, 'product one'));

const search_list = document.getElementById('code_list');
function setSearchList(group) {
    clearSearchList();
    for (const productCode of group) {
        let i = 0;
        //creating list item
        const item = document.createElement('li');
        item.classList.add('list-group-item');

        //creating anchor item
        const anchor = document.createElement('a');
        anchor.href = `/product/show/${getId(ids_codes, productCode)}`;
        anchor.style.cssText = "cursor: pointer; text-decoration:none; color: black";
        item.appendChild(anchor);

        const text = document.createTextNode(productCode);
        anchor.appendChild(text);
        search_list.appendChild(item);
        i++;
    }
    if (group.length === 0) {
        noResults();
    }
}

function clearSearchList() {
    while (search_list.firstChild) {
        search_list.removeChild(search_list.firstChild);
    }
}

function noResults() {
    const item = document.createElement('li');
    item.classList.add('list-group-item');
    const text = document.createTextNode('No such code...');
    item.appendChild(text);
    search_list.appendChild(item);
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
        setSearchList(productCodes.filter(productCode => {
            return productCode.includes(value);
        }).sort((productCodeA, productCodeB) => {
            return getRelevancy(productCodeB, value) - getRelevancy(productCodeA, value);
        }));
    } else {
        clearSearchList();
    }
});