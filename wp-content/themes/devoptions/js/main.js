//Global sticky scrolling behavior
var pos;
var formEndPoint = 10; //Modify this value as needed
var prevPos = $('body').scrollTop() || $('html').scrollTop();
$(window).scroll(function(e) {
    pos = $('body').scrollTop() || $('html').scrollTop();
    // Show sticky desktop.
    if(pos > formEndPoint) {
        $('.masthead').addClass('has-scrolled');
        $('.sticky-nav').addClass('sticky');
    }
    else {
        $('.masthead').removeClass('has-scrolled');
        $('.sticky-nav').removeClass('sticky');
    }
    // For Mobile.
    if( pos > prevPos || pos == 0) {
        // Scrolling down, hide sticky mobile.
        $('.masthead').removeClass('scrolling-up');
    }
    else {
        // Scrolling up, show sticky mobile.
        if( $('.masthead').hasClass('has-scrolled') ){
            $('.masthead').addClass('scrolling-up');
        } else {
            $('.masthead').removeClass('scrolling-up');
        }
    }
    // Set previous scroll position to new scroll position for tracking (of scroll direction).
    prevPos = pos;

});

//Check for sticky on page load
function display_sticky() {
    if(prevPos > formEndPoint) {
        $('.sticky-nav').addClass('sticky');
    } else {
        $('.sticky-nav').removeClass('sticky');
    }
}
//Bvalidator options
var options = {
    classNamePrefix: 'bvalidator_',
    position: {x:'left', y:'top'},
    validClass: true,
    validateOn: 'keyup'
}

$(document).ready(function() {
    display_sticky();

    // Gallery Lightbox Form
    if( $('.lightbox-form').length > 0 ) {
        // Lightbox Form Scripts
        var lightboxForm = $('.lightbox-form');
        $("[data-fancybox].custom-lightbox").fancybox({
            buttons: [
                "close"
            ],
            loop: true,
            thumbs: {
                autoStart: false,
                axis: "x",
            },

            transitionEffect: "slide",
            beforeShow: function () {
                if (lightboxForm.parent().hasClass('.fancybox-container')) {
                    // Do nothing - form already appended to fancybox
                    $('.fancybox-container').addClass('lightbox-form-container');
                } else {
                    lightboxForm.prependTo('.fancybox-container');
                    $('.fancybox-container').addClass('lightbox-form-container');
                }
                lightboxForm.addClass('shown');
            },
            beforeClose: function () {
                lightboxForm.removeClass('shown');
            }
        });
        
        // Multiple select field options
        $('select[multiple]').multiselect({
            columns: 3,
            placeholder: 'Select A Product',
            onLoad: function(element) {
                var $select = $(element),
                    $group = $select.closest('.form-group'),
                    $labels = $('li > label', $group);
                    
                $select.hide();
                
                $labels.each(function(i, label) {
                    var $label = $(label),
                        value = $label.text();
                    
                    if (typeof form_icons[value] === 'string') {
                        var src = form_icons[value],
                            $img = $('<img>');
                        
                        $img.attr('data-src', src).addClass('lazyload');
                        
                        $label.prepend($img);
                    }
                });
                
                    // console.log(arguments, element, form_icons);
            },
            onOptionClick: function(element,option){
                var $checkbox = $(option),
                    $group = $checkbox.closest('.form-group'),
                    $form = $checkbox.closest('form'),
                    $checkboxes = $('[type="checkbox"]:checked', $group),
                    products = [];
                
                $checkboxes.each(function(i, checkbox){
                    products.push($(checkbox).val());
                });
                
				var val = products.join(', ');
				jQuery('.select-hidden', $form).val(val);
                
                console.log('Products:', val);

            }
        });
        $('.ms-options-wrap button').keyup(function () {
            if ($(this).val() == '') {
                //Check to see if there is any text entered
                // If there is no text within the input ten disable the button
                $(this).prop('disabled', false);
            } else {
                //If there is text in the input, then enable the button
                $(this).prop('disabled', true);
            }
        });
        
        $('.special-select select').each(function(){
            $('<option value="">Product</option>').prependTo($(this));
        });

    }

    // Add active class to accordion parent when clicked
    $('.sm-accordion .collapse.show').each(function(){
        addAccordionClasses($(this));
    });
    $('.sm-accordion .card-header button').click(function(){
       addAccordionClasses($(this));
    });
    function addAccordionClasses(element) {
        element.closest('.sm-accordion').find('.card').not(element.closest('.card')).removeClass('active');
        if( element.closest('.card').hasClass('active') ) {
           element.closest('.card').removeClass('active');
       }else{
           element.closest('.card').addClass('active');
       }
    }

    // Form defaults
    $('.wufoo').bValidator(options);
    $('.phone_us').mask('(000) 000-0000');
    $('.zip_us').mask('00000');
    //Customize mmenu settings as necessary
    $("#mmenu").mmenu({
        navbars: [{
            content: [ "<span>" + settings.company.name + "</span>", "close" ]
        }],
        extensions: [
            "position-right", //menu location: position-left, position-right
            "position-front", //keeps sticky in place
            "border-full", //dividers full-width
            "fx-listitems-slide", //new fancy animate-in effect: slide, fade, drop
            "pagedim-black", //dim page when menu is open
            "fullscreen", //fullscreen menu
       ]
    });

    $('img').addClass('img-fluid');
    $('a[href*="tel"]').on('click', function() {
        gtag( 'event', 'click', {'event_category' : 'Call', 'event_action' : 'Click', 'event_label' : 'Click to Call'});
    });

    // Let page load to avoid shifting elements animating in
    $('.to-animate, .fade').viewportChecker({
        classToAdd: 'visible animated',
        offset: 0
    });
    //Allow dummy parent links to click into their child menu in mmenu
    $( "#mmenu li.dummy a.mm-next" ).each( function( index ) {
        var mobileurl = $( this ).attr('href');
        $( this ).next('a').attr('href',mobileurl);
    });
    jQuery('.mobile-app-nav .services-button').click(function(){
        jQuery('.mobile-app-services').toggleClass('active');
    });
    
    $('.internal-hentry').css({'min-height': $('.sidebar-sticky').innerHeight()});
    
    // Adds class to "Why Choose Us" modal
    $( 'a.cta' ).on("click", function() {
        $( '.lightbox-product-form' ).addClass('cta-form');
    });
    $( '.lightbox-product-form .close' ).on("click", function() {
        $( '.lightbox-product-form' ).removeClass('cta-form');
    });
    
    // Adds class to body when click sticky nav modal
    $( '.sticky-nav .menu-toggle' ).on("click", function() {
        $( 'body' ).addClass('sticky-open');
    });
    $( '.sticky-menu-lightbox .close' ).on("click", function() {
        $( 'body' ).removeClass('sticky-open');
    });
    
    // If product gallery doesn't exist on a product page, make first gallery active
    if ($('.nav-tabs li .gallery-item').hasClass('active')) {
        console.log('true');
    } else {
        $('.nav-tabs li:eq(0) .gallery-item').addClass("active show");
        $('.gallery-container .tab-content .tab-pane:eq(0)').addClass("active show");
    }
    
    
    // Slick Slider for Why CHoose lightbox
    $('.cta-slider').slick({
        lazyLoad: 'ondemand',
    	slidesToShow: 1,
    	slidesToScroll: 1,
        arrows: true,
        dots: true,
        prevArrow: '<span class="left-arrow cta-arrow"><i class="fas fa-arrow-left"></i></span>',
        nextArrow: '<span class="right-arrow cta-arrow"><i class="fas fa-arrow-right"></i></span>'
    });

}); //End doc.ready

