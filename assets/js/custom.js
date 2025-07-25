"use strict";

jQuery(document).ready(function ($) {
    $(".mobile-menu").click(function () {
        $(".mobile-menu").toggleClass("mobile-open");
        $("#toggle-menu").toggleClass("active");
    });

    $(".hy-accordion-item").click(function () {
        $(".hy-accordion-item").not(this).removeClass("active");
        $(this).addClass("active");
    });

    window.leadMagnet = function () {
        $("#hy-lead-magnet-section").fadeOut();
    };
});

document.addEventListener("scroll", function () {
    const section = document.getElementById("hy-lead-magnet-section");
    const bg = document.getElementById("hy-lead-magnet-bg");
    const rect = section.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    const sectionCenter = rect.top + rect.height / 2;

    const effectRange = 1000;
    const distanceFromCenter = Math.abs(sectionCenter - windowHeight / 2);

    if (distanceFromCenter <= effectRange) {
        // 1 is max opacity when in center, 0 when outside range
        const opacity = 1 - distanceFromCenter / effectRange;
        bg.style.backgroundColor = `rgba(0, 0, 0, ${opacity * 0.8})`; // max 0.8 opacity
    } else {
        bg.style.backgroundColor = `rgba(0, 0, 0, 0)`;
    }

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
});
