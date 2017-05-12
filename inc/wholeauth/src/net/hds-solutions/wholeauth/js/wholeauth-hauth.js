/**
 * WholeAuth SDK - HybridAuth module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('hauth', '0.1.7');
    // callback para el popup de autenticacion
    var $authCallback = null;
    $this.login = function($callback, $fallback) {
        // almacenamos el callback
        $authCallback = $callback;
        // intentamos loguear desde el modulo hAuth
        $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '.?m=auth',
        data: {
        provider: 'facebook',
        type: 'login'
        },
        success: function($data) {
            // verificamos si necesita autenticacion
            if ($data.need_auth === true) {
                // solicitamos confirmacion para conectar a facebook
                _.confirm('Se requiere que conectes tu cuenta de Facebook, deseas continuar?', function(r) {
                    if (r)
                        // levantamos el popup para loguear a FB
                        window.open('.?m=auth&provider=facebook&type=auth&callback=_.hauth.authCallback', 'fb-dialog', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=600,height=500,left=' + (screen.width / 2 - 300) + ',top=' + (screen.height / 2 - 150));
                    if (typeof $fallback === 'function')
                        // ejecutamos el fallback
                        $fallback(r);
                });
            } else
                // pasamos a authCallback
                _.hauth.authCallback($data);
        }
        });
    };
    $this.authCallback = function($data) {
        if (typeof $authCallback === 'function')
            // retornamos a authCallback
            $authCallback($data.success);
    };
    $this.logout = function($callback) {
        // intentamos desloguear desde el modulo hAuth
        $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '.?m=auth',
        data: {
        provider: 'facebook',
        type: 'logout'
        },
        success: function($data) {
            // retornamos el resultado
            if (typeof $callback === 'function')
                // ejecutamos el callback
                $callback($data.success);
        }
        });
    };
}(jQuery, WholeAuth));