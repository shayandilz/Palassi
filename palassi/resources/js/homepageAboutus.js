import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from "jquery";

const swiperAbout = new Swiper('.swiperAbout', {
    effect: 'fade',
    autoplay:true,
    loop: true,
    speed: 900,
    slidesPerView: 1,
    autoHeight: true,
    spaceBetween: 0,
    pagination: {
        el: '.swiper-pagination-about',
        clickable: true,
    },
});