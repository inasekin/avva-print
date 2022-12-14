'use strict';

let DesingOfficeSwiper = new Swiper('.design-office .swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // Navigation arrows
    navigation: {
        nextEl: '.design-office .slider-navigation__button--next',
        prevEl: '.design-office .slider-navigation__button--prev',
    },

});

let TextSliderSwiper = new Swiper('.text-slider .swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // Navigation arrows
    navigation: {
        nextEl: '.text-slider .slider-navigation__button--next',
        prevEl: '.text-slider .slider-navigation__button--prev',
    },

});

let EquipmentSwiper = new Swiper('.equipment .swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // Navigation arrows


    breakpoints: {
        // when window width is >= 320px
        0: {
            navigation: {
                nextEl: '.equipment__slider-navigation--phone .slider-navigation__button--next',
                prevEl: '.equipment__slider-navigation--phone .slider-navigation__button--prev',
            },
        },
        768: {
            navigation: {
                nextEl: '.equipment__slider-navigation--desktop .slider-navigation__button--next',
                prevEl: '.equipment__slider-navigation--desktop .slider-navigation__button--prev',
            },
        },
    }

});

let CaseSwiper = new Swiper('.case-slider .swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // Navigation arrows
    navigation: {
        nextEl: '.case-slider .slider-navigation__button--next',
        prevEl: '.case-slider .slider-navigation__button--prev',
    },

    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1.5,
            spaceBetween: 14,
        },
        768: {
            slidesPerView: 1.5,
            spaceBetween: 30,
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 2,
            spaceBetween: 60,
        }
    }

});

let designPackageSwiperSlider = new Swiper(".design-package__slider", {
    observer: true,
    observeParents: true,
    loop: true,
    speed: 800,
    navigation: {
        nextEl: ".slider-nav-next",
        prevEl: ".slider-nav-prev",
    },
    breakpoints: {
        // when window width is <= 499px
        320: {
            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1
        },
        // when window width is <= 999px
        767: {
            slidesPerView: 2,
            spaceBetween: 60,
        }
    }
});

let designProjectsSwiperSlider = new Swiper(".design-projects__slider", {
    observer: true,
    observeParents: true,
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 800,
    navigation: {
        nextEl: ".slider-nav-next",
        prevEl: ".slider-nav-prev",
    },
});

let designPosMaterials = new Swiper('.slider-special-materials', {
    observer: true,
    observeParents: true,
    loop: true,
    direction: "horizontal",
    speed: 800,
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
        nextEl: ".slider-navigation__next",
        prevEl: ".slider-navigation__prev",
    },
});

let designPosMaterialsMobile = new Swiper('.slider-special-materials-mobile', {
    observer: true,
    observeParents: true,
    loop: true,
    speed: 800,
    slidesPerView: 1,
    spaceBetween: 60,
    navigation: {
        nextEl: ".slider-navigation__next",
        prevEl: ".slider-navigation__prev",
    },
});

let productSlider = new Swiper('.product__slider', {
    observer: true,
    observeParents: true,
    loop: true,
    speed: 800,
    slidesPerView: 1,
    spaceBetween: 60,
    navigation: {
        nextEl: ".slider-nav-next",
        prevEl: ".slider-nav-prev",
    },
});

let recommendedProductSlider = new Swiper('.recommended__slider', {
    observer: true,
    observeParents: true,
    loop: true,
    speed: 800,
    slidesPerView: 3,
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        500: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 3,
            spaceBetween: 10,
        }
    }
});

