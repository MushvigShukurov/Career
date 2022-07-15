window.onload = function(e) {
    setTimeout(() => {
        document.getElementById('loading').style.display = 'none';
        document.body.style.overflowY = 'auto';
    }, 1000);
};
// -----------------------------------------------------------------------------------
var swiper = new Swiper(".mySwiper", {
    grabCursor: true,
    mousewheel: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
    },
    autoplay: {
        delay: 10000,
        disableOnInteraction: false,
    },
    keyboard: {
        enabled: true,
    },
});