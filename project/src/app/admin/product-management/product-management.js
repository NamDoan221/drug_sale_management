var products = [];

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
            <td>${product.name} vnd</td>
            <td>${formatNumber(product.price, '.', ',')}đ</td>
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