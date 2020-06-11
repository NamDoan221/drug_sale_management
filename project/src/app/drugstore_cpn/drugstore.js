var products = [];
var carts = JSON.parse(localStorage.getItem("cart"));
function renderProduct(data) {
    data.forEach((product) => {
        document.getElementById("products_list").innerHTML += `
            <div class="col-xl-3 col-md-4 col-sm-6 mt-5">
                <div class="card">
                    <img src="${product.image}" class="card-img-top img-card"
                    alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text card-description">${product.description}</p>
                        <p class="card-text text-danger">${formatNumber(product.price, '.', ',')}đ</p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-info" onclick="addToCart('${product.id}')">Add to cart</button>
                        <button type="button" class="btn btn-danger" onclick="goToDetail('${product.id}')">View Detail</button>
                    </div>
                </div>
            </div>`;
    });
    loadMessCart();
}

function formatNumber(nStr, decSeperate, groupSeperate) {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}

(function loadUser() {
    let user = JSON.parse(localStorage.getItem("loginStatus"));
    console.log(user);
    document.getElementById("user_img").innerHTML = `<img src="${user.user_image}" alt="" width="40px" height="40px" style="border-radius: 50%;">`
})();

(function loadProducts() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            renderProduct(products);
        }
    };
    xhttp.open("GET", "https://5d725e295acf5e0014730dd9.mockapi.io/api/v2/Students", true);
    xhttp.send();
})();

function loadMessCart() {
    if (!carts || carts.length === 0) {
        return (document.getElementById("cart_mess").style.display = "none");
    }
    document.getElementById("cart_mess").style.display = "inline-block";
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
    products.forEach((product) => {
        if (product.id === product_id) {
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
        }
    });
    localStorage.setItem("cart", JSON.stringify(carts));
    loadMessCart();
}

function renderCart() {
    let total_bill = 0;
    if (!carts || carts.length === 0) {
        document.getElementById("total_bill").innerHTML = `${total_bill}$`;
        return (document.getElementById("cart_item").innerHTML = `<p class="card-text">Không có sản phẩm nào!</p>`);
    }
    document.getElementById("cart_item").innerHTML = "";
    carts.forEach((item) => {
        document.getElementById("cart_item").innerHTML += `<div class="modal-footer">
            <img src="${item.image}" id="card-img" style="width:100px;height:70px;border-radius:5px;" />
            <span class="card-text ml-3" style="font-size:16px;width:300px">${item.name}</span>
            <span class="card-text" style="margin:0 auto">${item.price}đ</span>
            <div class="btn-group mr-2" role="group" aria-label="First group" style="background-color:#fff">
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;" onclick="countMinus('${item.id}')">-</button>
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;">${item.amount}</button>
                <button type="button" class="btn btn-secondary" style="background-color:#fff;color:#000;border-color: #ddd;" onclick="countAdd('${item.id}')">+</button>
            </div>
            <span class="card-text" style="color:red;margin:0px 40px">${item.price * item.amount}đ</span>
            <button type="button" class="btn btn-primary ml-auto" onclick="deleteFromCart('${item.id}')">Xóa</button>
        </div>`;
        total_bill += item.price * item.amount;
    });
    document.getElementById("total_bill").innerHTML = `${total_bill}đ`;
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

function removeAccents(str) {
    return str.normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/đ/g, 'd').replace(/Đ/g, 'D');;
}

function searchProduct() {
    let key_search = document.getElementById("search").value;
    document.getElementById("products_list").innerHTML = "";
    if (key_search === "") {
        renderProduct(products);
        return;
    }
    let products_search = products.filter((item) =>
        this.removeAccents(item.name)
            .toLowerCase()
            .indexOf(this.removeAccents(key_search).toLowerCase()) > -1
    );
    renderProduct(products_search);
}

function goToDetail(product_id) {
    sessionStorage.setItem("product_detail_item", JSON.stringify(product_id));
    window.location.href = "../product_detail_cpn/product-detail.html";
}