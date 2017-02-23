(function() {
    'use strict';

    var $body = jQuery('body');
    var colorSchemes = Array(
            'color-scheme-none',
            'color-scheme-cyan',
            'color-scheme-coral',
            'color-scheme-lilac',
            'color-scheme-yellow',
            'color-scheme-orange',
            'color-scheme-lime',
            'color-scheme-neonblue',
            'color-scheme-neonpink',
            'color-scheme-neongreen'
        );
    var headPatterns = Array(
            'pattern-none',
            'pattern-arrows',
            'pattern-basketweave',
            'pattern-confetti',
            'pattern-emoticons',
            'pattern-slashbracket',
            'pattern-tradewinds'
        );

    // Color scheme.
    wp.customize('frontierline_color_scheme', function(value) {
        value.bind(function(to) {
            $body.removeClass(colorSchemes.join(' ')).addClass('color-scheme-' + to);
        });
    });

    // Header pattern.
    wp.customize('frontierline_head_pattern', function(value) {
        value.bind(function(to) {
            $body.removeClass(headPatterns.join(' ')).addClass('pattern-' + to);
        });
    });

})(jQuery);
