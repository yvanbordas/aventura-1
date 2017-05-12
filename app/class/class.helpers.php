<?php
class Helpers {
		
	public static function send($fields) {

		$errors = Validations::check($fields);

		if ($errors->has_errors()) {
			HTTP_Functions::message_add(array(
				'message' 	=> 'Error. Por favor controle los datos ingresados.', 
				'type'		=> 'error'
			));	
			return $errors->show();
		} else {

			foreach ($_POST as $name => $value) $_POST[$name] = utf8_decode($value);		
			extract($_POST);	
		
			$body = '<h1>Formulario de contactos</h1>';
			$body .= "<p><strong>Nombre:</strong> {$nombre}<br>";
			$body .= "<strong>Email:</strong> {$email}<br>";
			$body .= "<strong>Telefono:</strong> {$telefono}<br>";
			$body .= "<strong>Como supo de nosotros:</strong> {$comoind}<br>";
			$body .= "<strong>Mensaje:</strong> {$mensaje}</p>";

			Sendmail::send(array(
							'body' 		=> $body,
							'to' 		=> TO,
							'cc'		=> split(',', CC),
							'from' 		=> TO,
							'subject'	=> SITE_NAME.' FORMULARIO DE CONTACTOS',
							'name' 		=> strtoupper($nombre)
			));
			
			$body  = "<h1>Hola {$nombre}!! </h1>";
			$body .= "<p>Nuestro equipo se pondrá en contacto con usted en brevedad posible.</p>";
			$body .= '<p><a href="http://sincomillas.com.py/">www.sincomillas.com.py/</a></p>';
			
			Sendmail::send(array(
							'body' 		=> $body,
							'to' 		=> $email,
							'cc'		=> array(),
							'from' 		=> TO,
							'subject'	=> SMPP_AUTO_SUBJECT,
							'name' 		=> SMPP_AUTO_NAME
			));	
			HTTP_Functions::message_add(array(
				'message' 	=> "Gracias por escribirnos {$nombre}. Nos comunicaremos con usted brevedad posible.", 
				'type'		=> 'done'
			));	
					
		}	
	}
}

?>