jQuery(document).ready(function ($) {
    "use strict";

    $('a[href=\\#]').on('click', function (e) {
        e.preventDefault();
    })

    $('#myTab a').on('click', function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	/* Page scroll Bottom To Top */
    if ($(".scroll-wrap").length) {
        var progressPath = document.querySelector('.scroll-wrap path');
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        var updateProgress = function() {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);
        var offset = 50;
        var duration = 10;
        jQuery(window).on('scroll', function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.scroll-wrap').addClass('active-scroll');
            } else {
                jQuery('.scroll-wrap').removeClass('active-scroll');
            }
        });
        jQuery('.scroll-wrap').on('click', function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, duration);
            return false;
        })
    }

    // product cat menu
    var classHandler = true;
    $("#course-button").on('click', function(){
        if(classHandler){
            $(".cat-course-close").addClass('cat-course-open');
            $(".course-button").addClass('course-button-open');
        }else {
            $(".cat-course-close").removeClass('cat-course-open');
            $(".course-button").removeClass('course-button-open');
        }
        classHandler = !classHandler;
    });

    // Course search category select
    $('.rt-course-search .rt-dropdown').on('click','ul li a', function (e) {
        e.preventDefault();
        var text = $(this).text(),
            cat = $(this).data('cat'),
            $parent = $(this).closest('.rt-course-search');
        $parent.find('.rt-cat').text(text);
        $parent.find('input[name="course_category"]').val(cat);
    });
    
    // Archive sort by
    $('#rt-course-filter-select').on('change', function(e){
        $('#rt-course-sort-form').submit()
    });


    /*---------------------------------------
    Background Parallax
    --------------------------------------- */
    if ($(".rt-parallax-bg-yes").length) {
        $(".rt-parallax-bg-yes").each(function () {
            var speed = $(this).data('speed');
            $(this).parallaxie({
                speed: speed ? speed : 0.5,
                offset: 0,
            });
        })
    }    

    /* Theia Side Bar */
    if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
        $('.has-sidebar .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 80});
        $('.fixed-sidebar-addon .fixed-bar-coloum').theiaStickySidebar({'additionalMarginTop': 160});
    }


    if (typeof $.fn.theiaStickySidebar !== "undefined") {
    $(".sticky-coloum-wrap .sticky-coloum-item").theiaStickySidebar({
      additionalMarginTop: 130,
    });
  }

    /* Header Search */
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (event) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });

    /* masonary */
    var galleryIsoContainer = $(".rt-masonry-grid");
    if (galleryIsoContainer.length) {
        var imageGallerIso = galleryIsoContainer.imagesLoaded(function () {
            imageGallerIso.isotope({
                itemSelector: ".rt-grid-item",
                percentPosition: true,
                isAnimated: true,
                masonry: {
                    columnWidth: ".rt-grid-item",                        
                },
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
        });
    }

    /* Isotope */
    if (typeof $.fn.isotope == 'function') {
        var $parent = $('.rt-isotope-wrapper'),
            $isotope;
        var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
            $isotope = $(".rt-isotope-content", $parent).isotope({
                filter: "*",
                transitionDuration: "1s",
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(0.001)"
                },
                visibleStyle: {
                    transform: "scale(1)",
                    opacity: 1
                }
            });
            $('.rt-isotope-tab a').on('click', function () {
                var $parent = $(this).closest('.rt-isotope-wrapper'),
                    selector = $(this).attr('data-filter');
                $parent.find('.rt-isotope-tab .current').removeClass('current');
                $(this).addClass('current');
                $isotope.isotope({
                    filter: selector
                });

                return false;
            });

            $(".rt-isotope-tab a").first().trigger('click');
        });
    }
    
    /* Mobile menu */
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $("body").addClass("not-top");
            $("body").removeClass("top");
        } else {
            $("body").addClass("top");
            $("body").removeClass("not-top");
        }
    });

    /*Social print*/
    $(document).on('click', '.print-share-button', function (e) {
        console.log();
        e.preventDefault();
        window.print();
        return false;
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });

    // Advanced Search Revel
    $(".advanced-btn").on("click", function () {
        $(this).toggleClass("collapsed");
        $("#advanced-search").toggleClass("show");

    });

    /* Header Right Menu */
    var menuArea = $('.additional-menu-area');
    menuArea.on('click', '.side-menu-trigger', function (e) {
        e.preventDefault();
        var self = $(this);
        if (self.hasClass('side-menu-open')) {
            if( quiklearnObj.rtl =='rtl'  ) {
                $('.sidenav').css('transform', 'translateY(0%)');
            }else {
                $('.sidenav').css('transform', 'translateY(0%)');
            }
            if (!menuArea.find('> .rt-cover').length) {
                menuArea.append("<div class='rt-cover'></div>");
            }
            self.removeClass('side-menu-open').addClass('side-menu-close');
        }
    });
	
	/*-------------------------------------
	Offcanvas Menu activation code
	-------------------------------------*/
    function closeMenuArea() {
        var trigger = $('.side-menu-trigger', menuArea);
        trigger.removeClass('side-menu-close').addClass('side-menu-open');
        if (menuArea.find('> .rt-cover').length) {
            menuArea.find('> .rt-cover').remove();
        }

        if( quiklearnObj.rtl =='rtl'  ) {
            $('.sidenav').css('transform', 'translateY(100%)');
        }else {
            $('.sidenav').css('transform', 'translateY(-120%)');
        }
    }

    menuArea.on('click', '.closebtn', function (e) {
        e.preventDefault();
        closeMenuArea();
    });

    $(document).on('click', '.rt-cover', function () {
        closeMenuArea();
    });
	
    /*-------------------------------------
    MeanMenu activation code
    --------------------------------------*/
    var a = $('.offscreen-navigation .menu');
    if (a.length) {
        $(".menu-item-has-children").append("<span></span>");
        $(".page_item_has_children").append("<span></span>");

        a.children("li").addClass("menu-item-parent");

        $('.menu-item-has-children > span').on('click', function () {
            var _self = $(this),
                sub_menu = _self.parent().find('>.sub-menu');
            if (_self.hasClass('open')) {
                sub_menu.slideUp();
                _self.removeClass('open');
            } else {
                sub_menu.slideDown();
                _self.addClass('open');
            }
        });
        $('.page_item_has_children > span').on('click', function () {
            var _self = $(this),
                sub_menu = _self.parent().find('>.children');
            if (_self.hasClass('open')) {
                sub_menu.slideUp();
                _self.removeClass('open');
            } else {
                sub_menu.slideDown();
                _self.addClass('open');
            }
        });
    }

    $('.mean-bar .sidebarBtn').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('slidemenuon');
    });

    /*Header and mobile menu stick*/
    $(window).on('scroll', function () {
        if ($('body').hasClass('sticky-header')) {
            // Sticky header
            var stickyPlaceHolder = $("#sticky-placeholder"),
                menu = $("#header-menu"),
                menuH = menu.outerHeight(),
                topHeaderH = $('#tophead').outerHeight() || 0,
                middleHeaderH = $('#header-middlebar').outerHeight() || 0,
                targrtScroll = topHeaderH + middleHeaderH;
            if ($(window).scrollTop() > targrtScroll) {
                menu.addClass('rt-sticky');
                stickyPlaceHolder.height(menuH);
            } else {
                menu.removeClass('rt-sticky');
                stickyPlaceHolder.height(0);
            }

            // Sticky mobile header
            var stickyPlaceHolder = $("#mobile-sticky-placeholder"),
                menu = $(".mobile-mene-bar"),
                menuH = menu.outerHeight(),
                topHeaderH = $('#mobile-top-fix').outerHeight() || 0,
                topAdminH = $('#wpadminbar').outerHeight() || 0,
                targrtScroll = topHeaderH + topAdminH;
            if ($(window).scrollTop() > targrtScroll) {
                menu.addClass('mobile-sticky');
               stickyPlaceHolder.height(menuH);
            } else {
                menu.removeClass('mobile-sticky');
                stickyPlaceHolder.height(0);
            }
        }
    });

    // Popup - Used in video
    if (typeof $.fn.magnificPopup == 'function') {
        $('.rt-video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        $('.open-popup-link').magnificPopup({
            type: 'inline',
            midClick: true,
            mainClass: 'mfp-fade'
        });
    }
    if (typeof $.fn.magnificPopup == 'function') {
        if ($('.zoom-gallery').length) {
            $('.zoom-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a.quiklearn-popup-zoom', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }
    }

    /* when product quantity changes, update quantity attribute on add-to-cart button */
    $("form.cart").on("change", "input.qty", function () {
        var isgroup = $(this).parents('.woocommerce-grouped-product-list');
        if (this.value === "0"){
            if( ! isgroup.length > 0 ){
                this.value = "1";
            }
        }
        $(this.form).find("button[data-quantity]").data("quantity", this.value);
    });

    /* remove old "view cart" text, only need latest one thanks! */
    $(document.body).on("adding_to_cart", function () {
        $("a.added_to_cart").remove();
    });

    /*Quantity Product*/
    $(document).on('click', '.quantity .input-group-btn .quantity-btn', function () {
        var $input = $(this).closest('.quantity').find('.input-text');
        if ($(this).hasClass('quantity-plus')) {
            $input.trigger('stepUp').trigger('change');
        }
        if ($(this).hasClass('quantity-minus')) {
            $input.trigger('stepDown').trigger('change');
        }
    });

    $('.quantity-btn').on('click', function(){
        $("button[name='update_cart']").prop('disabled', false);
    });

    if( $('.header-shop-cart').length ){
        $( document ).on('click', '.remove-cart-item', function(){
          var product_id = $(this).attr("data-product_id");
          var loader_url = $(this).attr("data-url");
          var main_parent = $(this).parents('li.menu-item.dropdown');
          var parent_li = $(this).parents('li.cart-item');
          parent_li.find('.remove-item-overlay').css({'display':'block'});
          $.ajax({
            type: 'post',
            dataType: 'json',
            url: quiklearnObj.ajaxURL,
            data: { action: "quiklearn_product_remove", 
                product_id: product_id
            },success: function(data){
              main_parent.html( data["mini_cart"] );
              $( document.body ).trigger( 'wc_fragment_refresh' );
            },error: function(xhr, status, error) {
              $('.header-shop-cart').children('ul.minicart').html('<li class="cart-item"><p class="cart-update-pbm text-center">'+ quiklearnObj.cart_update_pbm +'</p></li>');
            }
          });
          return false;
        }); 
    }

    /* LearnPress */
    rdtheme_lp_scripts($);

});

