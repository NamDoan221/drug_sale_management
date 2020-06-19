var products = [];
var carts = JSON.parse(localStorage.getItem("cart"));
let modal = document.querySelector(".modal");

function renderProduct(data) {
    data.forEach((product) => {
        document.getElementById("products_list").innerHTML += `
            <div class="col">
                <div class="card">
                    <img src="${product.image}" class="img-card"
                    alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-description">${product.description}</p>
                        <p class="card-price">${formatNumber(product.price, '.', ',')}đ</p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-add" onclick="addToCart('${product.id}')">Thêm vào giỏ</button>
                        <button type="button" class="btn btn-detail" onclick="goToDetail('${product.id}')">Chi tiết</button>
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

function onLogout() {
    const confirmResult = confirm("Bạn muốn đăng xuất?");
    if (!confirmResult) {
        return;
    }
    localStorage.removeItem("loginStatus");
    location.reload();
}

(function loadUser() {
    let user = JSON.parse(localStorage.getItem("loginStatus"));
    if (!user) {
        return;
    }
    document.getElementById("user_img").innerHTML = `
        <img src="${user.user_image}" alt="" width="40px" height="40px" style="border-radius: 50%;">
            <ul class="user-action">
                <li class="item-action" onclick="onLogout()" style="padding: 5px;">
                    <i class="fa fa-power-off" style="padding-right: 5px;"></i>
                    Đăng xuất
                </li>
            </ul>`;
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
    modal.style.display = "block";
    let total_bill = 0;
    if (!carts || carts.length === 0) {
        document.getElementById("total_bill").innerHTML = `${total_bill}đ`;
        return (document.getElementById("cart_item").innerHTML = `<p class="card-text">Không có sản phẩm nào!</p>`);
    }
    document.getElementById("cart_item").innerHTML = "";
    carts.forEach((item) => {
        document.getElementById("cart_item").innerHTML += `
            <div class="item">
                <img src="${item.image}" class="item-img" />
                <span class="item-name">${item.name}</span>
                <span class="item-price">${formatNumber(item.price, '.', ',')}đ</span>
                <div class="btn-group" role="group" aria-label="First group" style="background-color:#fff">
                    <button type="button" class="btn-item" onclick="countMinus('${item.id}')">-</button>
                    <button type="button" class="btn-item" >${item.amount}</button>
                    <button type="button" class="btn-item" onclick="countAdd('${item.id}')">+</button>
                </div>
                <span class="item-total">${formatNumber((item.price * item.amount), '.', ',')}đ</span>
                <button type="button" class="btn-action" onclick="deleteFromCart('${item.id}')">Xóa</button>
            </div>`;
        total_bill += item.price * item.amount;
    });
    document.getElementById("total_bill").innerHTML = `${formatNumber(total_bill, '.', ',')}đ`;
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
    location.assign("../product_detail_cpn/product-detail.html");
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

function onPay() {
    let user = JSON.parse(localStorage.getItem("loginStatus"));
    if (!user) {
        return alert("Vui lòng đăng nhập để thực hiện thanh toán!");
    }
    alert("Tính năng tạm thời bị khóa!");
}