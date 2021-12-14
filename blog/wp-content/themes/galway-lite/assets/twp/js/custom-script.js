window.addEventListener("load", function(){
    jQuery(document).ready(function($){
        "use strict";

        $("body").addClass("page-loaded");

    });
});

(function (e) {
    "use strict";
    var n = window.TWP_JS || {};
    n.stickyMenu = function () {
        if (e(window).scrollTop() > 350) {
            e("#masthead").addClass("nav-affix");
        } else {
            e("#masthead").removeClass("nav-affix");
        }
    };
    n.mobileMenu = {
        init: function () {
            this.toggleMenu();
            this.menuMobile();
            this.menuArrow();
        },
        toggleMenu: function () {

            e('#masthead').on('click', '.toggle-menu', function (event) {

                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                    e("#masthead").removeClass('mmenu-active');
                } else {
                    ethis.slideDown('300');
                    e("#masthead").addClass('mmenu-active');
                }

                e('.ham').toggleClass('exit');

            });

            e('#masthead .main-navigation ').on('click', '.menu-mobile a i', function (event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li'),
                    esub_menu = eparent.find('> .sub-menu');
                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });

            e('.skpi-link-menu-start').focus(function(){

                if( e('.site-header').hasClass('mmenu-active') ){
                    e('#primary-menu li:last-child a').focus();
                }
            });

            e('.skpi-link-menu-end').focus(function(){
                if( e('.site-header').hasClass('mmenu-active') ){
                    e('.toggle-menu').focus();
                }
            });

            e(document).keyup(function (j) {
                if (j.key === "Escape") { // escape key maps to keycode `27`
                    if ( e('.ham').hasClass('exit') ) {

                        var ethis = e('.main-navigation .menu .menu-mobile');
                        if (ethis.css('display') == 'block') {
                            ethis.slideUp('300');
                            e("#masthead").removeClass('mmenu-active');
                        } else {
                            ethis.slideDown('300');
                            e("#masthead").addClass('mmenu-active');
                        }
                        e('.ham').toggleClass('exit');
                    }
                }
            });


        },
        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 991;
                }
                if (pointbreak >= window_width) {
                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');
                } else {
                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-ios-arrow-down">');
            }
        }
    };
    n.TwpReveal = function () {
        e('.icon-search').on('click', function (event) {
            e('html').attr('style', 'overflow-y: scroll; position: fixed; width: 100%; left: 0px; top: 0px;');
            e('body').toggleClass('reveal-search');
            setTimeout(function () {
                jQuery('.close-popup').focus();
            }, 300);
        });
        e('.close-popup').on('click', function (event) {
            e('body').removeClass('reveal-search');
            setTimeout(function () {
                jQuery('.icon-search').focus();
            }, 300);
            e('html').attr('style', '');
        });

        e('.skip-link-search-start').focus(function(){
            e('.popup-search .search-submit').focus();
        });
        e(document).keyup(function (j) {
            if (j.key === "Escape") { // escape key maps to keycode `27`
                if ( e('body').hasClass('reveal-search') ) {

                    e('body').removeClass('reveal-search');
                    setTimeout(function () {
                        jQuery('.icon-search').focus();
                    }, 300);
                    e('html').attr('style', '');
                }
            }
        });


    e('input, a, button').on('focus', function () {
        if ( e('body').hasClass('reveal-search') ) {

            if( !e(this).parents('.popup-search').length ) {
                e('.close-popup').focus();
            }
        }
    });

    };
    n.TwpWidgetsNav = function () {
        if (e("body").hasClass("rtl")) {
            e('#widgets-nav').sidr({
                name: 'sidr-nav',
                side: 'right'
            });
        } else {
            e('#widgets-nav').sidr({
                name: 'sidr-nav',
                side: 'left'
            });
        }
        e('.sidr-class-sidr-button-close').click(function () {
            e.sidr('close', 'sidr-nav');
            e('html').attr('style','');
            setTimeout(function(){
                e('a#widgets-nav').focus();
            },300);
        });

        e('#widgets-nav').click(function(){
            e('html').attr('style','overflow-y: scroll; position: fixed; width: 100%; left: 0px; top: 0px;');
            setTimeout(function(){
                e('a.sidr-class-sidr-button-close').focus();
            },300);
            
        });

        e('.skpi-link-offcanvas-start').focus(function(){
            e('.skpi-link-offcanvas-end-1').focus();
        });

        e('.skpi-link-offcanvas-end').focus(function(){
            e('.sidr-class-sidr-button-close').focus();
        });

        // Action On Esc Button
        e(document).keyup(function(j) {
            if (j.key === "Escape") { // escape key maps to keycode `27`
                e.sidr('close', 'sidr-nav');
                e('html').attr('style','');

                if ( e( 'body' ).hasClass( 'sidr-nav-open' ) ) {
                    setTimeout(function(){
                        e('a#widgets-nav').focus();
                    },300);

                }

            }
        });
    };
    n.DataBackground = function () {
        e('.bg-image').each(function () {
            var src = e(this).children('img').attr('src');
            if( src ){
                e(this).css('background-image', 'url(' + src + ')').children('img').hide();
            }
        });
    };
    n.InnerBanner = function () {
        var pageSection = e(".data-bg");
        pageSection.each(function (indx) {
            if (e(this).attr("data-background")) {
                e(this).css("background-image", "url(" + e(this).data("background") + ")");
            }
        });
    };
    n.TwpSlider = function () {
        var owl = e('.twp-slider');
        e(".twp-slider-1").owlCarousel({
            loop: (e('.twp-slider-1').children().length) == 1 ? false : true,
            margin: 3,
            autoplay: 5000,
            nav: true,
            navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
            items: 1
        });
        e("ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid, .gallery-columns-1").each(function () {
            e(this).owlCarousel({
                loop: (e('.wp-block-gallery.columns-1').children().length) == 1 ? false : true,
                margin: 3,
                autoplay: 5000,
                nav: true,
                navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
                items: 1
            });
        });
        owl.on('translated.owl.carousel', function () {
            e(".active .slide-text").addClass("fadeInUp").show();
        });
        owl.on('translate.owl.carousel', function () {
            e(".active .slide-text").removeClass("fadeInUp").hide();
        });
    };
    n.show_hide_scroll_top = function () {
        if (e(window).scrollTop() > e(window).height() / 2) {
            e(".scroll-up").fadeIn(300);
            e('body').addClass('theme-floatingbar-active');
        } else {
            e('body').removeClass('theme-floatingbar-active');
            e(".scroll-up").fadeOut(300);
        }
    };
    n.scroll_up = function () {
        e(".scroll-up").on("click", function () {
            e("html, body").animate({
                scrollTop: 0
            }, 700);
            return false;
        });
    };
    n.twp_matchheight = function () {
        e('.widget-area').theiaStickySidebar({
            additionalMarginTop: 30
        });
    };
    n.boosterComment = function () {
        e('.site-main.galway-no-comment .booster-block.booster-ratings-block, .site-main.galway-no-comment .comment-form-ratings, .site-main.galway-no-comment .twp-star-rating').hide();
    };
    e(document).ready(function () {
        n.mobileMenu.init();
        n.boosterComment();
        n.TwpReveal();
        n.TwpWidgetsNav();
        n.DataBackground();
        n.InnerBanner();
        n.TwpSlider();
        n.scroll_up();
        n.twp_matchheight();
    });
    e(window).scroll(function () {
        n.stickyMenu();
        n.show_hide_scroll_top();
    });
    e(window).resize(function () {
        n.mobileMenu.menuMobile();
    });
})(jQuery);