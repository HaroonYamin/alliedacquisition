"use strict";

const swiper = new Swiper(".testimonial-swiper", {
    speed: 400,
    spaceBetween: 24,
    loop: true,
    slidesPerView: 1,
    navigation: {
        nextEl: ".testimonials-right",
        prevEl: ".testimonials-left",
    },
    breakpoints: {
        1280: {
            slidesPerView: 2,
        },
    },
});
