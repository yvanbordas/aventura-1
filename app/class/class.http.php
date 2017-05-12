<?php
/**
 * @author Abigail Acuna
 * abiacu@gmail.com
 */

class HTTP_Functions {

	function message_add($params = array()) {
		if (is_array($params)) {
			$_SESSION['flash'] = array('message' => $params['message'], 'type' => $params['type']);
			if (!empty($params['url'])) {
				header("Location: {$params['url']}");
				exit();
			}
		} elseif (is_string($params)) {
			$_SESSION['flash'] = array('message' => $params, 'type' => 'error');
		}
	}
		
	function message_show() {
		if(isset($_SESSION['flash']) and !empty($_SESSION['flash']['message'])) {
			$message = "<p class=\"msg ". $_SESSION['flash']['type'] ."\"><span></span>" . $_SESSION['flash']['message'] . "</p>";
			unset($_SESSION['flash']);
			return($message);
		}
	}
	
	function redirect($url) {
		header("Location: {$url}");
		exit();
	}		
		
}


?>