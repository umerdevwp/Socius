/*jslint browser: true*/
/*global $, jQuery ,*/

(function($) {

    "use strict";

    var $window = $(window),
        $body = $('body'),
        $fshppMenu = $('.fshp-header'),
        $mainSlider = $('.main-slider'),
        $screenshotsSlider = $('.screenshots-slider'),
        $testimonialSslider = $('.testimonial-slider'),
        $teamSlider = $('.team-slider'),
        $logosSlider = $('.logos-slider'),
        $reviewsSlider = $('.reviews-slider');

    /*START PRELOADER JS & REFRESH AOS*/
  /*   $window.on('load', function() {
        $('.preloader').delay(350).fadeOut('slow');
        AOS.refresh();
    }); */
    /*END PRELOADER JS & REFRESH AOS*/


    $(document).ready(function() {


        /*START SCROLL SPY JS*/
        $body.scrollspy({
            target: '#main_menu',
        });
        /*END SCROLL SPY JS*/


        $window.scroll(function() {
            var currentLink = $(this);
            if ($(currentLink).scrollTop() > 500) {
                $fshppMenu.addClass("sticky");
            } else {
                $fshppMenu.removeClass("sticky");
            }
        });
        /*END MENU JS*/

        /*START MAIN SLIDER JS*/
        if ($mainSlider.length > 0) {
            $mainSlider.slick({
                slidesToShow: 1,
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                ]
            });
        }
        /*END MAIN SLIDER JS*/

        /*START SCREENSHOTS SLIDER JS*/
        if ($screenshotsSlider.length > 0) {
            $screenshotsSlider.slick({
                centerMode: false,
                centerPadding: '40px',
                slidesToShow: 3,
                infinite: true,
                focusOnSelect: true,
                arrows: true,

                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: 2,
                          slidesToScroll: 3,
                          infinite: true,
                        }
                      },
                      {
                        breakpoint: 600,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 2
                        }
                      },
                      {
                        breakpoint: 480,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                        }
                      }
                ]
            });
        }
        /*END SCREENSHOTS SLIDER JS*/


        /*START LOGOS SLIDER JS*/
        if ($logosSlider.length > 0) {
            $logosSlider.slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                arrows: true,
                centerMode: true,
                responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 995,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                    },
                    
                ]
            });
        }
        /*END LOGOS SLIDER JS*/

        /*START RECENT NEWS SLIDER JS*/
        if ($reviewsSlider.length > 0) {
            $reviewsSlider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                responsive: [{
                        breakpoint: 1200,
                        settings: {}
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ]
            });
        }
        /*END RECENT NEWS SLIDER JS*/

    });


    $('#v-pills-tab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })

}(jQuery));




jQuery($=> {
    "use strict";
    /* =====================================
             Fancy Box Image viewer
      ====================================== */
    $('[data-fancybox]').fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        buttons: [
            'slideShow',
            'fullScreen',
            'thumbs',
            'share',
            // 'download',
            'zoom',
            'close'
        ],
    });


    /* =====================================
                CubePortfolio
    ====================================== */
    
    /*Gallery without spaces*/
    $("#grid-mosaic").cubeportfolio({
        filters: "#mosaic-filter",
        layoutMode: 'grid',
        defaultFilter: "*",
        animationType: "rotateSides",
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4,
        }, {
            width: 1100,
            cols: 3,
        }, {
            width: 767,
            cols: 2,
        }, {
            width: 480,
            cols: 1,
        }],
        plugins: {
            loadMore: {
                element: '#js-loadMore-mosaic',
                action: 'click',
                loadItems: 3,
            }
        },
    });
    
//    end of js
});