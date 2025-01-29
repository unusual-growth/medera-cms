import './bootstrap';
import $ from 'jquery';
window.$ = $;


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
