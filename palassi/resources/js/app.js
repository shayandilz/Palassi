require('./bootstrap');
import $ from "jquery";
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import AOS from 'aos';
import 'aos/dist/aos.css';

$(document).ready(function () {

})

// AOS DISABLER FOR MOBILE PHONES
class AOSDisabler {
    constructor(className) {
        this.elements = document.querySelectorAll('.' + className);
        this.initialize();
    }

    initialize() {
        if (this.isMobileScreenSize()) {
            this.disableAOSOnMobile();
        }
    }

    isMobileScreenSize() {
        return window.matchMedia('(max-width: 767px)').matches;
    }

    disableAOSOnMobile() {
        this.elements.forEach((element) => {
            const elementsWithAOS = element.querySelectorAll('[data-aos]');

            elementsWithAOS.forEach((aosElement) => {
                aosElement.setAttribute('data-aos', 'none');
            });
        });
    }
}


document.addEventListener('DOMContentLoaded', function () {

    // Home About Swiper
    require('./homepageAboutus')
    require('./homepageHistory')
    require('./homepagePortfolio')
    // AOS INIT
    AOS.init();
    // HERO FRONT PAGE VIDEO PLAY AND PAUSE
    var video = document.getElementById('hero_video');
    var muteButton = document.getElementById('mute-button');
    var muteIcon = document.getElementById('mute-icon');
    var isMuted = false;

    muteButton.addEventListener('click', function() {
        if (video.muted) {
            video.muted = false;
            isMuted = false;
            muteIcon.className = 'bi bi-volume-up fs-5 lh-0';
        } else {
            video.muted = true;
            isMuted = true;
            muteIcon.className = 'bi bi-volume-mute fs-5 lh-0';
        }
    });
    const aosDisabler = new AOSDisabler('aos-remover');

    /*---------------------     MENU & HEADER     ---------------------------*/
//toggle header on time
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }

    toggleScrollClass();
    //check scroll to take actions on it
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });


    function homeSwiper() {
        let names = [];
        $(".swiper1 .swiper-slide section").each(function (i) {
            names.push($(this).data("name"));
        });

// aos data attribute looping
        const swiper = new Swiper('.swiper1', {
            hashNavigation: true,
            allowTouchMove: false,
            effect: 'slide',
            speed: 900,
            slidesPerView: 1,
            mousewheel: {
                invert: false,
                sensitivity: 3
            },
            spaceBetween: 0,
            direction: 'vertical',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<div class="tooltip my-4 position-relative lazy lh-sm ' + className + '" ><span class="tooltiptext ms-4 text-white text-start position-absolute z-top">' + (names[index]) + '</span></div>';
                }
            },
            on: {

                init: function () {
                    // button back to top
                    let backToTop = document.querySelector('.backTo_Top');
                    backToTop.addEventListener('click', function () {
                        swiper.slideTo(0);
                    });

                    let customPagination = document.querySelector('.swiper-pagination-custom-home');
                    var isFirstSlide = this.activeIndex === 0;
                    if (isFirstSlide) {
                        // Do something specific for the first slide
                        customPagination.classList.add('opacity-0');
                    }
                },
                afterInit: function () {
                    setTimeout(function () {
                        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
                    }, 50)
                },
                realIndexChange: function () {
                    let activeSlide = this.realIndex;
                    let slides = this.slides;
                    if (activeSlide === 0) {
                        $('.navbar-brand').addClass('aos-animate')
                        $('.backTo_Top').removeClass('aos-animate');
                    } else {
                        $('.navbar-brand').removeClass('aos-animate');
                        $('.backTo_Top').addClass('aos-animate')
                    }
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
                    let customPagination = document.querySelector('.swiper-pagination-custom-home');
                    if (activeSlide === 0) {
                        document.body.classList.remove('scrolled');
                        customPagination.classList.remove('aos-animate');
                        customPagination.classList.add('opacity-0');
                        customPagination.classList.remove('opacity-100');
                    } else {
                        video.muted = true;
                        muteIcon.className = 'bi bi-volume-mute fs-5 lh-0';
                        document.body.classList.add('scrolled');
                        customPagination.classList.add('aos-animate');
                        customPagination.classList.add('opacity-100');
                    }
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
                    if (activeSlide === slides.length - 1) {
                        console.log('sdfsdf')
                        customPagination.classList.remove('aos-animate')
                    }
                }
            }
        });
    }

    function handleResponsive() {
        // Check the screen size or viewport dimensions
        if (window.innerWidth > 1024) {
            homeSwiper();
        } else {
            $('.home main > div').removeClass('swiper')
            $('.home main > div > div').removeClass('swiper-wrapper')
            $('.home main > div > div > div').removeClass('swiper-slide')
            let disableAnimationElements = document.querySelectorAll('[data-aos-disable]');
            disableAnimationElements.forEach(function (element) {
                element.removeAttribute('data-aos');
                element.removeAttribute('data-aos-duration');
            });
        }
    }

