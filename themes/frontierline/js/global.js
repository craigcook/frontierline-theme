(function() {
    'use strict';

    var $doc = document.documentElement;
    var $window = jQuery(window);
    var blogname = jQuery('body').data('blogname');
    var navMoz = jQuery('#nav-mozilla-menu');
    var navMozToggle = jQuery('#nav-global .nav-mozilla .toggle');
    var categories = jQuery('#categories');
    var catToggle = jQuery('#toggle-categories');
    var catCats = jQuery('#categories .category');
    var sidebar = jQuery('#sidebar');
    var sideToggle = jQuery('#toggle-sidebar');
    var navGlobal = jQuery('#nav-global');
    var navUtil = jQuery('#nav-util');
    var navUtilTop = navUtil.offset();
    var siteWrap = jQuery('.site-wrap');
    var canStick = jQuery('.can-stick');
    var topLink = jQuery('.page-top');

    // Add class to reflect javascript availability for CSS
    $doc.className = $doc.className.replace(/\bno-js\b/, 'js');

    // Set up the sidebar
    function initSidebar() {
        sidebar.addClass('is-active').show();

        sideToggle.on('click', function(e) {
            e.preventDefault();

            if (categories.is(':visible')) {
                categories.slideUp('fast').addClass('is-closed');
                catToggle.removeClass('close');
            }

            // Count the sidebar opening
            if ((typeof ga === 'function') && !sidebar.hasClass('is-open')) {
                ga('send', 'event', blogname + ' Interactions', 'sidebar click', 'sidebar-open');
            }

            sidebar.toggleClass('is-open');
            sideToggle.toggleClass('close');
        });
    }
    initSidebar();

    // Set up the Category Drawer
    function initCategories() {
        var firstCatId = jQuery('#categories .category:first-child').attr('id');
        var firstCatLink = jQuery('#categories .cat-list li:first-child > a');

        categories.hide().addClass('is-active');

        catCats.hide(function() {
            jQuery('#' + firstCatId).show();
            firstCatLink.addClass('on');
            catImages('#' + firstCatId);
        });

        catToggle.on('click', function(e) {
            e.preventDefault();

            if (sidebar.hasClass('is-open')) {
                sidebar.toggleClass('is-open');
                sideToggle.toggleClass('close');
            }

            categories.slideToggle('fast').toggleClass('is-closed');
            catToggle.toggleClass('close');
        });

        jQuery('#categories .cat-list a[href^="#cat-"]').on('click', function(e) {
            e.preventDefault();
            var catLink = jQuery(this);
            // Extract the target element's ID from the link's href.
            var categoryId = catLink.attr('href').replace( /.*?(#.*)/g, '$1');

            jQuery('#categories .category:visible').fadeOut('fast', function() {
                jQuery(categoryId).fadeIn('fast', function() {
                    catImages(categoryId);
                });
            });

            jQuery('#categories .cat-list a.on').removeClass('on');
            catLink.addClass('on');

            if (typeof ga === 'function') {
                ga('send', 'event', blogname + ' Interactions', 'category drawer click', 'Category: ' + catLink.text());
            }
        });
    }

    // Lazyload images in category drawer.
    // Takes a fully-formed ID selector, including #
    function catImages(categoryId) {
        var img = jQuery(categoryId + ' .post-image[data-src]');

        for (var i=0; i<img.length; i++) {
            if(img[i].getAttribute('data-src')) {
                img[i].setAttribute('src',img[i].getAttribute('data-src'));
            }
        }
    }


    jQuery(function() {
        var mqIsTablet;

        // test for matchMedia
        if ('matchMedia' in window) {
            mqIsTablet = matchMedia('(min-width: 760px)');
        }

        if (mqIsTablet) {
            if ((mqIsTablet.matches) && (categories.length > 0)) {
                initCategories();
                navMoz.attr('style', '');
            } else {
                categories.removeClass('is-active');
                catCats.show();
            }

            mqIsTablet.addListener(function(mq) {
                if ((mq.matches) && (categories.length > 0)) {
                    initCategories();
                    navMoz.attr('style', '');
                } else {
                    categories.removeClass('is-active');
                    catCats.show();
                }
            });
        // If browser doesn't support matchMedia, assume it's probably
        // an older desktop browser and can handle the category drawer.
        } else if (categories.length > 0) {
            initCategories();
        }
    });


    // Open social sharing links in a popup
    jQuery('.social-share a[rel]').on('click', function(e) {
        var top = (screen.availHeight - 500) / 2;
        var left = (screen.availWidth - 500) / 2;
        var network = jQuery(this).data('network');

        // Count the clicks
        if (typeof ga === 'function') {
            ga('send', 'event', blogname + ' Interactions', 'share', network);
        }

        window.open(
            this.href,
            'share',
            'width=550,height=420,left='+ left +',top='+ top +',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1'
        ).focus();

        e.preventDefault();
        return false;
    });


    // Expand email form on input focus or submit if details aren't visible
    function initEmailForm() {
        var submitButton = jQuery('.newsletter_form button[type=submit]');
        var formDetails = jQuery('.newsletter_form .form-details');

        function showDetails() {
            if (formDetails.is(':hidden')) {
                formDetails.slideDown('normal');
            }
        }

        if (jQuery('.newsletter_form #email').val() !== '') {
            showDetails();
        }

        jQuery('.newsletter_form').on('focus', 'select, input', showDetails);

        submitButton.on('click', function(e) {
            if (formDetails.is(':hidden')) {
                e.preventDefault();
                showDetails();
            }
        });
    }
    initEmailForm();


    // Show/hide the global nav in small viewports
    navMozToggle.on('click', function(){
        navMoz.slideToggle('fast');
    });

    // Analyze All The Things
    if (typeof ga === 'function') {
        var search = jQuery('#search');
        var searchField = jQuery('#s');
        var prev = jQuery('#adjacent-posts .nav-paging-prev a');
        var next = jQuery('#adjacent-posts .nav-paging-next a');
        var incat = jQuery('.in-category .cat-posts a');
        var popular = jQuery('.popular .wpp-list a');
        var recent = jQuery('.popular .recent-posts a');
        var catLinks = jQuery('#categories .entry-link');
        var sideLinks = jQuery('#sidebar a');
        var navDownload = jQuery('.nav-global-fxdownload .button');
        var contentDownload = jQuery('.fx-footer .button');

        // Global nav
        navMoz.find('a').on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'nav click', 'Global nav: ' + jQuery(this).text());
        });

        // Links in categories drawer
        catLinks.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'category drawer click', 'Category link: ' + jQuery(this).find('.entry-title').text());
        });

        // Links in sidebar
        sideLinks.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'sidebar click', 'Sidebar link: ' + jQuery(this).text());
        });

        // Searches
        search.on('submit', function() {
            ga('send', 'event', blogname + ' Interactions', 'search', 'Search: ' + searchField.val());
        });

        // Previous article
        prev.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'adjacent click', 'Previous: ' + jQuery(this).find('.entry-title').text());
        });

        // Next article
        next.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'adjacent click', 'Next: ' + jQuery(this).find('.entry-title').text());
        });

        // In category
        incat.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'related click', 'In category: ' + jQuery(this).text());
        });

        // Popular
        popular.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'related click', 'Popular: ' + jQuery(this).text());
        });

        // Recent (only visible if popular is disabled)
        recent.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'related click', 'Recent: ' + jQuery(this).text());
        });

        // Count download clicks in the navbar (Firefox blog)
        navDownload.on('click', function() {
            ga('send', {
                hitType: 'event',
                eventCategory: blogname + ' Interactions',
                eventAction: 'Firefox Download',
                eventLabel: 'Firefox for Desktop',
                dimension15: 'nav cta',
                dimension1: blogname
            });
        });

        // Count download clicks in the post footer (Firefox blog)
        contentDownload.on('click', function() {
            ga('send', {
                hitType: 'event',
                eventCategory: blogname + ' Interactions',
                eventAction: 'Firefox Download',
                eventLabel: 'Firefox for Desktop',
                dimension15: 'in-content cta',
                dimension1: blogname
            });
        });
    }

    // Sticky navigation
    var fixed = false;
    var didScroll = false;

    $window.scroll(function() {
        didScroll = true;
    });

    $window.resize(function() {
        navUtilTop = navUtil.offset();
    });

    jQuery(document).ready(function() {
        var scrollTop = $window.scrollTop();
        if (scrollTop >= navUtilTop.top) {
            didScroll = true;
        }
    });

    function adjustScrollbar() {
        if (didScroll) {
            didScroll = false;
            var scrollTop = $window.scrollTop();

            if (scrollTop >= 40) {
                navGlobal.addClass('is-minified');
            } else {
                navGlobal.removeClass('is-minified');
            }

            if (scrollTop >= navUtilTop.top - 30) {
                if (!fixed) {
                    fixed = true;
                    canStick.addClass('is-sticky');
                    siteWrap.css({
                        'padding-top' : '3em'
                    });
                }
            } else {
                if (fixed) {
                    fixed = false;
                    canStick.removeClass('is-sticky');
                    siteWrap.css({
                        'padding-top' : '0'
                    });
                }
            }
        }
    }

    // Check for an adjusted scrollbar every 100ms.
    setInterval(adjustScrollbar, 100);

    // Smooth scroll to top
    topLink.on('click', function(e) {
        e.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, 400);
    });

})(jQuery);
