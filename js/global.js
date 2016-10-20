/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */

(function() {
    'use strict';

    // Add class to reflect javascript availability for CSS
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');

    function toggleSidebar() {
        var sidebar = jQuery('#sidebar');
        var button = jQuery('#toggle-sidebar');

        sidebar.hide();

        button.on('click', function() {
            if (sidebar.is(':hidden')) {
                sidebar.show(function(){ sidebar.addClass('show') });
                button.addClass('close');
            } else {
                sidebar.toggleClass('show');
                button.toggleClass('close');
            }
        });
    }
    toggleSidebar();

    function toggleExplore() {
        var explore = jQuery('#explore');
        var button = jQuery('#toggle-explore');

        explore.hide();

        button.on('click', function() {
            explore.slideToggle('fast');
            button.toggleClass('close');
        });
    }
    toggleExplore();

})(window.jQuery);