(function($) {

    $(document).ready(function() {
        $('.burger-navigation__search input').keyup(function(){
            let parent = $(this).closest('.search');
            if ($(this).val().length > 0) {
                parent.addClass('search--active');
            } else {
                parent.removeClass('search--active');
            }
        });

        $('.burger-navigation__search input').focus(function(){
            let parent = $(this).closest('.search');
            parent.addClass('search--active');
        });
        $('.burger-navigation__search input').blur(function(){
            let parent = $(this).closest('.search');
            parent.removeClass('search--active');
        });

        $('.burger-navigation__column--accordion .burger-navigation__column-title a').click(function() {
            let accordion = $(this).closest('.burger-navigation__column');
            let links = accordion.find('.burger-navigation__column-links');
            if (!accordion.hasClass('burger-navigation__column--collapsing')) {
                accordion.addClass('burger-navigation__column--collapsing');
                if (accordion.hasClass('burger-navigation__column--opened')) {
                    links.slideUp('slow',function() {
                        accordion.removeClass('burger-navigation__column--opened');
                        accordion.removeClass('burger-navigation__column--collapsing');
                    });
                } else {
                    links.slideDown('slow',function() {
                        accordion.addClass('burger-navigation__column--opened');
                        accordion.removeClass('burger-navigation__column--collapsing');
                    });
                }
            }
            return false;
        });
    });

    $(document).ready(function () {
        $('.header .menu-button').click(function () {
            let header = $(this).closest('.header');
            let button = $(this);
            let menu = $('.burger-navigation');
            let form = $('.header-form');
            let form_step = form.find('.header-form__form-step');
            let submit_step = form.find('.header-form__submit-step');
            if (!header.hasClass('header--collapsing')) {
                header.addClass('header--collapsing');
                if (form.hasClass('header-form--opened')) {
                    form.slideUp('fast', function() {
                        submit_step.hide();
                        form_step.show();
                    });
                    form.removeClass('header-form--opened');
                }
                if (!header.hasClass('header--opened')) {
                    $('body').addClass('body-overflow');
                    button.addClass('menu-button--opened');
                    menu.slideDown('slow', 'linear', function () {
                        header.addClass('header--opened');
                        header.removeClass('header--collapsing');
                    });
                } else {
                    $('body').removeClass('body-overflow');
                    button.removeClass('menu-button--opened');
                    menu.slideUp('slow','linear', function () {
                        header.removeClass('header--opened');
                        header.removeClass('header--collapsing');
                    });
                }
            }
        });

        $('.burger-navigation__ask-button').click(function() {
            let header = $('.header');
            let button = header.find('.menu-button');
            let menu = $('.burger-navigation');
            let form = $('.header-form');
            button.removeClass('menu-button--opened');
            menu.slideUp('fast','linear', function () {
                header.removeClass('header--opened');
                header.removeClass('header--collapsing');
                form.slideDown('slow', 'linear', function() {
                    form.addClass('header-form--opened');
                });
            });
            return false;
        });

        $('.header-form__close-button').click(function() {
            let parent = $(this).closest('.header-form');
            let form_step = parent.find('.header-form__form-step');
            let submit_step = parent.find('.header-form__submit-step');
            parent.slideUp('fast','linear',function() {
                parent.removeClass('header-form--opened');
                submit_step.hide();
                form_step.show();
                $('body').removeClass('body-overflow');
            });
        });

        $('.header-form__submit').click(function() {
            let parent = $(this).closest('.header-form');
            let form_step = parent.find('.header-form__form-step');
            let submit_step = parent.find('.header-form__submit-step');
            form_step.slideUp('slow', function() {
                submit_step.slideDown('slow');
            });
        });

    });

    $(document).scroll(function() {
        if ($(document).scrollTop() > 10) {
            $('.header').addClass('header--stuck');
        } else {
            $('.header').removeClass('header--stuck');
        }
    });

    $(document).ready(function() {
        $('.services .form__submit input').click(function() {
            let parent = $(this).closest('.services__form');
            parent.find('.services__form-step').slideUp('slow', function() {
                parent.find('.services__submit-step').slideDown('slow');
            });
        });

        $('.services .services__form-close').click(function() {
            let parent = $(this).closest('.services__form');
            parent.find('.services__submit-step').slideUp('slow', function() {
                parent.find('.services__form-step').slideDown('slow');
            });
        });
    });


    $(document).ready(function () {
        $('.form__textarea-button').click(function () {
            let parent = $(this).closest('.form__textarea');
            if (parent.hasClass('form__textarea--opened')) {
                parent.removeClass('form__textarea--opened');
            } else {
                parent.addClass('form__textarea--opened');
            }
        });
    });

    /* Counter section */
    $(document).ready(function () {
        const counterUp = window.counterUp.default;
        document.querySelectorAll( '.counter__count' ).forEach(function(item, i) {
            new Waypoint( {
                element: item,
                handler: function() {
                    counterUp( item, {
                        duration: 400,
                        delay: 1,
                    } )
                    this.destroy()
                },
                offset: 'bottom-in-view',
            } )
        });
    });


}(jQuery));
var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");
var isMobile = { Android: function () { return navigator.userAgent.match(/Android/i); }, BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); }, iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, Opera: function () { return navigator.userAgent.match(/Opera Mini/i); }, Windows: function () { return navigator.userAgent.match(/IEMobile/i); }, any: function () { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } };
function isIE() {
    ua = navigator.userAgent;
    var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
    return is_ie;
}
if (isIE()) {
    document.querySelector('html').classList.add('ie');
}
if (isMobile.any()) {
    document.querySelector('html').classList.add('_touch');
}

