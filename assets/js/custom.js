"use strict";

const swiper = new Swiper(".testimonial-swiper", {
    speed: 400,
    spaceBetween: 24,
    loop: true,
    slidesPerView: 1,
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
    },
});
