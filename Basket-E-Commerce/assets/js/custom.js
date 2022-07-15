var increments = [];
var decrements = [];

// Amount 
var amount = document.getElementById("totalAmount");
amount.innerText = getAmount();
// badge
var badge = document.getElementById("sebetBadge");
badge.innerText = getProductCount();
function getProductCount() {
    let productCount = 0;
    if (localStorage.getItem("products")) {
        products = JSON.parse(localStorage.getItem("products"));
        products.forEach(x => {
            productCount += Number(x.count);
        })
    }
    return productCount;
}
var body = document.body;
// MOdal Acma Duymesi
var sebet = document.querySelector(".fa-shopping-cart");
// Modal
var modal = document.querySelector(".modal");
// Modal Baglama Duymesi
var close = document.querySelector(".close");
// Modal Acilsin
sebet.addEventListener("click", function (e) {

    modal.style.display = "block";

    body.style.overflow = "hidden";
    amount.innerText = getAmount();
    body.style.height = "100vh";

    modal.classList = "modal animate__animated animate__rollIn";

    //Check Product
    modalList.innerHTML = `
   <li>
                   <span>IMG</span>
                   <span>Name</span>
                   <span>Price</span>
                   <span>Count</span>
                   <span>Total</span>
               </li>
   `;
    if (localStorage.getItem("products")) {
        let products = JSON.parse(localStorage.getItem("products"));

        products.forEach(product => {
            const html =
                `
                   <li data-id="${product.id}">
                       <span>
                           <img src="${product.src}" alt="">
                       </span>
                       <span>${product.name}</span>
                       <span><b>${product.price}</b> <i>$</i></span>
                       <span> <i class="decrement">-</i><b>${product.count}</b><i class="increment">+</i></span>
                       <span><b>${product.count * product.price}</b> <i>$</i></span>
                   </li>
               `;
            modalList.innerHTML += html;
        })
    }
    document.querySelectorAll("i.increment").forEach(i => {
        increments.push(i);
    });
    document.querySelectorAll("i.decrement").forEach(i => {
        decrements.push(i);
    });
    increments.forEach(increment => {
        increment.addEventListener("click", function (e) {
            const id = e.target.parentElement.parentElement.getAttribute("data-id");
            let prd;
            let products = JSON.parse(localStorage.getItem("products"));
            products.forEach(x => {
                if (x.id == id) {
                    prd = x;
                }
            })
            prd.count++;
            localStorage.setItem("products", JSON.stringify(products));
            sebet.click();
        })
    })
    decrements.forEach(decrement => {
        decrement.addEventListener("click", function (e) {
            const id = e.target.parentElement.parentElement.getAttribute("data-id");
            let prd;
            let products = JSON.parse(localStorage.getItem("products"));
            products.forEach(x => {
                if (x.id == id) {
                    prd = x;
                }
            })
            if (prd.count > 1) {
                prd.count--;
            } else if (prd.count == 1) {
                var index = 0;
                for (let i = 0; i < products.length; i++) {
                    if (products[i].id == id) {
                        products.splice(i, 1);
                    }
                }

            }
            localStorage.setItem("products", JSON.stringify(products));
            sebet.click();
        })
    })
});
// Modal Baglansin
close.addEventListener("click", function (e) {
    modal.classList = "modal animate__animated animate__rollOut";
    badge.innerText = getProductCount();
    body.style.overflow = "auto";
    body.style.height = "auto";
    increments = [];
    decrements = [];
    backtotop.click();
    setTimeout(() => {
        modal.style.display = "none";
    }, 1500);
});
// Backtotop
var backtotop = document.getElementById("backtotop");
backtotop.addEventListener("mouseover", function (e) {
    e.preventDefault();
});
// AddToCard
var addtocardbtns = document.querySelectorAll(".card-footer button");
var modalList = document.getElementById("modal-list");
addtocardbtns.forEach(addtocardbtn => {
    addtocardbtn.addEventListener("click", function (e) {
        const btnId = e.target.id;
        const imageSrc = addtocardbtn.parentElement.previousElementSibling.children[0].src;
        const productName = addtocardbtn.parentElement.previousElementSibling.previousElementSibling.children[0].innerText;
        const price = parseInt(addtocardbtn.parentElement.previousElementSibling.previousElementSibling.children[1].children[1].innerText);
        let product;
        let products;
        var isAdd = false;
        if (!localStorage.getItem("products")) {
            products = [];
            count = 1;
            product = {
                id: btnId,
                name: productName,
                src: imageSrc,
                count: count,
                price: price
            };
            isAdd = true;
        } else {
            var hasProduct = false;
            products = JSON.parse(localStorage.getItem("products"));
            products.forEach(x => {
                if (x.id == btnId) {
                    hasProduct = true;
                    product = x;
                    return;
                }
            })
            if (!hasProduct) {
                count = 1;
                product = {
                    id: btnId,
                    name: productName,
                    src: imageSrc,
                    count: count,
                    price: price
                };
                isAdd = true;
            } else {
                product.count++;
            }
        }
        if (isAdd) {
            products.push(product);
        }
        localStorage.setItem("products", JSON.stringify(products));
        badge.innerText = getProductCount();

    });
});

function getAmount() {
    let amount = 0;
    if (localStorage.getItem("products")) {
        products = JSON.parse(localStorage.getItem("products"));
        products.forEach(x => {
            amount += Number(x.price) * Number(x.count);
        })
    }
    return amount;
}
