/**
 * WholeAuth SDK - Google Analytics module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('ga', '0.1.2');
    var $inited = false;
    $this.init = function($gaId) {
        // verificamos si tenemos iniciado el js
        if (!$inited)
            // cargamos el js
            _init();
        ga('create', $gaId, 'auto');
        ga('send', 'pageview');
    };
    var _init = function() {
        // cargamos el google analytics sdk
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    };
}(jQuery, WholeAuth));