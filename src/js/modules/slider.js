// src/js/modules/slider.js
import { Swiper } from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('.slider')) {
    const opciones = {
      modules: [Navigation, Pagination],
      slidesPerView: 1,
      spaceBetween: 15,
      freeMode: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    };
    Swiper.use([Navigation, Pagination]);
    new Swiper('.slider', opciones);
  }
});