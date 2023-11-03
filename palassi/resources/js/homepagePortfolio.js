import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from "jquery";



const swiperPortfolio = new Swiper('.swiperPortfolio', {
    effect: 'slide',
    speed: 800,
    breakpoints: {
        // when window width is >= 640px
        1024: {
            slidesPerView: 2.1,
            spaceBetween: 1,
        },
        3500:{

        }
    },
    slidesPerView: 1,
    spaceBetween: 1,
    // Navigation buttons
    navigation: {
        nextEl: '.swiper-button-next', // CSS class for the next button
        prevEl: '.swiper-button-prev', // CSS class for the previous button
    },
    on: {
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

// const tabs = document.querySelectorAll('.navPortfolio .linkPortfolio');
// const tabContent = document.querySelectorAll('.tab-content .tab-pane');
//
// let counter = 0;
// // Attach an event listener to each tab
// tabs.forEach((tab, index) => {
//     tab.addEventListener('shown.bs.tab', () => {
//         // Remove the "aos-animate" class from all elements
//         const aosEls = document.querySelectorAll('.aos');
//         aosEls.forEach(el => el.classList.remove('aos-animate'));
//         // Add the "aos-animate" class to the current tab elements
//         const currentTabEls = tabContent[index].querySelectorAll('.aos');
//         currentTabEls.forEach(el => el.classList.add('aos-animate'));
//         currentTabEls.forEach(
//             el => {
//                 el.setAttribute('data-aos-delay', counter + '00')
//                 counter++;
//             }
//         );
//         counter = 0;
//     });
// });
