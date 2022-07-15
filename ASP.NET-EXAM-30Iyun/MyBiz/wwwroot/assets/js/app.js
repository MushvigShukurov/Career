var swiper = new Swiper(".introSwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

// On Scroll
let backToTop = document.getElementById("backToTop");
window.onscroll = function () {
    if (window.scrollY > 150) {
        backToTop.style.display = "block";
    }
    else {
        backToTop.className =  "animate__animated animate__zoomInRight";
        setTimeout(() => {
            backToTop.style.display = "none";
        }, 300);
    }
}