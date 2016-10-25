/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */

(function() {
    'use strict';

    // Add class to reflect javascript availability for CSS
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');

    function toggleSidebar() {
        var sidebar = jQuery('#sidebar');
        var toggle = jQuery('#toggle-sidebar');

        sidebar.hide();

        toggle.on('click', function(e) {
            e.preventDefault();
            if (sidebar.is(':hidden')) {
                sidebar.show(function(){ sidebar.addClass('show') });
                toggle.addClass('close');
            } else {
                sidebar.toggleClass('show');
                toggle.toggleClass('close');
            }
        });
    }
    toggleSidebar();

    function toggleExplore() {
        var explore = jQuery('#explore');
        var toggle = jQuery('#toggle-explore');

        explore.hide();

        toggle.on('click', function(e) {
            e.preventDefault();
            explore.slideToggle('fast');
            toggle.toggleClass('close');
        });
    }
    toggleExplore();

})(window.jQuery);