// ???????????????? ?????????? ???? ????????????
//parseInt(itemContactpagePhone.replace(/[^\d]/g, ''))

function testWebP(callback) {
    var webP = new Image();
    webP.onload = webP.onerror = function () {
        callback(webP.height == 2);
    };
    webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
}
testWebP(function (support) {
    if (support === true) {
        document.querySelector('html').classList.add('_webp');
    } else {
        document.querySelector('html').classList.add('_no-webp');
    }
});

function ibg() {
    if (isIE()) {
        let ibg = document.querySelectorAll("._ibg");
        for (var i = 0; i < ibg.length; i++) {
            if (ibg[i].querySelector('img') && ibg[i].querySelector('img').getAttribute('src') != null) {
                ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
            }
        }
    }
}
ibg();

window.addEventListener("load", function () {
    if (document.querySelector('.wrapper')) {
        setTimeout(function () {
            document.querySelector('.wrapper').classList.add('_loaded');
        }, 0);
    }
});

let unlock = true;

//=================
//ActionsOnHash
if (location.hash) {
    const hsh = location.hash.replace('#', '');
    if (document.querySelector('.popup_' + hsh)) {
        popup_open(hsh);
    } else if (document.querySelector('div.' + hsh)) {
        _goto(document.querySelector('.' + hsh), 500, '');
    }
}
//=================
//Menu
let iconMenu = document.querySelector(".icon-menu");
if (iconMenu != null) {
    let delay = 500;
    let menuBody = document.querySelector(".menu__body");
    iconMenu.addEventListener("click", function (e) {
        if (unlock) {
            body_lock(delay);
            iconMenu.classList.toggle("_active");
            menuBody.classList.toggle("_active");
        }
    });
};
function menu_close() {
    let iconMenu = document.querySelector(".icon-menu");
    let menuBody = document.querySelector(".menu__body");
    iconMenu.classList.remove("_active");
    menuBody.classList.remove("_active");
}
//=================
//BodyLock
function body_lock(delay) {
    let body = document.querySelector("body");
    if (body.classList.contains('_lock')) {
        body_lock_remove(delay);
    } else {
        body_lock_add(delay);
    }
}
function body_lock_remove(delay) {
    let body = document.querySelector("body");
    if (unlock) {
        let lock_padding = document.querySelectorAll("._lp");
        setTimeout(() => {
            for (let index = 0; index < lock_padding.length; index++) {
                const el = lock_padding[index];
                el.style.paddingRight = '0px';
            }
            body.style.paddingRight = '0px';
            body.classList.remove("_lock");
        }, delay);

        unlock = false;
        setTimeout(function () {
            unlock = true;
        }, delay);
    }
}
function body_lock_add(delay) {
    let body = document.querySelector("body");
    if (unlock) {
        let lock_padding = document.querySelectorAll("._lp");
        for (let index = 0; index < lock_padding.length; index++) {
            const el = lock_padding[index];
            el.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
        }
        body.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
        body.classList.add("_lock");

        unlock = false;
        setTimeout(function () {
            unlock = true;
        }, delay);
    }
}
//=================
// LettersAnimation
let title = document.querySelectorAll('._letter-animation');
if (title) {
    for (let index = 0; index < title.length; index++) {
        let el = title[index];
        let txt = el.innerHTML;
        let txt_words = txt.replace('  ', ' ').split(' ');
        let new_title = '';
        for (let index = 0; index < txt_words.length; index++) {
            let txt_word = txt_words[index];
            let len = txt_word.length;
            new_title = new_title + '<p>';
            for (let index = 0; index < len; index++) {
                let it = txt_word.substr(index, 1);
                if (it == ' ') {
                    it = '&nbsp;';
                }
                new_title = new_title + '<span>' + it + '</span>';
            }
            el.innerHTML = new_title;
            new_title = new_title + '&nbsp;</p>';
        }
    }
}
//=================
//Tabs
let tabs = document.querySelectorAll("._tabs");
for (let index = 0; index < tabs.length; index++) {
    let tab = tabs[index];
    let tabs_items = tab.querySelectorAll("._tabs-item");
    let tabs_blocks = tab.querySelectorAll("._tabs-block");
    for (let index = 0; index < tabs_items.length; index++) {
        let tabs_item = tabs_items[index];
        tabs_item.addEventListener("click", function (e) {
            for (let index = 0; index < tabs_items.length; index++) {
                let tabs_item = tabs_items[index];
                tabs_item.classList.remove('_active');
                tabs_blocks[index].classList.remove('_active');
            }
            tabs_item.classList.add('_active');
            tabs_blocks[index].classList.add('_active');
            e.preventDefault();
        });
    }
}
//=================
/*
?????? ???????????????? ?????????????????? ?????????? ?????????????? data-spollers
?????? ???????????????????? ?????????????????? ?????????? ?????????????? data-spoller
???????? ?????????? ????????????????\?????????????????? ???????????? ?????????????????? ???? ???????????? ???????????????? ??????????????
?????????? ?????????????????? ???????????? ?? ???????? ??????????????????????.
????????????????:
data-spollers="992,max" - ???????????????? ?????????? ???????????????? ???????????? ???? ?????????????? ???????????? ?????? ?????????? 992px
data-spollers="768,min" - ???????????????? ?????????? ???????????????? ???????????? ???? ?????????????? ???????????? ?????? ?????????? 768px

???????? ?????????? ?????? ???? ?? ?????????? ???????????????????? ???????????? ???????? ?????????????? ?????????????????? ?????????????? data-one-spoller
*/

