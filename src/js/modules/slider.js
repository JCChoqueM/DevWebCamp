// src/js/modules/slider.js
import { Swiper } from 'swiper';
import 'swiper/css';


document.addEventListener('DOMContentLoaded', function(){
   if(document.querySelector('.swiper')) {
        new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }
});