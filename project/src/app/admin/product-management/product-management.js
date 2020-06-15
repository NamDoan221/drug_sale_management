var products = [];
let modal = document.querySelector(".modal");

function renderProduct(data) {
    document.getElementById("products-list").innerHTML = '';
    data.forEach((product, i) => {
        document.getElementById("products-list").innerHTML += `
        <tr>
            <td>${i + 1}</td>
            <td>
                <img src="${product.image}" class="img"
                alt="${product.name}" width=40>
            </td>
            <td>${product.name}</td>
            <td>${formatNumber(product.price, '.', ',')}đ</td>
            <td>${Math.floor(Math.random() * 10000)}</td>
            <td>
                <button type="button" class="btn btn-add" onclick="updateProduct('${product.id}')">Sửa</button>
                <button type="button" class="btn btn-detail" onclick="deleteProduct('${product.id}')">Xóa</button>
            </td>
        </tr>`;
    });
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

function removeAccents(str) {
    return str.normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/đ/g, 'd').replace(/Đ/g, 'D');;
}

function searchProduct() {
    let key_search = document.getElementById("search").value;
    document.getElementById("products-list").innerHTML = "";
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

function onSort(value) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            renderProduct(products);
        }
    };
    xhttp.open("GET", `https://5d725e295acf5e0014730dd9.mockapi.io/api/v2/Students?sortBy=${value}`, true);
    xhttp.send();
}

function addProduct() {
    document.getElementById("action-name").innerHTML = "Thêm sản phẩm";
    document.getElementById("modal-input").innerHTML = `
    <label for="image">Link ảnh</label>
    <input type="text" id="image" name="image" placeholder="Link ảnh...">

    <label for="name">Tên thuốc</label>
    <input type="text" id="name" name="name" placeholder="Tên thuốc...">

    <label for="price">Giá thuốc</label>
    <input type="text" id="price" name="price" placeholder="Giá thuốc...">

    <label for="inventory">Số lượng tồn kho</label>
    <input type="text" id="inventory" name="inventory" placeholder="Số lượng tồn kho...">`;
    modal.style.display = "block";
}

function updateProduct(value) {
    document.getElementById("action-name").innerHTML = "Sửa sản phẩm";
    products.forEach((product) => {
        if (product.id === value) {
            return document.getElementById("modal-input").innerHTML = `
            <label for="image">Link ảnh</label>
            <input type="text" id="image" name="image" value="${product.image}" placeholder="Link ảnh...">
        
            <label for="name">Tên thuốc</label>
            <input type="text" id="name" name="name" value="${product.name}" placeholder="Tên thuốc...">
        
            <label for="price">Giá thuốc</label>
            <input type="text" id="price" name="price" value="${formatNumber(product.price, '.', ',')}" placeholder="Giá thuốc...">
        
            <label for="inventory">Số lượng tồn kho</label>
            <input type="text" id="inventory" name="inventory" value="${Math.floor(Math.random() * 10000)}" placeholder="Số lượng tồn kho...">`;
        }
    });
    modal.style.display = "block";
}

function deleteProduct(value) {
    alert("Tính năng tạm thời bị khóa!");
}

function onSave() {
    alert("Tính năng tạm thời bị khóa!");
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