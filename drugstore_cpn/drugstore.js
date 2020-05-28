var products_cart = [];
(async function getProducts() {
    let data = await (await fetch('./product.json').catch(handleErr)).json();
    if (data.code && data.code === 404) {
        return;
    }
    console.log(data.products);
    const products_list = document.getElementById('products_list')
    data.products.forEach((product, i) => {
        products_list.innerHTML += `<div class="col-xl-3 col-md-4 col-sm-6 mt-5">
        <div class="card">
            <img src="${product.image}" class="card-img-top"
                alt="${product.name}">
            <div class="card-body">
                <h5 class="card-title">${product.name}</h5>
                <p class="card-text">${product.description}</p>
                <p class="card-text">${product.price}</p>
                <button type="button" class="btn btn-info" id="${i}">Add to cart</button>
            </div>
        </div>
    </div>`
        document.getElementById(`${i}`).addEventListener('click', function() {
            console.log(i);
            addToCart(product);
        })
    });
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

function addToCart(product) {
    products_cart.push(product);
    console.log(products_cart);
}

