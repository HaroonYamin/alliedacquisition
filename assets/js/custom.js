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

    window.leadMagnet = function () {
        $("#hy-lead-magnet-section").fadeOut();
        $("#hy-lead-magnet-toggle").addClass("active");
    };

    // Lead Magnet Toggle
    window.displayLeadMagnet = function () {
        $("#hy-lead-magnet-section").fadeIn().css("top", "0px");
        $("#hy-lead-magnet-section").css("position", "fixed");
        $("#hy-lead-magnet-toggle").removeClass("active");
    };

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

document.addEventListener("scroll", function () {
    // Lead Magnet
    const section = document.getElementById("hy-lead-magnet-section");

    const bg = document.getElementById("hy-lead-magnet-bg");
    const rect = section.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    const sectionCenter = rect.top + rect.height / 2;

    const effectRange = 1000;
    const distanceFromCenter = Math.abs(sectionCenter - windowHeight / 2);

    if (distanceFromCenter <= effectRange) {
        const opacity = 1 - distanceFromCenter / effectRange;
        bg.style.backgroundColor = `rgba(0, 0, 0, ${opacity * 0.8})`;
    } else {
        bg.style.backgroundColor = `rgba(0, 0, 0, 0)`;
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
