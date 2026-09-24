/**
 * Fitzone front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Slick, Magnific Popup and the datepicker
 * that build the same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.datepicker('#datepicker');

  UI.owl('.player_info_item', {
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    margin: 40,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: [
      '<img src="img/icon/left.svg" alt="">',
      '<img src="img/icon/right.svg" alt="">'
    ],
    responsive: {
      0: { margin: 15 },
      600: { margin: 10 },
      1000: { margin: 10 }
    }
  });

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // niceSelect js code
  UI.enhanceSelects('select');

  UI.owl('.client_review_part', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false
  });

  // menu fixed js code
  window.addEventListener('scroll', function () {
    var fixed = window.pageYOffset + 1 > 50;
    UI.toElements('.main_menu').forEach(function (menu) {
      menu.classList.toggle('menu_fixed', fixed);
      menu.classList.toggle('animated', fixed);
      menu.classList.toggle('fadeInDown', fixed);
    });
  }, { passive: true });

  // The slider and its thumbnail strip.
  UI.ready(function () {
    function show(el) {
      el.style.display = '';
      if (window.getComputedStyle(el).display === 'none') el.style.display = 'block';
    }
    // Mark one thumbnail slide (by position, clones included) as active.
    function activateThumb(index) {
      UI.toElements('.slider-nav-thumbnails .slick-slide').forEach(function (slide, i) {
        slide.classList.toggle('slick-active', i === index);
      });
    }

    UI.toElements('.slider').forEach(function (slider) {
      // On before slide change match active thumbnail to current slide
      slider.addEventListener('beforeChange', function (e) {
        activateThumb(e.detail.nextSlide);
      });
      slider.addEventListener('afterChange', function (e) {
        UI.toElements('.content[data-id]').forEach(function (el) { el.style.display = 'none'; });
        UI.toElements('.content[data-id="' + (e.detail.currentSlide + 1) + '"]').forEach(show);
      });
    });

    UI.slick('.slider', {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      speed: 300,
      infinite: true,
      asNavFor: '.slider-nav-thumbnails',
      // autoplay:true,
      pauseOnFocus: true,
      dots: true
    });

    UI.slick('.slider-nav-thumbnails', {
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider',
      focusOnSelect: true,
      infinite: true,
      prevArrow: false,
      nextArrow: false,
      centerMode: true,
      responsive: [{
        breakpoint: 480,
        settings: { centerMode: false }
      }]
    });

    // Only the first thumbnail slide starts out active.
    activateThumb(0);
  });

  UI.magnific('.gallery_img', {
    type: 'image',
    gallery: { enabled: true }
  });
}());
