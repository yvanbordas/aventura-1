<?php
#phpinfo();exit();
error_reporting(E_ALL);ini_set('display_errors', true);

//session_start(); 
date_default_timezone_set('America/Asuncion');

# Datos del Sitio
define('SITE_NAME'				, 'COMDETUR');
define('ROOT_PATH'				, str_replace(DIRECTORY_SEPARATOR . 'app'.DIRECTORY_SEPARATOR.'config', '', realpath(dirname(__FILE__)))); 	# raiz de la aplicacion

# Email
define('SMPP_SMTP'				, false);
define('SMPP_HOST'				, 'invelab.com');
define('SMPP_USER'				, 'comdetur');
define('SMPP_PASS'				, 'n3w+c0nd3tur');
define('SMPP_NAME'				, SITE_NAME);
define('TO'						, 'ventas@comdetur.com.py');
define('CC'						, '','');

define('SMPP_SUBJECT'			, 'Formulario de contactos');
define('SMPP_AUTO_SUBJECT'		, 'Muchas Gracias por contactar con nosotros');
define('SMPP_AUTO_NAME'			, SITE_NAME);
