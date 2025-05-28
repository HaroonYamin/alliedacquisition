"use strict";

jQuery(document).ready(function ($) {
    $(".mobile-menu").click(function () {
        $(".mobile-menu").toggleClass("mobile-open");
        $("#toggle-menu").toggleClass("active");
    });
});

const swiper = new Swiper(".testimonial-swiper", {
    speed: 400,
    spaceBetween: 24,
    loop: true,
    slidesPerView: 1.05,
    navigation: {
        nextEl: ".testimonials-right",
        prevEl: ".testimonials-left",
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        1280: {
            slidesPerView: 2,
        },
    },
});
