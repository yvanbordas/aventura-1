/**
 * WholeAuth SDK
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
this.WholeAuth = this.WholeAuth || function($callback) {
    // seteamos el evento en el jQuery
    $(function() {
        // cantidad de imagenes que encontremos
        var $count = 0;
        // bandera de carga correcta
        var $fully = true;
        // contamos la cantidad de imagenes a cargar
        $('img').each(function() {
            $count++;
        });
        // capturamos la carga de las imagenes
        $('img').load(function() {
            $count--;
            // verificamos si cargaron todas
            if ($count === 0)
                // ejecutamos el callback
                $callback($fully);
        }).error(function() {
            $count--;
            // modificamos la bandera
            $fully = false;
            // verificamos si cargaron todas
            if ($count === 0)
                // ejecutamos el callback
                $callback($fully);
        });
        // verificamos si no hay imagenes
        if ($count === 0)
            // ejecutamos el callback
            $callback($fully);
    });
};
this._ = this._ || this.WholeAuth;
(function($, _, undefined) {
    var $modules = {};
    // expresiones regulares
    var $regexs = {
        // validacion de emails
        email: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    };
    /**
     * Registra un modulo externo
     */
    _.registerModule = function($id, $version, $autoInit) {
        // habilitamos el modulo
        _[$id] = {};
        _[$id].version = $version;
        _.log('[WholeAuth] Registering module ' + $id + ' v' + $version);
        // verificamos si tiene autoInit
        if ($autoInit === true)
            $modules[$id] = true;
        // retornamos el modulo
        return _[$id];
    };
    _.wait = function($check, $return, $callback) {
        if ($check)
            setTimeout(function() {
                $return($callback);
            }, 50);
        return !$check;
    };
    _.screen = function($screen, $data, $tab) {
        // verificamos si no hay datos a enviar
        if (typeof $data !== 'object') {
            // verificamos si es en una nueva pestaña
            if ($data === true)
                // abrimos en una nueva pestaña
                window.open($screen, '_blank');
            else
                // redireccionamos a la pantalla
                document.location = $screen;
        } else
            // enviamos por medio de POST
            _postScreen($screen, $data, $tab);
    };
    _.module = function($module, $data, $callback) {
        if (typeof $data == 'function')
            $.ajax({
            url: 'module/' + $module,
            type: 'GET',
            dataType: 'json',
            success: $data
            });
        else
            $.ajax({
            url: 'module/' + $module,
            type: 'POST',
            dataType: 'json',
            data: $data,
            success: $callback
            });
    };
    _.checkEmail = function($email) {
        // retornamos si es un email valido
        return $regexs.email.test($email);
    };
    _.log = function($msg) {
        // mostramos el mensaje en consola
        console.log($msg);
    };
    var _postScreen = function($screen, $data, $tab) {
        // creamos un formulario
        var $sForm = document.createElement('form');
        $sForm.action = $screen;
        $sForm.method = 'post';
        // verificamos si es en una nueva pestaña
        if ($tab === true)
            // abrimos en una pestaña
            $sForm.target = '_blank';
        // recorremos los campos a enviar
        for ( var $name in $data) {
            // creamos el campo
            var $iData = document.createElement('input');
            $iData.name = $name;
            $iData.value = $data[$name];
            // agregamos el campo al form
            $sForm.appendChild($iData);
        }
        // agregamos el form
        $('#wholeauth-post').append($sForm);
        // enviamos el form
        $sForm.submit();
    };
    var _init = function() {
        // verificamos si tenemos el div
        if (typeof $('#wholeauth-root')[0] === 'undefined') {
            // agregamos el div principal
            $(document.body).append('<div id="wholeauth-root"></div>');
            // agregamos el div para el screenPost
            $('#wholeauth-root').append('<div id="wholeauth-post" style="display:none;"></div>');
        }
    };
    var _autoInit = function() {
        // ejecutamos el init local
        _init();
        // recorremos los modulos
        for ( var $id in $modules) {
            // ejecutamos el init
            _[$id].init();
            delete _[$id].init;
        }
    };
    $(_autoInit);
}(jQuery, WholeAuth));