// Slick Slider for Why Choose Section
$('.circle-cta-container').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
    mobileFirst: true,
    arrows: false,
    dots: false,
    asNavFor: '.cta-nav',
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }
    ]
});
$('.cta-nav').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    dots: false,
    asNavFor: '.circle-cta-container',
    prevArrow: '<span class="left-arrow cta-arrow"><i class="fas fa-arrow-left"></i></span>',
    nextArrow: '<span class="right-arrow cta-arrow"><i class="fas fa-arrow-right"></i></span>'
});

// Slick Slider for Trust Logos Section
$('.logos').slick({
    lazyLoad: 'ondemand',
	slidesToShow: 2,
	slidesToScroll: 2,
    mobileFirst: true,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 3000,
    speed:1000,
    prevArrow: '<span class="left-arrow trust-arrow"><i class="fas fa-arrow-left"></i></span>',
    nextArrow: '<span class="right-arrow trust-arrow"><i class="fas fa-arrow-right"></i></span>',
    responsive: [
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5
            }
        }
    ]
});

// Homepage Product Selector
$(".selector-nav > li").click(function() {

    var clickedNavItem = $(this);
    var tabToShow = clickedNavItem.data('tab');
    $(".selector-nav > li").removeClass("active"); //Remove any "active" class

    clickedNavItem.addClass("active"); //Add "active" class to selected tab

    $('.product-selector .tab-pane').removeClass('active');
    $('.product-selector .tab-pane' + '#tab-' + tabToShow).addClass('active');
	return false;

});



    
//Use the following functions if you need to trigger JS at different screen sizes
function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

function same_height() {
    var vpWidth = viewport().width; //This should match media query
    if (vpWidth < 992) {
        
    } else {
        //Do something else
    }
}
