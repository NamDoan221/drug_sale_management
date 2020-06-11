var carts = JSON.parse(localStorage.getItem("cart"));
var product;
let modal = document.querySelector(".modal");

(function loadProductDetail() {
    let product_detail_item = JSON.parse(sessionStorage.getItem("product_detail_item"));
    if (!product_detail_item) {
        return window.location.href = "../drugstore_cpn/drugstore.html";
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            product = JSON.parse(this.responseText);
            window.document.title = `${product.name} detail`;
            document.getElementById("product-detail").innerHTML =
                `<div class="product-img">
                    <img src="${product.image}" class="card-img-top img-card"
                    alt="${product.name}">
                </div>
                <div class="product-content">
                    <div class="product-perform">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text card-description">${product.description}</p>
                        <p class="card-text text-danger">${product.price} vnd</p>
                    </div>
                    <div class="product-action">
                        <button type="button" class="btn btn-info" onclick="addToCart('${product.id}')">Add to cart</button>
                        <button type="button" class="btn btn-danger" onclick="goToStore()">Go Back Store</button>
                    </div>
                </div>`;
        }
    };
    xhttp.open("GET", `https://5d725e295acf5e0014730dd9.mockapi.io/api/v2/Students/${product_detail_item}`, true);
    xhttp.send();
    loadMessCart();
})();

function loadMessCart() {
    if (!carts || carts.length === 0) {
        return (document.getElementById("cart_mess").style.display = "none");
    }
    document.getElementById("cart_mess").style.display = "inline-block";
}

function renderCart() {
    modal.style.display = "block";
    let total_bill = 0;
    if (!carts || carts.length === 0) {
        document.getElementById("total_bill").innerHTML = `${total_bill}$`;
        return (document.getElementById("cart_item").innerHTML = `<p class="card-text">Không có sản phẩm nào!</p>`);
    }
    document.getElementById("cart_item").innerHTML = "";
    carts.forEach((item) => {
        document.getElementById("cart_item").innerHTML += `<div class="modal-footer" style="display: flex;align-items: center;">
            <img src="${item.image}" id="card-img" style="width:100px;height:70px;border-radius:5px;" />
            <span class="card-text ml-3" style="font-size:16px;width:300px">${item.name}</span>
            <span class="card-text" style="margin:0 auto">đ${item.price}</span>
            <div class="btn-group mr-2" role="group" aria-label="First group" style="background-color:#fff">
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;" onclick="countMinus('${item.id}')">-</button>
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;">${item.amount}</button>
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;" onclick="countAdd('${item.id}')">+</button>
            </div>
            <span class="card-text" style="color:red;margin:0px 40px">đ${item.price * item.amount}</span>
            <button type="button" class="btn btn-primary ml-auto" onclick="deleteFromCart('${item.id}')">Xóa</button>
        </div>`;
        total_bill += item.price * item.amount;
    });
    document.getElementById("total_bill").innerHTML = `${total_bill}$`;
}

function goToStore() {
    window.location.href = "../drugstore_cpn/drugstore.html";
}

class item_cart {
    constructor(id, image, name, price, description, amount) {
        this.id = id;
        this.image = image;
        this.name = name;
        this.price = price;
        this.description = description;
        this.amount = amount;
    }
}

function addToCart(product_id) {
    if (!carts) {
        carts = [];
        carts.push(new item_cart(product.id, product.image, product.name, product.price, product.description, 1));
    } else {
        let isHas = false;
        carts.forEach(item => {
            if (item.id === product_id) {
                item.amount++;
                isHas = true;
                return;
            }
        })
        if (!isHas) {
            carts.push(new item_cart(product.id, product.image, product.name, product.price, product.description, 1));
        }
    }
    localStorage.setItem("cart", JSON.stringify(carts));
    loadMessCart();
}

function countAdd(item_id) {
    carts.forEach((product) => {
        if (product.id === item_id) {
            product.amount++;
        }
    });
    localStorage.setItem("cart", JSON.stringify(carts));
    renderCart();
    loadMessCart();
}

function countMinus(item_id) {
    carts.forEach((product, i) => {
        if (product.id === item_id) {
            product.amount--;
            if (product.amount === 0) {
                carts.splice(i, 1);
            }
        }
    });
    localStorage.setItem("cart", JSON.stringify(carts));
    renderCart();
    loadMessCart();
}

function deleteFromCart(product_id) {
    carts.forEach((product, i) => {
        if (product.id === product_id) {
            carts.splice(i, 1);
        }
    });
    localStorage.setItem("cart", JSON.stringify(carts));
    renderCart();
    loadMessCart();
}

//Modal
function closeModal() {
    modal.style.display = "none";
}
window.onclick = function (e) {
    if (e.target == modal) {
        modal.style.display = "none";
    }
}