// Event listener for the resize event
    window.addEventListener('resize', handleResponsive);

// Initial call to handleResponsive to execute the code on page load
    handleResponsive();


    // menu modal
    let backBtn = $('<i>').addClass('bi bi-arrow-right-short back-button');
    let liElement = $('<li>').append(backBtn);
    $('#navbarTogglerMenu .sub-menu').append(liElement);

    const myModalEl = document.getElementById('headerModal');
    const menu_items = document.querySelectorAll('#navbarTogglerMenu > li');
    let submenuItems = $('#navbarTogglerMenu .sub-menu li');
    const socialIcons = document.querySelectorAll('.social_icons > div')

    let i = 0;
    let menu_items_num = menu_items.length
    socialIcons.forEach((social) => {
        menu_items_num++;
        social.setAttribute('data-aos', 'fade-up');
        social.setAttribute('data-aos-delay', menu_items_num + '00');
        setTimeout(function () {
            social.classList.remove('aos-animate');
        }, 20);
    })
    menu_items.forEach((item) => {
        i++;
        item.setAttribute('data-aos', 'fade-up');
        item.setAttribute('data-aos-delay', i + '00');
        setTimeout(function () {
            item.classList.remove('aos-animate');
        }, 20)
    });
    $('.menu li:has(ul)').addClass('has-submenu z-top');
    let subMenuTitle = $('.menu li.has-submenu > a');
    if (myModalEl) {
        myModalEl.addEventListener('shown.bs.modal', function (event) {

            if (window.location.href.includes('/services')) {
                let menuItems = $('.menu > ul > li').not($('.menu-item-has-children').closest('li')).not($('.menu-item-has-children').closest('.submenu').siblings());
                $('.menu-item-has-children').addClass('aos-animate');
                $('.menu li.has-submenu > a').fadeOut();
                menuItems.each(function (item) {
                    $(this).removeClass('aos-animate')
                });
                let subMenuUL = $('#navbarTogglerMenu .sub-menu');
                subMenuUL.addClass('submenu-open').fadeIn();
                submenuItems.each(function () {
                    $(this).addClass('aos-animate')
                })
            } else {
                $('.sub-menu').addClass('submenu-open').fadeOut();
                submenuItems.each(function () {
                    $(this).removeClass('aos-animate');
                })
                setTimeout(function () {
                    menu_items.forEach((item) => {
                        item.classList.add('aos-animate');
                    });
                    socialIcons.forEach((social) => {
                        social.classList.add('aos-animate');
                    });
                }, 20); // Delay added before adding the 'aos-animate' class
            }


        })
        myModalEl.addEventListener('hidden.bs.modal', function (event) {

            if (!subMenuTitle.hasClass('aos-animate')) {
                subMenuTitle.addClass('aos-animate')
            }
            submenuItems.each(function () {
                $(this).removeClass('aos-animate')
            })
            menu_items.forEach((item) => {
                item.classList.remove('aos-animate');
            });
            socialIcons.forEach((social) => {
                social.classList.remove('aos-animate');
            })
        })
    }
    // menu animations


    let index = 0;

    submenuItems.each(function () {
        index++;
        $(this).attr('data-aos', 'fade-up')
        $(this).attr('data-aos-delay', index + '00')
        subMenuTitle.attr('data-aos', 'fade-out')
        subMenuTitle.attr('data-aos-delay', index + '00')
        $(this).removeClass('aos-animate')


    })
    if (window.location.href.includes('/services')) {
        setTimeout(function () {
            submenuItems.each(function () {
                $(this).removeClass('aos-animate');
            })
        }, 10)
    }

    function subMenu() {

        $(this).removeClass('aos-animate')
        let submenu = $(this).next('ul');
        let menuItems = $('.menu > ul > li').not($(this).closest('li')).not($(this).closest('.submenu').siblings());
        menuItems.each(function (index) {
            $(this).removeClass('aos-animate')
        });

        submenu.addClass('submenu-open').fadeIn();
        submenuItems.each(function () {
            $(this).addClass('aos-animate')
        })
    }

    subMenuTitle.click(subMenu);

    function closeButton() {
        subMenuTitle.addClass('aos-animate')
        submenuItems.each(function () {
            $(this).removeClass('aos-animate')
        })
        var submenu = $('.submenu-open');
        submenu.fadeOut(function () {
            $(this).removeClass('submenu-open').closest('.has-submenu').children('a').fadeIn();
            var menuItems = $('.menu > ul > li').not($(this).closest('li')).not($(this).closest('.submenu').siblings());
            menuItems.each(function (index) {
                $(this).addClass('aos-animate')
            });
            // $(this).find('.back-button').remove();

        });

    }

    $('.menu').on('click', '.back-button', function (e) {
        e.preventDefault();
        closeButton();
    });
});