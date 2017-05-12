/**
 * WholeAuth SDK - Loader module
 * <p>
 * Copyrigth 2014 - HDS Solutions
 * </p>
 */
(function($, _, undefined) {
    // registramos el modulo
    var $this = _.registerModule('loader', '0.1.1');
    // total de recursos
    var $total = 0;
    // recursos a cargar
    var $resources = [];
    // progress
    var $progress = null;
    // callback
    var $callback = null;
    // bandera
    var $loading = false;
    $this.load = function($rs, $pg, $cb) {
        // verificamos si es array
        if (Array.isArray($rs)) {
            // actualizamos el total de recursos a cargar
            $total += $rs.length;
            // recorremos los recursos a cargar
            for ( var i in $rs)
                // agregamos el recurso
                $resources[$resources.length] = $rs[i];
        } else {
            // actualizamos el total de recursos a cargar
            $total++;
            // agregamos el recurso
            $resources[$resources.length] = $rs;
        }
        // almacenamos el progress
        $progress = $pg !== undefined ? $pg : $progress;
        // almacenamos el callback
        $callback = $cb !== undefined ? $cb : $callback;
        // verificamos si callback es undefined
        if ($callback == null) {
            // invertimos progress -> callback
            $callback = $progress;
            $progress = null;
        }
        // verificamos si hay recursos a cargar
        if ($resources.length > 0)
            // iniciamos la carga
            _load();
    };
    var _load = function() {
        // verificamos si estamos cargando
        if ($loading)
            return;
        // modificamos la bandera
        $loading = true;
        // recurso a cargar
        var $resource = $resources.shift();
        // cargamos el recurso
        $.ajax({
        url: $resource,
        dataType: $resource.match('.js$') ? 'script' : 'html',
        progress: function(e) {
            // verificamos si es computable
            if (e.lengthComputable && typeof $progress == 'function')
                // retornamos el porcentaje cargado
                $progress(Math.round((100 / $total * ($total - $resources.length)) + ((e.loaded / e.total) * 100 / $total)));
        },
        success: function(data) {
            // modificamos la bandera
            $loading = false;
            // retornamos el porcentaje cargado
            if (typeof $progress == 'function')
                $progress(Math.round(100 / $total * ($total - $resources.length)));
            // verificamos si hay mas recursos a cargar
            if ($resources.length > 0)
                // cargamos el siguiente recurso
                _load();
            else if (typeof $callback == 'function')
                // ejecutamos el callback
                $callback($resource.match('.js$') ? undefined : data);
        }
        });
    };
}(jQuery, WholeAuth));