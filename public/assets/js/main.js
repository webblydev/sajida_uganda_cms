(function ($) {
  ("use strict");

  // mobile nav

  $(".humbarger").on("click", function () {
    $(this).toggleClass("active");
    $(".ic-navbar-ul-nav").toggleClass("active");
    $(".ic-overlay").toggleClass("active");
  });

  $(document).on("click", ".ic-overlay", function () {
    $(this).removeClass("active");
    $(".ic-navbar-ul-nav").removeClass("active");
    $(".humbarger").removeClass("active");
  });
  $(document).on("click", ".ic-sidebarClosed", function () {
    $(".ic-navbar-ul-nav").removeClass("active");
    $(".humbarger").removeClass("active");
  });

  /*========================================
     Scroll  top
    ========================================*/

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 50) {
      $(".header").addClass("sticky");
      $(".ic__logoSlider--part").addClass("ic--logo-add");
      $(".ic-scroll-top").css({
        bottom: "4%",
        opacity: "1",
        transition: "all .5s ease-in-out",
      });
    } else {
      $(".header").removeClass("sticky");
      $(".ic__logoSlider--part").removeClass("ic--logo-add");
      $(".ic-scroll-top").css({
        bottom: "-5%",
        opacity: "0",
        transition: "all .5s ease-in-out",
      });
    }
  });
  $(".ic-scroll-top").on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      0
    );
    return false;
  });

  /*========================================
        Preloader
    ========================================*/

  $(window).on("load", function () {
    $(".loader").fadeOut(500);
  });

  // coach details
  $(".slider-left-image").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    asNavFor: ".slider-right-content",
    autoplay: true,
    fade: true,
    speed: 1000,
    cssEase: 'linear'
  });
  $(".slider-right-content").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    focusOnSelect: true,
    asNavFor: ".slider-left-image",
    fade: true,
    speed: 1000,
    cssEase: 'linear'
  });

  $(".ic-impacted-text-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    asNavFor: ".ic-impacted-content-slider",
    autoplay: true,
    autoplaySpeed: 8000,
    fade: true,
    speed: 1000,
    cssEase: 'linear',
  });
  $(".ic-impacted-content-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    asNavFor: ".ic-impacted-text-slider",
    autoplay: true,
    autoplaySpeed: 8000,
    fade: true,
    speed: 1000,
    cssEase: 'linear',
  });

  $(".ic-award-achivement-slider").slick({
    dots: true,
    arrows: false,
    infinite: true,
    fade: true,
    speed: 1000,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".ic-team-member-slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 4,
    slidesToScroll: 1,
    nextArrow: ".ic-team-member-left-button",
    prevArrow: ".ic-team-member-right-button",
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          dots: true,
          arrows: false,
        },
      },
      {
        breakpoint: 992,
        settings: {
          dots: true,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".ic-feature-slider-main").slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 1000,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 3,
    slidesToScroll: 1,
    nextArrow: ".feature-btn-left",
    prevArrow: ".feature-btn-right",
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          dots: false,
          arrows: false,
        },
      },
      {
        breakpoint: 992,
        settings: {
          dots: false,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".ic-our-unique-text-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    asNavFor: ".ic-unique-images-slider",
    fade: true,
    speed:1500,
    cssEase: 'linear',
    adaptiveHeight: false
  });

  $(".ic-unique-images-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    asNavFor: ".ic-our-unique-text-slider",
    fade: true,
    speed: 1500,
    cssEase: 'linear',
    adaptiveHeight: false
  });

  // tabs
  $('.tabs-link').on('click', function(e){
    $('.tabs-link').removeClass('active');
    $(this).addClass('active');
  });

})(jQuery);

var deleteLink = document.querySelectorAll('.unique-links');

for (var i = 0; i < deleteLink.length; i++) {
    deleteLink[i].addEventListener('click', function(event) {
        console.log('clicked')
        if ($('.tab-pane').hasClass('active')) {
            event.preventDefault();
            $(".ic-our-unique-text-slider").slick("refresh");
            $(".ic-unique-images-slider").slick("refresh");
        }
    });
}
