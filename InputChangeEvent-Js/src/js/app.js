var choose = document.getElementById("files");
var depo = document.querySelector(".depo");


choose.onchange = function () {

    [...this.files].forEach(file => {
        var read = new FileReader();
        const img = document.createElement("img");
        read.onload = (e) => {
            img.src = e.target.result;
        }


        const div = document.createElement("div");
        div.classList = "img";
        div.append(img);
        depo.append(div);
        read.readAsDataURL(file);
    });
}

// var depoImages = document.querySelectorAll(".depo>img");

// depoImages.forEach(image=>{
//     image.ondragstart=(e)=>{
//         e.dataTransfer.setData("img",e)
//     }
// })

var fruits = document.querySelectorAll(".fruit");

fruits.forEach(fruit => {



    fruit.ondragover = (e) => {
        e.preventDefault();
    }

    fruit.ondrop = (e) => {
        var img = document.createElement("img");
        var read = new FileReader();
        read.readAsDataURL(e.dataTransfer.files[0])
        read.onload = function (e) {
            img.src = read.result;
        }
        img.setAttribute("draggable",false)
        fruit.append(img);
        if(fruit.classList[0]=="apple"){
            var total = document.getElementById("apple");
            var price = Number(total.innerText);
            price += 2;
            total.innerHTML = price ;
        } else if(fruit.classList[0]=="strawberry"){
            var total = document.getElementById("strawberry");
            var price = Number(total.innerText);
            price += 5;
            total.innerHTML = price ;
        }else if(fruit.classList[0]=="orange"){
            var total = document.getElementById("orange");
            var price = Number(total.innerText);
            price += 3;
            total.innerHTML = price ;
        }
    }
})


