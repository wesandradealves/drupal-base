/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.brasilit2022 = {
    attach: function (context, settings) {
      $('main', context).once('brasilit2022').each(function () {
        $('.owl-banner').owlCarousel({
          loop:true,
          nav:false,
          dots:true,
          items:1
        })   
  
        // setTimeout(() => {
        //   if(document.querySelectorAll('.eapps-link').length) document.querySelectorAll('.eapps-link')[0].remove()
        // }, 1000);
  
        // var clone = document.querySelector("header").cloneNode(true);
  
        // // Sticky header
        // clone.classList.add('sticky-header');
        // document.querySelector('.region-top-header').prepend(clone);
  
        // Scroll events
        document.addEventListener('scroll', function(e) {
            // if((window.scrollY + 80) >= document.querySelectorAll('.float-navigation')[0].scrollHeight) {
            //     document.querySelectorAll('.float-navigation')[0].classList.add('stick');
            // } else {
            //     document.querySelectorAll('.float-navigation')[0].classList.remove('stick');
            // }
  
            // if(window.scrollY > document.querySelectorAll('.sticky-header')[0].scrollHeight) {
            //     document.querySelectorAll('.sticky-header')[0].classList.add('stick');
            // } else {
            //     document.querySelectorAll('.sticky-header')[0].classList.remove('stick');
            // }            
        })  
      })
    }
  };

})(jQuery, Drupal);
