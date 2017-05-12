<?php
	$headers = "From: Comdetur Web <" . strip_tags('contacto@comdetur.com') . ">\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$fields = Array();
	$values = Array();

	foreach ($_POST AS $field => $value) {
		$fields[] = '{'.$field.'}';
		$values[] = $value;
	}

	$mensaje = str_replace($fields, $values, file_get_contents('modules/mail/'.$_POST['action'].'.html'));
	mail($_POST['to'], $_POST['subject'], $mensaje, $headers);

	echo json_encode(Array('success' => true));