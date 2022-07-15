let dropDownMenu = document.querySelector(".menu-drop-down");
let dropDownBtns = document.querySelectorAll(".menu-btn");
dropDownBtns.forEach(dropDownBtn => {
    dropDownBtn.addEventListener("click", function () {
        if (getComputedStyle(dropDownMenu).display == "none") {
            dropDownMenu.style.display = "block";
            dropDownMenu.classList = "menu-drop-down animate__animated animate__jackInTheBox";


        } else {
            dropDownMenu.classList = "menu-drop-down animate__animated animate__backOutUp";

            setTimeout(() => {
                dropDownMenu.style.display = "none";
            }, 1000);

        }
    });
});

// Back To Top
var backToTop = document.getElementById('backToTop');
window.onscroll = function (e) {
    if (window.scrollY > 300) {
        backToTop.style.display = "block";
    } else {
        backToTop.style.display = "none";
    }
}
backToTop.addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo(0, 0);
});

// Open Modal | Close Modal

let modalBtns = document.querySelectorAll(".menu-card");
let modalContainer = document.querySelector(".modal-add-to-card");
modalBtns.forEach(modalBtn => {
    modalBtn.addEventListener("click", function (e) {
        modalContainer.style.display = "block";
        document.body.style.overflowY = "hidden";
    })
});


let closeModalBtn = document.querySelector(".modal-fa-times");
closeModalBtn.addEventListener("click", function (e) {
    modalContainer.style.display = "none";
    document.body.style.overflowY = "auto";

})


// Redirect Login
let loginBtns = document.querySelectorAll(".login");

loginBtns.forEach(loginBtn => {
    loginBtn.addEventListener("click",function(e){
        window.location.href = "login.html";
    });
});

// Logo Redirect
let logo = document.querySelector(".logo");
logo.addEventListener("click",function(e){
    window.location.href = "https://instagram.com/mushvigsh";
});

// Permissions

window.addEventListener('contextmenu', (e) => {
	e.preventDefault();
    swal({
        title: "Icazəsiz!",
        text: "Admin icazəsi yoxdur!",
        icon: "error",
        button: "Ok",
      });
}, false);

window.addEventListener("keydown",(e)=>{
    if(e.key == "F12"){
        e.preventDefault();
        swal({
            title: "Icazəsiz!",
            text: "Admin icazəsi yoxdur!",
            icon: "error",
            button: "Ok",
          });
    }
},false);


