"use strict";

jQuery(document).ready(function ($) {
    // Mobile Menu
    $(".mobile-menu").click(function () {
        $(".mobile-menu").toggleClass("mobile-open");
        $("#toggle-menu").toggleClass("active");
    });

    // Accordion
    $(".hy-accordion-item").click(function () {
        $(".hy-accordion-item").not(this).removeClass("active");
        $(this).addClass("active");
    });

    // Testimonial Popup
    const lastKey = $(".testimonial-last-key").data("last-key");
    for (let i = 0; i <= lastKey; i++) {
        $(`#tesimonial-${i}`).click(function () {
            $(`.tesimonial-popup-${i}`).addClass("active");
        });
        $(`.testimonial-popup-close-${i}`).click(function () {
            $(`.tesimonial-popup-${i}`).removeClass("active");
        });
    }

    // Fixed Banner display when screen scroll to 30%
    const $fixedBanner = $("#fixed-banner");
    const showBannerAt = $(window).height() * 0.3;

    $(window).on("scroll", function () {
        if ($(window).scrollTop() > showBannerAt) {
            $fixedBanner.addClass("active");
        } else {
            $fixedBanner.removeClass("active");
        }
    });
});

// Handles all smooth scrolling links automatically
document.addEventListener("click", function (e) {
    if (e.target.matches('a[href^="#"]')) {
        e.preventDefault();
        const target = document.querySelector(e.target.getAttribute("href"));
        if (target) {
            target.scrollIntoView({ behavior: "smooth" });
            // Update URL without page jump
            history.pushState(null, null, e.target.getAttribute("href"));
        }
    }
});

// Handle direct hash access
window.addEventListener("load", function () {
    if (window.location.hash === "#scroll-to-form") {
        setTimeout(function () {
            document.getElementById("scroll-to-form")?.scrollIntoView({ behavior: "smooth" });
        }, 100);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Testimonial Swiper
    const swiperTestimonials = new Swiper(".testimonial-swiper", {
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