// SPOLLERS
const spollersArray = document.querySelectorAll('[data-spollers]');
if (spollersArray.length > 0) {
    // ?????????????????? ?????????????? ??????????????????
    const spollersRegular = Array.from(spollersArray).filter(function (item, index, self) {
        return !item.dataset.spollers.split(",")[0];
    });
    // ?????????????????????????? ?????????????? ??????????????????
    if (spollersRegular.length > 0) {
        initSpollers(spollersRegular);
    }

    // ?????????????????? ?????????????????? ?? ?????????? ??????????????????
    const spollersMedia = Array.from(spollersArray).filter(function (item, index, self) {
        return item.dataset.spollers.split(",")[0];
    });

    // ?????????????????????????? ?????????????????? ?? ?????????? ??????????????????
    if (spollersMedia.length > 0) {
        const breakpointsArray = [];
        spollersMedia.forEach(item => {
            const params = item.dataset.spollers;
            const breakpoint = {};
            const paramsArray = params.split(",");
            breakpoint.value = paramsArray[0];
            breakpoint.type = paramsArray[1] ? paramsArray[1].trim() : "max";
            breakpoint.item = item;
            breakpointsArray.push(breakpoint);
        });

        // ???????????????? ???????????????????? ??????????????????????
        let mediaQueries = breakpointsArray.map(function (item) {
            return '(' + item.type + "-width: " + item.value + "px)," + item.value + ',' + item.type;
        });
        mediaQueries = mediaQueries.filter(function (item, index, self) {
            return self.indexOf(item) === index;
        });

        // ???????????????? ?? ???????????? ????????????????????????
        mediaQueries.forEach(breakpoint => {
            const paramsArray = breakpoint.split(",");
            const mediaBreakpoint = paramsArray[1];
            const mediaType = paramsArray[2];
            const matchMedia = window.matchMedia(paramsArray[0]);

            // ?????????????? ?? ?????????????? ??????????????????
            const spollersArray = breakpointsArray.filter(function (item) {
                if (item.value === mediaBreakpoint && item.type === mediaType) {
                    return true;
                }
            });
            // ??????????????
            matchMedia.addListener(function () {
                initSpollers(spollersArray, matchMedia);
            });
            initSpollers(spollersArray, matchMedia);
        });
    }
    // ??????????????????????????
    function initSpollers(spollersArray, matchMedia = false) {
        spollersArray.forEach(spollersBlock => {
            spollersBlock = matchMedia ? spollersBlock.item : spollersBlock;
            if (matchMedia.matches || !matchMedia) {
                spollersBlock.classList.add('_init');
                initSpollerBody(spollersBlock);
                spollersBlock.addEventListener("click", setSpollerAction);
            } else {
                spollersBlock.classList.remove('_init');
                initSpollerBody(spollersBlock, false);
                spollersBlock.removeEventListener("click", setSpollerAction);
            }
        });
    }
    // ???????????? ?? ??????????????????
    function initSpollerBody(spollersBlock, hideSpollerBody = true) {
        const spollerTitles = spollersBlock.querySelectorAll('[data-spoller]');
        if (spollerTitles.length > 0) {
            spollerTitles.forEach(spollerTitle => {
                if (hideSpollerBody) {
                    spollerTitle.removeAttribute('tabindex');
                    if (!spollerTitle.classList.contains('_active')) {
                        spollerTitle.nextElementSibling.hidden = true;
                    }
                } else {
                    spollerTitle.setAttribute('tabindex', '-1');
                    spollerTitle.nextElementSibling.hidden = false;
                }
            });
        }
    }
    function setSpollerAction(e) {
        const el = e.target;
        if (el.hasAttribute('data-spoller') || el.closest('[data-spoller]')) {
            const spollerTitle = el.hasAttribute('data-spoller') ? el : el.closest('[data-spoller]');
            const spollersBlock = spollerTitle.closest('[data-spollers]');
            const oneSpoller = spollersBlock.hasAttribute('data-one-spoller') ? true : false;
            if (!spollersBlock.querySelectorAll('._slide').length) {
                if (oneSpoller && !spollerTitle.classList.contains('_active')) {
                    hideSpollersBody(spollersBlock);
                }
                spollerTitle.classList.toggle('_active');
                _slideToggle(spollerTitle.nextElementSibling, 500);
            }
            e.preventDefault();
        }
    }
    function hideSpollersBody(spollersBlock) {
        const spollerActiveTitle = spollersBlock.querySelector('[data-spoller]._active');
        if (spollerActiveTitle) {
            spollerActiveTitle.classList.remove('_active');
            _slideUp(spollerActiveTitle.nextElementSibling, 500);
        }
    }
}
//=================
//Gallery
let gallery = document.querySelectorAll('._gallery');
if (gallery) {
    gallery_init();
}
function gallery_init() {
    for (let index = 0; index < gallery.length; index++) {
        const el = gallery[index];
        lightGallery(el, {
            counter: false,
            selector: 'a',
            download: false
        });
    }
}
//=================
//SearchInList
function search_in_list(input) {
    let ul = input.parentNode.querySelector('ul')
    let li = ul.querySelectorAll('li');
    let filter = input.value.toUpperCase();

    for (i = 0; i < li.length; i++) {
        let el = li[i];
        let item = el;
        txtValue = item.textContent || item.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            el.style.display = "";
        } else {
            el.style.display = "none";
        }
    }
}
//=================
//DigiFormat
function digi(str) {
    var r = str.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ");
    return r;
}
//=================
//DiGiAnimate
function digi_animate(digi_animate) {
    if (digi_animate.length > 0) {
        for (let index = 0; index < digi_animate.length; index++) {
            const el = digi_animate[index];
            const el_to = parseInt(el.innerHTML.replace(' ', ''));
            if (!el.classList.contains('_done')) {
                digi_animate_value(el, 0, el_to, 1500);
            }
        }
    }
}
function digi_animate_value(el, start, end, duration) {
    var obj = el;
    var range = end - start;
    // no timer shorter than 50ms (not really visible any way)
    var minTimer = 50;
    // calc step time to show all interediate values
    var stepTime = Math.abs(Math.floor(duration / range));

    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);

    // get current time and calculate desired end time
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

    function run() {
        var now = new Date().getTime();
        var remaining = Math.max((endTime - now) / duration, 0);
        var value = Math.round(end - (remaining * range));
        obj.innerHTML = digi(value);
        if (value == end) {
            clearInterval(timer);
        }
    }

    timer = setInterval(run, stepTime);
    run();

    el.classList.add('_done');
}
//=================
//Popups
let popup_link = document.querySelectorAll('._popup-link');
let popups = document.querySelectorAll('.popup');
for (let index = 0; index < popup_link.length; index++) {
    const el = popup_link[index];
    el.addEventListener('click', function (e) {
        if (unlock) {
            let item = el.getAttribute('href').replace('#', '');
            let video = el.getAttribute('data-video');
            popup_open(item, video);
        }
        e.preventDefault();
    })
}
for (let index = 0; index < popups.length; index++) {
    const popup = popups[index];
    popup.addEventListener("click", function (e) {
        if (!e.target.closest('.popup__body')) {
            popup_close(e.target.closest('.popup'));
        }
    });
}
function popup_open(item, video = '') {
    let activePopup = document.querySelectorAll('.popup._active');
    if (activePopup.length > 0) {
        popup_close('', false);
    }
    let curent_popup = document.querySelector('.popup_' + item);
    if (curent_popup && unlock) {
        if (video != '' && video != null) {
            let popup_video = document.querySelector('.popup_video');
            popup_video.querySelector('.popup__video').innerHTML = '<iframe src="https://www.youtube.com/embed/' + video + '?autoplay=1"  allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        }
        if (!document.querySelector('.menu__body._active')) {
            body_lock_add(500);
        }
        curent_popup.classList.add('_active');
        history.pushState('', '', '#' + item);
    }
}
function popup_close(item, bodyUnlock = true) {
    if (unlock) {
        if (!item) {
            for (let index = 0; index < popups.length; index++) {
                const popup = popups[index];
                let video = popup.querySelector('.popup__video');
                if (video) {
                    video.innerHTML = '';
                }
                popup.classList.remove('_active');
            }
        } else {
            let video = item.querySelector('.popup__video');
            if (video) {
                video.innerHTML = '';
            }
            item.classList.remove('_active');
        }
        if (!document.querySelector('.menu__body._active') && bodyUnlock) {
            body_lock_remove(500);
        }
        history.pushState('', '', window.location.href.split('#')[0]);
    }
}
let popup_close_icon = document.querySelectorAll('.popup__close,._popup-close');
if (popup_close_icon) {
    for (let index = 0; index < popup_close_icon.length; index++) {
        const el = popup_close_icon[index];
        el.addEventListener('click', function () {
            popup_close(el.closest('.popup'));
        })
    }
}
document.addEventListener('keydown', function (e) {
    if (e.code === 'Escape') {
        popup_close();
    }
});

//=================
//SlideToggle
let _slideUp = (target, duration = 500) => {
    if (!target.classList.contains('_slide')) {
        target.classList.add('_slide');
        target.style.transitionProperty = 'height, margin, padding';
        target.style.transitionDuration = duration + 'ms';
        target.style.height = target.offsetHeight + 'px';
        target.offsetHeight;
        target.style.overflow = 'hidden';
        target.style.height = 0;
        target.style.paddingTop = 0;
        target.style.paddingBottom = 0;
        target.style.marginTop = 0;
        target.style.marginBottom = 0;
        window.setTimeout(() => {
            target.hidden = true;
            target.style.removeProperty('height');
            target.style.removeProperty('padding-top');
            target.style.removeProperty('padding-bottom');
            target.style.removeProperty('margin-top');
            target.style.removeProperty('margin-bottom');
            target.style.removeProperty('overflow');
            target.style.removeProperty('transition-duration');
            target.style.removeProperty('transition-property');
            target.classList.remove('_slide');
        }, duration);
    }
}
let _slideDown = (target, duration = 500) => {
    if (!target.classList.contains('_slide')) {
        target.classList.add('_slide');
        if (target.hidden) {
            target.hidden = false;
        }
        let height = target.offsetHeight;
        target.style.overflow = 'hidden';
        target.style.height = 0;
        target.style.paddingTop = 0;
        target.style.paddingBottom = 0;
        target.style.marginTop = 0;
        target.style.marginBottom = 0;
        target.offsetHeight;
        target.style.transitionProperty = "height, margin, padding";
        target.style.transitionDuration = duration + 'ms';
        target.style.height = height + 'px';
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
        window.setTimeout(() => {
            target.style.removeProperty('height');
            target.style.removeProperty('overflow');
            target.style.removeProperty('transition-duration');
            target.style.removeProperty('transition-property');
            target.classList.remove('_slide');
        }, duration);
    }
}
let _slideToggle = (target, duration = 500) => {
    if (target.hidden) {
        return _slideDown(target, duration);
    } else {
        return _slideUp(target, duration);
    }
}
//========================================
//Wrap
function _wrap(el, wrapper) {
    el.parentNode.insertBefore(wrapper, el);
    wrapper.appendChild(el);
}
//========================================
//RemoveClasses
function _removeClasses(el, class_name) {
    for (var i = 0; i < el.length; i++) {
        el[i].classList.remove(class_name);
    }
}
//========================================
//IsHidden
function _is_hidden(el) {
    return (el.offsetParent === null)
}
// ShowMore Beta ========================
let moreBlocks = document.querySelectorAll('._more-block');
if (moreBlocks.length > 0) {
    let wrapper = document.querySelector('.wrapper');
    for (let index = 0; index < moreBlocks.length; index++) {
        const moreBlock = moreBlocks[index];
        let items = moreBlock.querySelectorAll('._more-item');
        if (items.length > 0) {
            let itemsMore = moreBlock.querySelector('._more-link');
            let itemsContent = moreBlock.querySelector('._more-content');
            let itemsView = itemsContent.getAttribute('data-view');
            if (getComputedStyle(itemsContent).getPropertyValue("transition-duration") === '0s') {
                itemsContent.style.cssText = "transition-duration: 1ms";
            }
            itemsMore.addEventListener("click", function (e) {
                if (itemsMore.classList.contains('_active')) {
                    setSize();
                } else {
                    setSize('start');
                }
                itemsMore.classList.toggle('_active');
                e.preventDefault();
            });

            let isScrollStart;
            function setSize(type) {
                let resultHeight;
                let itemsContentHeight = 0;
                let itemsContentStartHeight = 0;

                for (let index = 0; index < items.length; index++) {
                    if (index < itemsView) {
                        itemsContentHeight += items[index].offsetHeight;
                    }
                    itemsContentStartHeight += items[index].offsetHeight;
                }
                resultHeight = (type === 'start') ? itemsContentStartHeight : itemsContentHeight;
                isScrollStart = window.innerWidth - wrapper.offsetWidth;
                itemsContent.style.height = `${resultHeight}px`;
            }

            itemsContent.addEventListener("transitionend", updateSize, false);

            function updateSize() {
                let isScrollEnd = window.innerWidth - wrapper.offsetWidth;
                if (isScrollStart === 0 && isScrollEnd > 0 || isScrollStart > 0 && isScrollEnd === 0) {
                    if (itemsMore.classList.contains('_active')) {
                        setSize('start');
                    } else {
                        setSize();
                    }
                }
            }
            window.addEventListener("resize", function (e) {
                if (!itemsMore.classList.contains('_active')) {
                    setSize();
                } else {
                    setSize('start');
                }
            });
            setSize();
        }
    }
}
//==RATING======================================
const ratings = document.querySelectorAll('.rating');
if (ratings.length > 0) {
    initRatings();
}
// ???????????????? ??????????????
function initRatings() {
    let ratingActive, ratingValue;
    // "????????????" ???? ???????? ?????????????????? ???? ????????????????
    for (let index = 0; index < ratings.length; index++) {
        const rating = ratings[index];
        initRating(rating);
    }

    // ???????????????????????????? ???????????????????? ??????????????
    function initRating(rating) {
        initRatingVars(rating);

        setRatingActiveWidth();

        if (rating.classList.contains('rating_set')) {
            setRating(rating);
        }
    }

    // ???????????????????????????? ????????????????????
    function initRatingVars(rating) {
        ratingActive = rating.querySelector('.rating__active');
        ratingValue = rating.querySelector('.rating__value');
    }
    // ???????????????? ???????????? ???????????????? ??????????
    function setRatingActiveWidth(index = ratingValue.innerHTML) {
        const ratingActiveWidth = index / 0.05;
        ratingActive.style.width = `${ratingActiveWidth}%`;
    }
    // ?????????????????????? ?????????????? ????????????
    function setRating(rating) {
        const ratingItems = rating.querySelectorAll('.rating__item');
        for (let index = 0; index < ratingItems.length; index++) {
            const ratingItem = ratingItems[index];
            ratingItem.addEventListener("mouseenter", function (e) {
                // ???????????????????? ????????????????????
                initRatingVars(rating);
                // ???????????????????? ???????????????? ??????????
                setRatingActiveWidth(ratingItem.value);
            });
            ratingItem.addEventListener("mouseleave", function (e) {
                // ???????????????????? ???????????????? ??????????
                setRatingActiveWidth();
            });
            ratingItem.addEventListener("click", function (e) {
                // ???????????????????? ????????????????????
                initRatingVars(rating);

                if (rating.dataset.ajax) {
                    // "??????????????????" ???? ????????????
                    setRatingValue(ratingItem.value, rating);
                } else {
                    // ???????????????????? ?????????????????? ??????????
                    ratingValue.innerHTML = index + 1;
                    setRatingActiveWidth();
                }
            });
        }
    }

    async function setRatingValue(value, rating) {
        if (!rating.classList.contains('rating_sending')) {
            rating.classList.add('rating_sending');

            // ?????????????????? ???????????? (value) ???? ????????????
            let response = await fetch('rating.json', {
                method: 'GET',

                //body: JSON.stringify({
                //	userRating: value
                //}),
                //headers: {
                //	'content-type': 'application/json'
                //}

            });
            if (response.ok) {
                const result = await response.json();

                // ???????????????? ?????????? ??????????????
                const newRating = result.newRating;

                // ?????????? ???????????? ???????????????? ????????????????????
                ratingValue.innerHTML = newRating;

                // ???????????????????? ???????????????? ??????????
                setRatingActiveWidth();

                rating.classList.remove('rating_sending');
            } else {
                alert("????????????");

                rating.classList.remove('rating_sending');
            }
        }
    }
}
//========================================
//Animate
function animate({ timing, draw, duration }) {
    let start = performance.now();
    requestAnimationFrame(function animate(time) {
        // timeFraction ???????????????????? ???? 0 ???? 1
        let timeFraction = (time - start) / duration;
        if (timeFraction > 1) timeFraction = 1;

        // ???????????????????? ???????????????? ?????????????????? ????????????????
        let progress = timing(timeFraction);

        draw(progress); // ???????????????????? ????

        if (timeFraction < 1) {
            requestAnimationFrame(animate);
        }

    });
}
function makeEaseOut(timing) {
    return function (timeFraction) {
        return 1 - timing(1 - timeFraction);
    }
}
function makeEaseInOut(timing) {
    return function (timeFraction) {
        if (timeFraction < .5)
            return timing(2 * timeFraction) / 2;
        else
            return (2 - timing(2 * (1 - timeFraction))) / 2;
    }
}
function quad(timeFraction) {
    return Math.pow(timeFraction, 2)
}
function circ(timeFraction) {
    return 1 - Math.sin(Math.acos(timeFraction));
}
/*
animate({
	duration: 1000,
	timing: makeEaseOut(quad),
	draw(progress) {
		window.scroll(0, start_position + 400 * progress);
	}
});*/

//????????????????
(function () {
    // ?????????????????? ??????????????????
    if (!Element.prototype.closest) {
        // ??????????????????
        Element.prototype.closest = function (css) {
            var node = this;
            while (node) {
                if (node.matches(css)) return node;
                else node = node.parentElement;
            }
            return null;
        };
    }
})();
(function () {
    // ?????????????????? ??????????????????
    if (!Element.prototype.matches) {
        // ???????????????????? ????????????????
        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector;
    }
})();
//variables
const filterItem = document.querySelector('.catalog-filters-mobile__select');
const filterSelectList = document.querySelector('.select-list');
const addToCartBtns = document.querySelectorAll('.product__btn');
const enlargeBtn = document.querySelector('.product__enlarge');

const enlargeModal = document.querySelector('.enlarge-modal');
const overlay = document.querySelector('.overlay');
const btnCloseModal = document.querySelector('.close-modal');

//filter dropdown
if (filterItem) {
    filterItem.addEventListener('click', () => {
        filterSelectList.classList.toggle('hidden');
        filterItem.classList.toggle('active');
    });
}
//add to cart buttons
if (window.innerWidth < 700) {
    for (let i = 0; i < addToCartBtns.length; i++) {
        addToCartBtns[i].textContent = '?? ??????????????';
    }
}

if (enlargeBtn) {
    const openModal = function () {
        enlargeModal.classList.remove('hidden');
        overlay.classList.remove('hidden');
        document.body.classList.add('_lock');
        const activeSlide = document.querySelector('.swiper-slide-active');
        const enlargeImage = document.querySelector('.enlarge-image');
        enlargeImage.innerHTML = `<img src='${activeSlide.firstElementChild.attributes[0].nodeValue}'>`;
    };

    const closeModal = function () {
        enlargeModal.classList.add('hidden');
        overlay.classList.add('hidden');
        document.body.classList.remove('_lock');
    };

    btnCloseModal.addEventListener('click', closeModal);
    enlargeBtn.addEventListener('click', openModal);
    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (evt) {
        if (evt.key === 'Escape') {
            if (!enlargeModal.classList.contains('hidden')) {
                closeModal();
            }
        }
    });
}