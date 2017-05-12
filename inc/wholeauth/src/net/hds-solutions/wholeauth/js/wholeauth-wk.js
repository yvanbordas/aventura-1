/**
 * WholeAuth SDK - Worker module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('wk', '0.2.0', true);
    $this.init = function() {
        if ($().actual === undefined)
            throw '$.actual jQuery method does not exist';
        var $worker = "<div class='wholeauth-worker'>";
        $worker += "<div class='overlay'></div>";
        $worker += "<div class='content'></div>";
        $worker += "</div>";
        // agregamos el worker
        if (typeof $('.wholeauth-worker')[0] === 'undefined')
            $('#wholeauth-root').append($worker);
    };
    _.lock = function($content) {
        // almacenamos el contenido
        $('.wholeauth-worker .content').html($content !== undefined ? $content : '');
        // mostramos el mensaje de carga
        $('.wholeauth-worker').stop().fadeIn(250);
        // centramos el contenedor
        $('.wholeauth-worker .content').css('margin-top', -($('.wholeauth-worker .content').actual('height') / 2));
        $('.wholeauth-worker .content').css('margin-left', -($('.wholeauth-worker .content').actual('width') / 2));
    };
    _.unlock = function() {
        // mostramos el mensaje de carga
        $('.wholeauth-worker').stop().fadeOut(150);
    };
}(jQuery, WholeAuth));