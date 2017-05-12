<?php
    // seteamos el header como fichero css
    header('Content-type: text/css');
    // cargamos las fuentes
    //include_once 'fonts.css'; echo "\n";
    // cargamos la hoja de estilo base
    include_once 'style.css'; echo "\n";
    // cargamos la hoja de estilo responsive
    //include_once 'responsive.css'; echo "\n";
    // verificamos si existe la hoja de estilos para la pantalla
    if (file_exists(isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index') . '.css')
        // cargamos la hoja de estilos
        include_once (isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index') . '.css';
    // verificamos si existen keyframes para la pantalla
    if (file_exists(isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index') . '-keyframes.css')
        // cargamos la hoja de estilos
        include_once (isset($_GET['s']) && strlen($_GET['s']) > 0 ? $_GET['s'] : 'index') . '-keyframes.css';