function rdtheme_lp_scripts($) {
    /* Course change view */
    $('.rt-course-archive-top .rt-icons a').on('click', function () {
        $('body').removeClass('rt-course-grid-view').removeClass('rt-course-list-view');

        if ($(this).hasClass('rt-list')) {
            $('body').addClass('rt-course-list-view');
            Cookies.set('lpcourseview', 'list');
        } else {
            $('body').addClass('rt-course-grid-view');
            Cookies.set('lpcourseview', 'grid');
        }
        return false;
    });

    /* Curriculum accordian */
    $(document).ready(function () {
        $('.course-curriculum ul.curriculum-sections').each(function(){
            var mainEl = $(this);
            var section = mainEl.find('li.section');
            section.removeClass('closed');
            section.eq(0).slideDown();
            section.eq(0).toggleClass('is-active');
            section.on('click', '.section-header', function(e){
                $(this).parents('li').find('.section-content').slideToggle();
                $(this).parents('li').toggleClass('is-active');
            });
        });
    });
}

function quiklearn_load_content_area_scripts($) {
    /* progress circle */
    $('.rt-progress-circle').each(function () {
        var startcolor = $(this).data('rtstartcolor'),
            endcolor = $(this).data('rtendcolor'),
            num = $(this).data('rtnum'),
            speed = $(this).data('rtspeed'),
            suffix = $(this).data('rtsuffix');
        $(this).circleProgress({
            value: 1,
            fill: endcolor,
            emptyFill: startcolor,
            thickness: 5,
            size: 140,
            animation: {duration: speed, easing: "circleProgressEasing"},
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('.rtin-num').html(Math.round(num * progress) + suffix);
        });
    });
}

