<?php
/***
---------------------------------		
autor: Abigail Acuna
email: abiacu@gmail.com
---------------------------------
	
	define('SMPP_HOST'	, 'mail.cominio.com');
	define('SMPP_USER'	, 'user');
	define('SMPP_PASS'	, 'pass');
	define('SMPP_NAME'	, 'name');
	define('SMPP_FROM'	, 'from');
	
	Options:
		+ 'body'	=> 'el cuerpo del mail'
		+ 'to'		=> 'el destinatario del mail'
		+ 'subject'	=> 'el asunto del mail'
		+ 'from'	=> 'el remitente del mail, en caso de tener esta opcion, sobrescribe la definida en SMPP_FROM'
		+ 'name'	=> 'el nombre del remitente del mail, en caso de tener esta opcion, sobrescribe la definida en SMPP_NAME'
		+ 'attach'	=> 'archivos adjuntos'
		
	Example:
	
	Sendmail::send(array(
					'body' 		=> 'Hola mundo',
					'to' 		=> 'email@gmail.com',
					'subject' 	=> 'asunto',				
					'from' 		=> 'remitente@gmail.com',
					'name' 		=> 'Remitente',
					'attach'	=> array(array('files/demo.zip', 'name.zip'),
										 array('files/image.jpg')
										)					
	));

***/

class Sendmail {

	function send($options = array()) {
		$emails = preg_split("/[,| ]+/", $options['to']);
		if (count($emails)>1) {
			$options['to'] = $emails[0]; unset($emails[0]);
			if(!empty($emails)) { foreach ($emails as $email) $options['cc'][] = $email; }
		}
		
		#print_r($options);exit();

		$mail = new PHPMailer();
		if (SMPP_SMTP) $mail->IsSMTP();

		$mail->SMTPAuth 	= SMPP_SMTP;
		$mail->Host 		= empty($options['host']) ? SMPP_HOST : $options['host'];
		$mail->SMTPSecure	= 'ssl'; 				
		$mail->Port		 	= 465;        			

		$mail->IsHTML(true);
		$mail->CharSet	= 'utf-8';
		
		if (SMPP_SMTP) $mail->Username = empty($options['user']) ? SMPP_USER : $options['user'];
		if (SMPP_SMTP) $mail->Password = empty($options['pass']) ? SMPP_PASS : $options['pass'];
		$mail->From 	= empty($options['from']) ? SMPP_FROM : $options['from'];
		$mail->FromName = empty($options['name']) ? SMPP_NAME : $options['name'];
		$mail->Subject 	= $options['subject'];
		
		$emails = explode(',',$options['to']);
		foreach($emails as $i => $email) {
			if ($i==0) {
				$mail->AddAddress($email);													  	
			} else {
				$mail->AddCC($email);													  	
			}
		}
		
		if (isset($options['cc'])) {
			foreach ($options['cc'] as $i => $email) {
				if (!empty($email)) $mail->AddCC($email);	
			}			
		} 		
		
		if (isset($options['attach'])) {
			foreach ($options['attach'] as $i => $file) {
				if ($file[1]) {
					$mail->AddAttachment($file[0], $file[1]);		
				} else {
					$mail->AddAttachment($file[0]);		
				}
			}
		}

		$mail->Body = $options['body'];
	#	if (!
		if($mail->Send()) {
	#		echo "Done.. \n Subject: ".$options['subject'];
		} else {
	#		echo "Error: ".$mail->ErrorInfo."\n".$options['subject'];
		}
	#	) {
	#		echo "No se pudo enviar el mail a: ".$options['to']."\n\n Error: ".$mail->ErrorInfo."\n";
	#		print '<pre>';print_r($mail);print '</pre>';
	#		exit();
	#		return false;
	#	} else {
	#		return true;
	#	}      
		$mail->SmtpClose();
	}	
}


?>