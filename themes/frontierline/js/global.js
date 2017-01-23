(function() {
    'use strict';

    // Add class to reflect javascript availability for CSS
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');

    var blogname = jQuery('body').data('blogname');
    var navMoz = jQuery('#nav-mozilla-menu');
    var navMozToggle = jQuery('#nav-global .nav-mozilla .toggle');
    var explore = jQuery('#explore');
    var expToggle = jQuery('#toggle-explore');
    var expCats = jQuery('#explore .category');
    var sidebar = jQuery('#sidebar');
    var sideToggle = jQuery('#toggle-sidebar');

    // Set up the sidebar
    function initSidebar() {
        sidebar.addClass('active').show();

        sideToggle.on('click', function(e) {
            e.preventDefault();
            if (explore.is(':visible')) {
                explore.slideUp('fast');
                expToggle.removeClass('close');
            }

            // Count the sidebar opening
            if ((typeof ga === 'function') && !sidebar.hasClass('show')) {
                ga('send', 'event', blogname + ' Interactions', 'sidebar click', 'sidebar-open');
            }

            sidebar.toggleClass('show');
            sideToggle.toggleClass('close');
        });
    }
    initSidebar();

    // Set up the Explore Drawer
    function initExplore() {
        var firstCatId = jQuery('#explore .category:first-child').attr('id');
        var firstCatLink = jQuery('#explore .cat-list li:first-child > a');

        explore.hide().addClass('active');
        expCats.hide(function() {
            jQuery('#' + firstCatId).show();
            firstCatLink.addClass('on');
            expImages('#' + firstCatId);
        });

        expToggle.on('click', function(e) {
            e.preventDefault();
            if (sidebar.hasClass('show')) {
                sidebar.removeClass('show');
                sideToggle.removeClass('close');
            }

            // Count the drawer opening
            if ((typeof ga === 'function') && explore.is(':hidden')) {
                ga('send', 'event', blogname + ' Interactions', 'explore click', 'explore-open');
            }

            explore.slideToggle('fast');
            expToggle.toggleClass('close');
        });

        jQuery('#explore .cat-list a[href^="#cat-"]').on('click', function(e) {
            e.preventDefault();
            var catLink = jQuery(this);
            // Extract the target element's ID from the link's href.
            var categoryId = catLink.attr('href').replace( /.*?(#.*)/g, '$1');

            jQuery('#explore .category:visible').fadeOut('fast', function() {
                jQuery(categoryId).fadeIn('fast', function() {
                    expImages(categoryId);
                });
            });

            jQuery('#explore .cat-list a.on').removeClass('on');
            catLink.addClass('on');

            if (typeof ga === 'function') {
                ga('send', 'event', blogname + ' Interactions', 'explore click', 'Explore category: ' + catLink.text());
            }
        });
    }

    // Lazyload images in explore category.
    // Takes a fully-formed ID selector, including #
    function expImages(categoryId) {
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
            if (mqIsTablet.matches) {
                initExplore();
                navMoz.show();
            } else {
                explore.removeClass('active');
                expCats.show();
            }

            mqIsTablet.addListener(function(mq) {
                if (mq.matches) {
                    initExplore();
                    navMoz.show();
                } else {
                    explore.removeClass('active');
                    expCats.show();
                }
            });
        // if browser doesn't support matchMedia, assume it's probably
        // an older desktop browser and can handle the explore drawer.
        } else {
            initExplore();
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
        var expLinks = jQuery('#explore .entry-link');
        var sideLinks = jQuery('#sidebar a');

        // Global nav
        navMoz.find('a').on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'nav click', 'Global nav: ' + jQuery(this).text());
        });

        // Links in explore drawer
        expLinks.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'explore click', 'Explore link: ' + jQuery(this).find('.entry-title').text());
        });

        // Links in sidebar
        sideLinks.on('click', function() {
            ga('send', 'event', blogname + ' Interactions', 'explore click', 'Sidebar link: ' + jQuery(this).text());
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
    }

})(window.jQuery);
