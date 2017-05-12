<?php
# Validations class
# Abigail Acuña
# abiacu@gmail.com

/**
 *
 *	Uso: 
 *	Crear un array con los elementos que se quieren validar, 
 * y pasarlo a la funcion Validations::check(), por ejemplo.
 *
 *	$fields = array(
 *			array(
 *				'value' => array('email' => $_POST['email'], 'email2', 'nombre'),
 *				'errors' => array(
 *					'blank' => 'No puede estar en blanco',
 *					'email' => 'Debe ser un mail valido')
 *				),
 *			array(
 *				'value' => array('sexo', 'sexo2'),
 *				'errors' => array('blank', 'regexp' => "^[f|m]$")
 *				),
 *			array(
 *				'value' => array('edad','telefono'),
 *				'errors' => array('regexp' => array('^[0-9]+$', 'Debe ser numerio'))
 *				)
 * 		);
 *		
 *		$errors = Validations::check($fields);
 *		
 *		Luego, para mostrar el error en el html:
 *		
 *		$errors->show('email');
 *		$errors->show('email2');
 *		$errors->show('name');
 *		
 *		Para checkear si hay algun error:
 *		
 *		$errors->has_errors()
 *		
 *		Esta ultima funcion devuelve true si hay errores, y false en caso que no.
 *		
 */


class Validations {
	
	private $fields = array();
	private $errors = array();
	
	function Validations($fields) {
		$this->fields = $fields;	
	}
	
	# chequeo si los datos enviados son validos
	public static function check($fields=array()) {
		$_instance = new self($fields);
		$_instance->_each_fields();
		return $_instance;
	}
	
	# muestro el error del campo
	public function show($field='') {
		if ($this->errors) {
			return $field == '' ? $this->errors : $this->errors[$field];
		} else {
			return false;
		}		
		
	}
	
	# para agregar un error sobre a marcha
	public function add($field, $message) {
		$this->set_error($field, $message);
	}
	
	# Veo si hay errores
	public function has_errors() {
		return(!empty($this->errors));
	}
	
	
	# PRIVATE FUNCTIONS
	
	private function _each_fields() {
		foreach($this->fields as $field) {
		#	print_r($field);
			$this->_find_errors($field);
		}
	}
	
	private function _find_errors($field=array()) {	
		if(!empty($field))	{
			if(array_key_exists('value', $field) and array_key_exists('errors', $field)) {
				if(is_array($field['value']) and is_array($field['errors'])) {
					foreach ($field['value'] as $key => $value) {
						if (preg_match("/^[0-9]+$/", $key)) {
						  /**
						   * Junto el $_POST[] y $_GET[] en una variable "$post" por cualquier cosa :)
						   */
							$post = array_merge($_POST, $_GET);							
							$this->_check_error($value, $post[$value], $field['errors']);
						} else {
							$this->_check_error($key, $value, $field['errors']);
						}	
					}
				}
			}
		}
	}
	
	private function _check_error($field_name, $field_data, $field_errors) {
		if(!empty($field_errors)) {			
			foreach($field_errors as $key => $value) {
				if(is_numeric($key)) {
					$this->call_validation_method($field_name, $field_data, $value);
				}else{
					$this->call_validation_method($field_name, $field_data, $key, $value);
				}
			}
		}
		# $this->call_validation_method()
	}
	
	private function call_validation_method($field_name, $field_data, $validation_method, $message='') {
		call_user_func_array(array($this, "validate_{$validation_method}"), array($field_name, $field_data, $message));
	}
	
	private function set_error($to_field, $message) {
		if(is_null($this->errors[$to_field]))
			$this->errors[$to_field] = $message;
	}
	
	private function set_message(&$message, $new_message) {
		if(empty($message))
			$message = $new_message;
		return $message;
	}
	
	
	/**** VALIDATIONS ****/
	
/**
 * Valida dependiendo de la expresion regular:
 */
	private function validate_regexp($field_name, $field_data, $message) {
		
		if (!is_array($message))
			$message = array($message[0], "Invalid data.");
			
		if (!ereg("{$message[0]}", $field_data))
			$this->set_error($field_name, $message[1]);
	}
	

/**
 * Valida si el campo esta vacio
 */	
	private function validate_blank($field_name, $field_data, $message) {
		if(empty($message))
			$message = "Can't be blank.";
		
		if(empty($field_data))
			$this->set_error($field_name, $message);
	}
	
	
/**
 * Valida si es un mail valido
 */
	
	private function validate_email($field_name, $field_data, $message) {
		//$this->set_message(&$message, "Invalid email address.");
			
		if(!eregi("^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$", $field_data))
			$this->set_error($field_name, $message);
	}
	
	
/**
 * Valida si es numerico
 */
	
	private function validate_numeric($field_name, $field_data, $message) {
		//$this->set_message(&$message, "Invalid email address.");
			
		if(!eregi("^[0-9]+$", $field_data))
			$this->set_error($field_name, $message);
	}	
	
/**
 * Valida si es numerico
 */

	private function validate_float($field_name, $field_data, $message) {
		//$this->set_message(&$message, "Invalid email address.");

		if(!eregi("^([0-9]+|[0-9]+\.[0-9]{1,2})$", $field_data))
			$this->set_error($field_name, $message);
	}	


/**
 * Valida si es una URL
 */
	
	private function validate_url($field_name, $field_data, $message) {
		//$this->set_message(&$message, "Invalid email address.");
			
		if(!eregi("^(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*", $field_data))
			$this->set_error($field_name, $message);
	}
		
/**
 * La idea es que se vayan agregando mas validaciones, por ejemplo, 
 * validacion de rangos, si es numerico, telefono, dominios, etc.
 *
 *
 * EN	CASO DE QUE SE AGREGUEN MAS VALIDACIONES. POR FAVOR MANTENER EL ESTILO.
 *
 */
		
	
}

?>