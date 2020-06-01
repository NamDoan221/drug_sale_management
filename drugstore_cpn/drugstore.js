var products = [];
var carts = JSON.parse(localStorage.getItem('cart'));
function renderProduct(data) {
    data.forEach((product) => {
        document.getElementById('products_list').innerHTML += `
            <div class="col-xl-3 col-md-4 col-sm-6 mt-5">
                <div class="card">
                    <img src="${product.image}" class="card-img-top"
                    alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.description}</p>
                        <p class="card-text">${product.price}$</p>
                        <button type="button" class="btn btn-info" onclick="addToCart('${product.name}')">Add to cart</button>
                    </div>
                </div>
            </div>`;
    });
    loadMessCart();
}

(async function getProducts() {
    let data = await (await fetch('./product.json').catch(handleErr)).json();
    if (data.code && data.code === 404) {
        return;
    }
    products = data.products;
    renderProduct(products);
})();

function handleErr(err) {
    let resp = new Response(
        JSON.stringify({
            code: 404,
            message: "Stupid network Error"
        })
    );
    return resp;
}

function loadMessCart() {
    if (!carts || carts.length === 0) {
        return document.getElementById('cart_mess').style.display = 'none';
    }
    document.getElementById('cart_mess').style.display = 'inline-block';
}

function addToCart(product_name) {
    products.forEach(product => {
        if (product.name === product_name) {
            if (!carts) {
                carts = [];
                carts.push(product);
            } else {
                carts.push(product);
            }
        }
    });
    localStorage.setItem('cart', JSON.stringify(carts));
    loadMessCart();
}


function renderCart() {
    let total_bill = 0;
    if (!carts || carts.length === 0) {
        document.getElementById('total_bill').innerHTML = `${total_bill}$`;
        return document.getElementById('cart_item').innerHTML = `<p class="card-text">Không có sản phẩm nào!</p>`;
    }
    document.getElementById('cart_item').innerHTML = '';
    carts.forEach((item) => {
        document.getElementById('cart_item').innerHTML +=
            `<div class="modal-footer">
                <span class="card-text">${item.name}</span>
                <button type="button" class="btn btn-primary ml-auto" onclick="deleteFromCart('${item.name}')">Xóa</button>
            </div>`;
        total_bill += item.price;
    });
    document.getElementById('total_bill').innerHTML = `${total_bill}$`;
}

function deleteFromCart(product_name) {
    carts.forEach( (product,i) => {
        if(product.name === product_name) {
            carts.splice(i, 1);
        }
    });
    localStorage.setItem('cart', JSON.stringify(carts));
    renderCart();
    loadMessCart();
}

function removeAccents(str) {
    return str.normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '');
}

function searchProduct() {
    let key_search = document.getElementById('search').value;
    document.getElementById('products_list').innerHTML = '';
    if (key_search === '') {
        renderProduct(products);
        return;
    }
    var products_search = products.filter(item =>
        this.removeAccents(item.name).toLowerCase().indexOf(this.removeAccents(key_search).toLowerCase()) > -1);
    renderProduct(products_search);
}