var swiper = new Swiper(".ourSlider", {
    direction: "vertical",
    slidesPerView: 1,
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
    },
    grabCursor: true,
    loop: true,
    mousewheel: true,
    keyboard: {
        enabled: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
});