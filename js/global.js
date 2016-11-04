/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */

(function() {
    'use strict';

    // Add class to reflect javascript availability for CSS
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');


    // Show/hide the sidebar
    var sidebar = jQuery('#sidebar');
    var sideToggle = jQuery('#toggle-sidebar');

    sidebar.hide();

    sideToggle.on('click', function(e) {
        e.preventDefault();
        if (sidebar.is(':hidden')) {
            sidebar.show(function(){ sidebar.addClass('show') });
            sideToggle.addClass('close');
        } else {
            sidebar.toggleClass('show');
            sideToggle.toggleClass('close');
        }
    });


    // Show/hide the explore menu
    var explore = jQuery('#explore');
    var expToggle = jQuery('#toggle-explore');
    var expCats = jQuery('#explore .category');
    var firstCatId = jQuery('#explore .category:first-child').attr('id');

    explore.hide();
    expCats.hide(function() {
        jQuery('#' + firstCatId).show();
        jQuery('#explore .cat-list li:first-child > a').addClass('on');
        expImages('#' + firstCatId);
    })

    expToggle.on('click', function(e) {
        e.preventDefault();
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
    });

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

    // Open social sharing links in a popup
    jQuery('.social-share a[rel]').on('click', function(e) {
        var top = (screen.availHeight - 500) / 2;
        var left = (screen.availWidth - 500) / 2;

        var blog = jQuery(this).data('blog');
        var network = jQuery(this).data('network');

        if (typeof ga === 'function') {
            ga('send', 'event', blog + ' /interactions', 'share', network);
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
            if (!formDetails.is(':visible')) {
                formDetails.slideDown('normal');
            }
        }

        if (jQuery('.newsletter_form #email').val() != '') {
            showDetails();
        }

        jQuery('.newsletter_form').on('focus', 'select, input', showDetails);

        submitButton.on('click', function(e) {
            if (!formDetails.is(':visible')) {
                e.preventDefault();
                showDetails();
            }
        });
    }
    initEmailForm();

})(window.jQuery);
