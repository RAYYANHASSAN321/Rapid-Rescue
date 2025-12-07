//  Initialize Swiper start
var swiper = new Swiper(".mySwiper", {
    // slidesPerView: 7,
    // spaceBetween: 30,
    slidesPerGroup: 1,
    autoplay:true,
  autoplaySpeed:1500,
    loop: true,
    fade: true,
    grabCursor: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        300: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        500: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        868: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1000: {
            slidesPerView:3,
            spaceBetween: 30,
        },
        1250: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },
});



  //  Initialize Swiper end

  var swiper = new Swiper(".mycontainer", {
    // slidesPerView: 7,
    // spaceBetween: 30,
    slidesPerGroup: 1,
    loop: false,
    fade: true,
    grabCursor: true,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        500: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        868: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1000: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1250: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});




document.addEventListener('DOMContentLoaded', function () {
    // Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 150) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Hamburger Menu Toggle
    const hamburgerMenu = document.querySelector('.hamburger-menu');s
    const sidebar = document.querySelector('.sidebar');

    hamburgerMenu.addEventListener('click', function () {
        sidebar.style.left = sidebar.style.left === '0px' ? '-250px' : '0px';
    });
});