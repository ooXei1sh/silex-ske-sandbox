define([
    'jquery',
    'bootstrap'
],
function () {

    // Avoid `console` errors in browsers that lack a console.
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());

    $(function () {
        console.log('app.js');

        // class for no form submit on enter keypress
        $('.no-enter-submit').on('keypress', function(e){
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });

        // class for no tab upon sequential focus navigation
        $('.no-tab-focus').attr('tabindex', '-1');
    });
});
