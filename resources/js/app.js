import './bootstrap';
import $ from 'jquery';
window.$ = $;
import './request-form';


import Swiper from 'swiper';
import {
    Navigation,
    Pagination,
    Mousewheel,
    Controller,
    Autoplay,
    Keyboard,
    EffectCreative,
    EffectFade,
    FreeMode
} from 'swiper/modules';

window._swiper = Swiper;
window._swiperNavigation = Navigation;
window._swiperPagination = Pagination;
window._swiperMousewheel = Mousewheel;
window._swiperController = Controller;
window._swiperAutoplay = Autoplay;
window._swiperKeyboard = Keyboard;
window._swiperCreativeEffect= EffectCreative;
window._swiperEffectFade= EffectFade;
window._swiperFreeMode = FreeMode;
window.swipers = {};

$(document).ready(function(){
    $('.faq-listing .item h4').on('click',function(){
      if(!$(this).hasClass('active')){
        $('.faq-listing .item').removeClass('active');
        $(this.closest('.item')).addClass('active');
      }
    });
})
window.renderBulletsWithFraction = function (swiper, current, total) {
    let fraction = "<span class='swiper-pagination-current '>" + current + "</span>" +
        "<span class='swiper-pagination-total '> / " + total + "</span>";
    let bullets = '';
    for (let i = 0; i < total; i++) {
        if (i === (current - 1)) {
            bullets += '<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>';
            continue;
        }
        bullets += '<span class="swiper-pagination-bullet"></span>';
    }
    const pagination = `
    <div class="row">
        <div class="swiper-pagination-bullets">
            ${bullets}
        </div>
        <span class="fraction">
            ${fraction}
        </span>
    </div>`;
    return pagination;
};
$(document).ready(function () {
    $('.floating-form .activator').on('click', function () {
        $(this).closest('.floating-form').toggleClass('active');
    });
    $('header .activate-mobile').on('click', function () {
        $('header .mobile-menu').toggleClass('active');
        $('header .mobile-menu-close').toggleClass('active');
    });
    $('header .mobile-menu-close').on('click', function () {
        $('header .mobile-menu').removeClass('active');
        $('header .mobile-menu-close').removeClass('active');
    });
    $('.image-paragraph-slider a.read-more').on('click', function (e) {
        e.preventDefault();
        console.log('read more');
        $(this).closest('.swiper-slide').find('p.read-more').toggleClass('active');
        $(this).html($(this).html() === 'Read More' ? 'Read Less' : 'Read More');
        //TODO: add lang option;
    });
    $('.mobile-menu .hasSub').on('click',function(){
        $(this).toggleClass('active');
    })
});
document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.question');
    const firstAnswer = document.querySelector('.Accordion-item.active .Accordion-answer');
    if (firstAnswer) {
        firstAnswer.style.maxHeight = firstAnswer.scrollHeight + 'px';
    }

    questions.forEach(question => {
        question.addEventListener('click', function() {
            const currentAccordion = this.closest('.accordion-item');
            const currentAnswer = currentAccordion.querySelector('.accordion-answer');
            const isOpen = currentAccordion.classList.contains('active');
            const activeAccordions = document.querySelectorAll('.accordion-item.active');

            if (!isOpen) {
                activeAccordions.forEach(item => {
                    item.classList.remove('active');
                    item.querySelector('.accordion-answer').style.maxHeight = '0px';
                });
                currentAccordion.classList.add('active');
                currentAnswer.style.maxHeight = currentAnswer.scrollHeight + 'px';
            } else if (activeAccordions.length === 1) {
                return;
            } else {
                currentAccordion.classList.remove('active');
                currentAnswer.style.maxHeight = '0px';
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    $('.accordion-slider-section .accordion-item').on('click',function(){
        if(!$(this).hasClass('active')){
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            window["swipers"][$(this).parents('.accordion-slider-section').data('swiper-id')].slideTo($(this).data('index'));
        }
    });
});
