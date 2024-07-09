// swiperConfig.js
window.initSwiper = function ($swiperServices) {
  var swiper = new Swiper($swiperServices, {
    slidesPerView: 6,
    spaceBetween: 30,
    breakpoints: {
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
      },
      768: {
        slidesPerView: 2,
        slidesPerGroup: 1,
      },
      991: {
        slidesPerView: 3,
        slidesPerGroup: 1,
      },
      1800: {
        slidesPerView: 4,
        slidesPerGroup: 1,
      },
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 3500,
    },
  });
};
