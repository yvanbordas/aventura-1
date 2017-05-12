<?php
    // habilitamos los errores
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    // TimeZone
    date_default_timezone_set('America/Asuncion');

    // DB
    include_once 'inc/db-class/net/hdssolutions/php/dbo/DB.php';
    use net\hdssolutions\php\dbo\DB;
    DB::setParams('162.246.16.147', 3306, 'comdetur_sistema', '8HN9QBi52R@d', 'comdetur_sistema');

    // inicializamos session
    session_start();

    // verificamos si no hay peticion de modulo
    if (!isset($_REQUEST['m']))
        // iniciamos la aplicacion
        include_once 'screens/' . (isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index') . '.php';
    else {
        // verificamos si hay solicitud de modulo y lo agregamos
        $include = isset($_REQUEST['m']) ? 'modules/' . $_REQUEST['m'] . '/' : '';

        // verificamos si hay solicitud de pantalla y la agregamos
        $include .= (isset($_REQUEST['s']) ? $_REQUEST['s'] : 'index') . '.php';

        // verificamos si existe la pantalla
        if (file_exists($include))
            // cargamos la pantalla
            include_once $include;
        else
            // mostramos un mensaje oculto
            echo '<!-- File "' . $include . '" doesn\'t exists -->';
    }