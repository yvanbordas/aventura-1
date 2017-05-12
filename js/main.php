<?php
    // seteamos el header como js
    header('Content-type: text/javascript');
    // importamos el main.js
    echo file_get_contents('main.js');
    // nombre del fichero extra a cargar
    $file = (isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index');
    // verificamos si existe el php
    if (file_exists($file . '.php'))
        // cargamos el php
        include_once($file . '.php');
    // verificamos si existe el js
    else if (file_exists($file . '.js'))
        // cargamos el js
        include_once($file . '.js');