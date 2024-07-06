require(['jquery', 'swiper', 'bootstrap', 'square_box', 'fix_with_to', 'article_box', 'mobile_nav', 'rating_service', 'search'],
    function (jQuery, Swiper) {

        var winW = jQuery(window).width(), body = jQuery('body'), bodyPaddingTop, header = jQuery('header .header-top'),
            stickyBannerHeight = jQuery('header .sticky-banner').height(), mainNav = jQuery('#main-nav'), th, navTarget;

        if (stickyBannerHeight != 0) {
            bodyPaddingTop = parseInt(body.css('padding-top'), 10);
            body.css('padding-top', bodyPaddingTop + stickyBannerHeight);
        }

        mainNav.mobileNav();
        jQuery('.side-filter').mobileNav();
        jQuery('.side-categories').mobileNav();
        jQuery('.search-form').mobileNav();
        jQuery('.rating-container').ratingModule();
        jQuery('.search-container').search();
        addToHomeScreen();

        function toggleBackToTopBtn() {
            var amountScrolled = 500;
            if (jQuery(window).scrollTop() > amountScrolled) {
                jQuery("a.back-to-top").fadeIn();
            } else {
                jQuery("a.back-to-top").fadeOut();
            }
        }

        function addToHomeScreen() {
            if (!jQuery.cookie("homeScreenChecked")) {
                if (/Android/i.test(navigator.userAgent)) {
                    jQuery('#add-to-homeScreen-android-modal').modal('show');
                } else if (/iPhone/i.test(navigator.userAgent)) {
                    jQuery('#add-to-homeScreen-iphone-modal').modal('show');
                }
                jQuery.cookie("homeScreenChecked", {set: true}, {expires: 1});
            } else {
            }
        }

        if ((window.location.href).includes('demo.larammerce.com'))
            checkUserLoggedIn();

        function checkUserLoggedIn() {
            var user1 = window.siteEnv.SITE_DEMO_USERNAME;
            var password1 = window.siteEnv.SITE_DEMO_PASSWORD;
            if (!jQuery.cookie("loginUser")) {
                // Todo : add overLay afterLoad Page
                jQuery('body').append('<div id="overlay" class="load-prompt"></div>');
                jQuery('#overlay').css({
                    'position': 'fixed', /* Sit on top of the page content */
                    'width': '100%', /* Full width (cover the whole page) */
                    'height': '100%', /* Full height (cover the whole page) */
                    'top': 0,
                    'left': 0,
                    'right': 0,
                    'bottom': 0,
                    'background-color': '#FFBE2D', /* Black background with opacity */
                    'z-index': 999999, /* Specify a stack order in case you're using a different order for other elements */
                    'cursor': 'pointer',
                });
                var username = prompt('Please Log in. Username:', '');
                var password = prompt('Password:', '');
                if (username === user1 && password === password1) {
                    jQuery.cookie("loginUser", {set: true}, {expires: 1});
                    document.getElementById("overlay").style.display = "none";
                    window.location = "/";
                } else {
                    window.location = "/";
                }
            }
        }

        jQuery(".back-to-top").on("click", function () {
            jQuery(this).focusout();
            jQuery("html,body").animate({
                scrollTop: 0
            }, 700);
            return false;
        });

        var lastScroll, currentScroll;
        jQuery(window).on("scroll", function () {
            toggleBackToTopBtn();

            currentScroll = jQuery(window).scrollTop();
            if (currentScroll > 100) {
                jQuery('header').addClass('scrolled');
                jQuery('#productsMenu').collapse('hide');
            } else {
                jQuery('header').removeClass('scrolled');
                jQuery('.header-bottom .main-navbar').removeAttr('style');
            }
        });

        var url = document.location.toString();
        if (url.match('#')) {
            jQuery('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
        jQuery('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        });


        jQuery('*').removeClass('loaded');


        var supportContainer = jQuery('.support-phone');
        supportContainer.find(' i').on('click', function (e) {
            e.stopPropagation();
            supportContainer.css({
                'height': '0',
                'padding': '0',
                'display': 'none'
            });
            header.css('margin-top', '0');
        });

        var menuBtn = jQuery('.productsMenu');
        jQuery(window).on("click", function (event) {
            if (menuBtn.has(event.target).length == 0 && !menuBtn.is(event.target)) {
                menuBtn.collapse('hide');
            }
        });

        jQuery("[id^='modal-global-']").modal("show");
    }
);