//function Load
function quiklearn_content_load_scripts() {
    var $ = jQuery;
    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    var windowWidth = $(window).width();

    imageFunction();
    function imageFunction() {
        $("[data-bg-image]").each(function () {
        let img = $(this).data("bg-image");
            $(this).css({
                backgroundImage: "url(" + img + ")",
            });
        });
    }

    /* Counter */
    var counterContainer = $('.counter');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: counterContainer.data('rtsteps'),
            time: counterContainer.data('rtspeed')
        });
    }

    // pricing table
    const pricingWrapper = $(".rt-pricing-tab");
    if (pricingWrapper) {
        $(".rt-pricing-tab").each(function() {
            $(".pricing-switch-container").on("click", function() {
                $(".pricing-switch")
                    .parents(".price-switch-box")
                    .toggleClass("price-switch-box--active"),
                    $(".pricing-switch").toggleClass("pricing-switch-active"),
                    $(".rt-tab-content").toggleClass("rt-active");
            });
        });
    }
	
    /* Wow Js Init */
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true,
        scrollContainer: null,
    });
    new WOW().init();

    /* Swiper slider */
    $('.rt-swiper-slider').each(function() {
        var $this = $(this);
        var settings = $this.data('xld');
        var autoplayconditon= settings['auto'];
        var $pagination = $this.find('.swiper-pagination')[0];
        var $next = $this.find('.swiper-button-next')[0];
        var $prev = $this.find('.swiper-button-prev')[0];
        var swiper = new Swiper( this, {
                autoplay: autoplayconditon,
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                pauseOnMouseEnter :true,
                slidesPerView: settings['slidesPerView'],
                spaceBetween:  settings['spaceBetween'],
                centeredSlides:  settings['centeredSlides'], 
                slidesPerGroup: settings['slidesPerGroup'],
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $next,
                    prevEl: $prev,
                },
                breakpoints: {
                    0: {
                        slidesPerView: settings['breakpoints']['0']['slidesPerView'],
                    },
                    576: {
                        slidesPerView: settings['breakpoints']['576']['slidesPerView'],
                    },
                    768: {
                        slidesPerView: settings['breakpoints']['768']['slidesPerView'],
                    },
                    992: {
                        slidesPerView: settings['breakpoints']['992']['slidesPerView'],
                    },
                    1200: {
                        slidesPerView:  settings['breakpoints']['1200']['slidesPerView'],
                    },
                    1600: {
                        slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
                    },                
                },
                on: {
                    afterInit: function (slider) {
                        if(settings['centeredSlides']){
                            $(slider.$wrapperEl).find('.swiper-slide').removeClass('visible-first visible-last');
                            $(slider.$wrapperEl).find('.swiper-slide.swiper-slide-prev').prev(".swiper-slide").addClass('visible-first');
                            $(slider.$wrapperEl).find('.swiper-slide.swiper-slide-next').next(".swiper-slide").addClass('visible-last');
                        }
                    },
                    slideChangeTransitionStart: function (slider) {
                        if(settings['centeredSlides']){
                            $(slider.$wrapperEl).find('.swiper-slide').removeClass('visible-first visible-last');
                            $(slider.$wrapperEl).find('.swiper-slide.swiper-slide-prev').prev(".swiper-slide").addClass('visible-first');
                            $(slider.$wrapperEl).find('.swiper-slide.swiper-slide-next').next(".swiper-slide").addClass('visible-last');
                        }
                    },        
                }
        });
        swiper.init();
    });

    /* Vertical Thumbnail slider */
    $('.quiklearn-vertical-slider').each(function(){
        var slider_wrap = $(this);
        var $pagination = slider_wrap.find('.swiper-pagination')[0];
        var target_thumb_slider = slider_wrap.find('.vertical-thumb-slider');
        var thumb_slider = null;
        if(target_thumb_slider.length){
            var settings = target_thumb_slider.data('xld');
            var autoplayconditon= settings['auto'] ;
            thumb_slider = new Swiper(target_thumb_slider[0],
                {
                autoplay:   autoplayconditon,
                autoplayTimeout: settings['autoplay']['delay'],
                speed: settings['speed'],
                loop:  settings['loop'],
                spaceBetween:  settings['spaceBetween'],  
                direction: "vertical",                
                pagination: {
                    el: $pagination,
                    clickable: true,
                    type: "bullets",
                },
            });
        }
    });

    //ajx-tab
    $('.rt_ajax_tab a').on('click', function(e){
        e.preventDefault();
        var cat_id = $(this).data('id');
        var args = $(this).parents().data('args'); 
        var layout = $(this).parents().data('layout'); 

        if ( cat_id == '*' ) {
            cat_id = null;
        }

        var tab_content_id = $(this).closest('.rt_ajax_tab_section').next();
        $('.rt_ajax_tab a').removeClass('current');
        $(this).addClass('current');
        $.ajax({
            method: "POST",
            url: quiklearnObj.ajaxURL,
            data: {
                action: 'rt_ajax_tab',
                cat_id: cat_id,
                layout: layout,
                args: args 
            },
            dataType: "json",
            beforeSend: function(){ 
                tab_content_id.prepend('<div class="preloader fa-3x"><i class="fas fa-spinner fa-spin"></i></div>'); 
            },
            success:function(res){ 
                if ( res.success ) {
                    tab_content_id.html('');
                    $(res.data).appendTo(tab_content_id).hide().fadeIn(500); 
                }
            }
        });
    });    
}

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {

        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');

        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    quiklearn_content_load_scripts();
                });
            }
        });

    });

    // Window Load
    $(window).on('load', function () {
        quiklearn_content_load_scripts();
        imageParallax($);
    });

    $(window).on('resize', function () {
        imageParallax($);
    });

    $(window).on('scroll', scrollFunction);
    function scrollFunction() {
        var target = $('#contentHolder');
        
        if ( target.length > 0 ) {
            var contentHeight = target.outerHeight();
            var documentScrollTop = $(document).scrollTop();
            var targetScrollTop = target.offset().top;
            var scrolled = documentScrollTop - targetScrollTop;
            
            if (0 <= scrolled) {
                var scrolledPercentage = (scrolled / contentHeight) * 100;
                if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
                    scrolledPercentage = scrolledPercentage >= 90 ? 100 : scrolledPercentage;
                    $("#quiklearnBar").css({
                        width: scrolledPercentage + "%"
                    });
                }
            } else {
                $("#quiklearnBar").css({
                    width: "0%"
                });
            }
        }
    }

    function revealPosts(){
        var posts = $('.single-grid-item:not(.reveal)');
        var i = 0;
        setInterval( function(){
          if ( i >= posts.length) return false;
          var el = posts[i];
          $(el).addClass('reveal');
          i++
        }, 100);
    }

    // Ajax Blog archive layout 1 Loadmore Function
    var page = 2;
    $(document).on( 'click', '#loadMore', function( event ) {
        event.preventDefault();
        jQuery('#loadMore').addClass('loading-lazy');
        var $container = jQuery('.loadmore-items');
        $.ajax({
            type       : "GET",
            data       : {
                action: 'load_more_blog',
                numPosts : 2, 
                pageNumber: page
            },
            dataType   : "html",
            url        : quiklearnObj.ajaxURL,
            success    : function(html){
            var $data = jQuery(html);
            if ($data.length) {
                $container.append( html );
                    jQuery('#loadMore').removeClass('loading-lazy');
            } else {
                jQuery("#loadMore").html("No More Blog Post"); 
                jQuery('#loadMore').removeClass('loading-lazy');
            }
            setTimeout( function() {
                revealPosts();
            }, 500);
          },
        })
        page++;
    })

    //mouse-parallax
    function imageParallax($) {
        const parallaxWrapper = $(".rt-image-parallax");
        if ( parallaxWrapper ) {
            var parallaxInstances = [];
            $('.rt-mouse-parallax').each(function(index) {
                var $this = $(this);
                $this.attr('id', "rt-parallax-instance-" + index);
                if ($(window).width() > 1199) {
                    parallaxInstances[index] = new Parallax($("#rt-parallax-instance-" + index).get(0), {});
                }
            });
        }
    }


})(jQuery);


