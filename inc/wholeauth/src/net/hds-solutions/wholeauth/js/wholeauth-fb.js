/**
 * WholeAuth SDK - Facebook module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('fb', '0.1.9');
    // permisos a la app
    var $loginScope = "";
    // bandera de inicializacion
    var $inited = false;
    // ID de la aplicacion
    var $appId = null;
    /**
     * Inicializa los datos de la aplicacion
     */
    $this.init = function(appID, lang) {
        // almacenamos el ID de la app
        $appId = appID;
        $.ajaxSetup({
            cache: true
        });
        // agregamos el espacio para facebook
        if (typeof $('#fb-root')[0] === 'undefined')
            $(document.body).append('<div id="fb-root"></div>');
        // cargamos el SDK de Facebook
        $.getScript("//connect.facebook.net/" + (lang !== undefined ? lang : "en_US") + "/all.js#xfbml=1&appId=" + $appId, function() {
            FB.init({
            appId: $appId,
            status: true,
            cookie: true,
            xfbml: true
            });
            $inited = true;
        });
        delete $this.init;
    };
    /**
     * Almacena los permisos extra a solicitar al usuario
     */
    $this.setScope = function(scope) {
        // almacenamos el scope
        $loginScope = scope;
    };
    /**
     * Configura el tamaño del cavas
     * <p>
     * Solo util en aplicaciones de pestaña de FB
     * </p>
     */
    $this.setCanvasSize = function(width, height) {
        // seteamos el tamaño del canvas
        FB.Canvas.setSize({
        width: width,
        height: height
        });
    };
    /**
     * Solicita el login del usuario a la app
     */
    $this.login = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.login, callback))
            return;
        FB.login(function(response) {
            // enviamos el callback
            if (typeof callback === 'function')
                callback(response.authResponse);
        }, {
            scope: $loginScope
        });
    };
    /**
     * Cierra la session del usuario
     */
    $this.logout = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.logout, callback))
            return;
        _.fb.checkLogin(function(l) {
            // verificamos si esta logueado
            if (l)
                // cerramos la sesion
                FB.logout(function(response) {
                    // enviamos el callback
                    if (typeof callback === 'function')
                        callback(response);
                });
        });
    };
    /**
     * Retorna si el usuario se encuentra logueado en la app
     */
    $this.checkLogin = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.checkLogin, callback))
            return;
        FB.getLoginStatus(function(response) {
            // enviamos el callback
            if (typeof callback === 'function')
                callback(response.status === 'connected');
        });
    };
    /**
     * Retorna los datos del usuario
     */
    $this.getUser = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.getUser, callback))
            return;
        FB.api('/me', callback);
    };
    /**
     * Retorna los amigos del usuario
     */
    $this.getFriends = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.getTaggableFriends, callback))
            return;
        FB.api('/me/friends', function(response) {
            callback(response && !response.error ? response.data : false);
        });
    };
    /**
     * Retorna los amigos del usuario
     */
    $this.getTaggableFriends = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.getTaggableFriends, callback))
            return;
        FB.api('/me/taggable_friends', function(response) {
            callback(response && !response.error ? response.data : false);
        });
    };
    /**
     * Retorna si el usuario es fan de la FanPage
     */
    $this.fanGate = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.fanGate, callback))
            return;
        $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '?m=fangate',
        data: {
            appID: $appId
        },
        success: function($data) {
            // enviamos el callback
            if (typeof callback === 'function')
                callback($data.success);
        },
        error: function() {
            // enviamos el callback
            if (typeof callback === 'function')
                callback(false);
        }
        });
    };
    /**
     * AutoFanGate, ejecuta el callback una vez que el usuario es fan de la FanPage
     */
    $this.autoFanGate = function(callback) {
        if (!_.wait(typeof FB === 'undefined' || !$inited, $this.autoFanGate, callback))
            return;
        // verificamos si es fan
        _.fb.fanGate(function($result) {
            if (!$result)
                _.fb.autoFanGate(callback);
            else
                callback();
        });
    };
    $this.share = function(url, callback) {
        FB.ui({
        method: 'share',
        href: url,
        }, callback);
    };
}(jQuery, WholeAuth));