import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from "jquery";


let historyDate = [];
$(".swiperHistory .swiper-slide").each(function (i) {
    historyDate.push($(this).data("name"));
});
const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");
const swiperHistory = new Swiper('.swiperHistory', {
    effect: 'fade',
    slidesPerView: 1,
    autoHeight: true,
    spaceBetween: 0,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
    },
    pagination: {
        el: '.swiper-pagination-history',
        clickable: true,
        renderBullet: function (index, className) {
            return '<li class="d-flex d-lg-block justify-content-center align-items-center base-timeline__item opacity-100 mx-0 position-relative lazy bg-transparent z-top ' + className + '" style="font-size: 18px"  data-aos="fade-in" data-aos-delay="'+ index +'00" ><span class="base-timeline__summary-text bg-white lazy rounded-2 text-center text-secondary py-2 px-2 position-absolute lh-base ">' + (historyDate[index]) + '</span></li>';
        }
    },

    on: {
        autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        },
        realIndexChange: function () {
            let activeSlide = this.realIndex;
            let slides = this.slides;
            setTimeout(function () {
                slides.forEach(function (slide, index) {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');

                    elementsWithAos.forEach(function (element) {
                        if (index === activeSlide) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }

                    })
                });
            }, 400);

            setTimeout(function () {
                slides.forEach(function (slide, index) {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach(function (element) {
                        if (index === activeSlide) {
                            element.classList.add('aos-animate');
                        } else {
                            element.classList.remove('aos-animate');
                        }

                    })
                });
            }, 400);

        }
    },


});