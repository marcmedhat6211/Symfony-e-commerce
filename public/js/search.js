const entryElements = document.querySelectorAll('[data-product-name]');
const productNames = Array.from(entryElements).map(
                        item => item.dataset.productName
                    );

const list = document.getElementById('list');
function setList(group) {
    clearList();
    for (const product of group) {
        const item = document.createElement('li');
        item.classList.add('list-group-item');
        const text = document.createTextNode(product);
        item.appendChild(text);
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