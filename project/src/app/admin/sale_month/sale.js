var sale = [];

function renderSale(data) {
    document.getElementById("sale-list").innerHTML = '';
    data.forEach((product, i) => {
        document.getElementById("sale-list").innerHTML += `
        <tr>
            <td>${i + 1}</td>
            <td>${product.name}</td>
            <td>${product.total_sale}</td>
            <td>${formatNumber(product.price * product.total_sale, '.', ',')}đ</td>
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
    document.getElementById("month").innerHTML = `Số lượng bán ra trong tháng ${new Date().getMonth() + 1}`
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            sale = JSON.parse(this.responseText);
            renderSale(sale);
        }
    };
    xhttp.open("GET", "https://5d725e295acf5e0014730dd9.mockapi.io/api/v2/Movies", true);
    xhttp.send();
})();

function onSort() {
    sale.sort((a, b) => { return (b.price * b.total_sale) - (a.price * a.total_sale) });
    renderSale(sale);
}