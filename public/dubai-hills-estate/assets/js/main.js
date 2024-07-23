(function($) {
    'use strict';

    // Navbar Link Scroll JS
    $('.navbar-nav li a, .scroll-down, .main-banner-content .btn').on('click', function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 60
        }, 0);
        e.preventDefault();
    });
    $('.navbar .navbar-nav li a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
    });

    // Popup Video
    $('.popup-youtube').magnificPopup({
        disableOn: 320,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // Popup Image
    $('.popup-btn').magnificPopup({
        type: 'image',
        gallery: {
            enabled:true
        }
    });

    // WOW JS
    $(window).on ('load', function (){
        if ($(".wow").length) {
            var wow = new WOW({
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 20, // distance to the element when triggering the animation (default is 0)
                mobile: true, // trigger animations on mobile devices (default is true)
                live: true, // act on asynchronously loaded content (default is true)
            });
            wow.init();
        }
    });

    // Preloader Area
    jQuery(window).on('load', function() {
        $('.preloader').fadeOut();
    });

    // Home Slides
    var swiper = new Swiper('.home-slides', {
        loop: true,
        slidesPerView: 1,
        autoplay: true,
        effect: 'fade',
        speed: 1000,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    // Tabs
    (function ($) {
        $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
        $('.tab ul.tabs li a').on('click', function (g) {
            var tab = $(this).closest('.tab'),
                index = $(this).closest('li').index();
            tab.find('ul.tabs > li').removeClass('current');
            $(this).closest('li').addClass('current');
            tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
            tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
            g.preventDefault();
        });
    })(jQuery);

    // Header Sticky
    $(window).on('scroll',function() {
        if ($(this).scrollTop() > 120){
            $('.navbar').addClass("is-sticky");
        }
        else {
            $('.navbar').removeClass("is-sticky");
        }
    });

    // Go to Top
    $(function(){
        //Scroll event
        $(window).on('scroll', function(){
            var scrolled = $(window).scrollTop();
            if (scrolled > 300) $('.go-top').fadeIn('slow');
            if (scrolled < 300) $('.go-top').fadeOut('slow');
        });
        //Click event
        $('.go-top').on('click', function() {
            $("html, body").animate({ scrollTop: "0" },  0);
        });
    });

})(jQuery);