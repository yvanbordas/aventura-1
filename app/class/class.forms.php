<?php
/**
 * @author Abigail Acuna
 * abiacu@gmail.com
 */

class Forms {	

	public $post;
	public $error;

	public function Forms($error = array()) {
		$this->post	 = $this->_post();
		$this->error = $error;			
	}	

	private function _post() {
		if (empty($_POST)) $_POST = array();
		if (empty($_GET))  $_GET = array();
		return array_merge($_GET,$_POST);
	}

   /**
	* input_text 
	*/
	public function input_text($name, $obj = array()) {

		$extras = "";

		if($this->post_value($name)) $extras = " value=\"" . htmlspecialchars($this->post_value($name)) . "\" ";

		$extras .= $this->extras($obj);			

		return "<input type=\"text\" name=\"" . $name . "\" " . $extras . " />" . $this->error($name);			
	}	

/**
	* input type radio, checkbox, button, hidden, password, upload
	*/
	public function input_pass($name, $obj = array()) {

		$extras = "";

		if($this->post_value($name)) $extras = " value=\"" . $this->post_value($name) . "\" ";

		$extras .= $this->extras($obj);			

		return "<input type=\"password\" name=\"" . $name . "\" " . $extras . " />" . $this->error($name);			
	}	

	public function checkbox($name, $value = false, $obj = array(), $defaul = false) {
		$value2 = $this->post_value($name);
		if((isset($value2) and $value2 == $value) or (!$this->post_value($name) and $defaul)) $extras = " checked=\"checked\" ";

		$extras .= $this->extras($obj);

		if(!$value) $value = $this->post_value($name);		

		return "<input type=\"checkbox\" name=\"" . $name . "\" value=\"" . htmlspecialchars($value) . "\" " . $extras . " />" . $this->error($name);
	}

	public function radio($name, $value = false, $obj = array(), $defaul = false) {
		$value2 = $this->post_value($name);
		if((isset($value2) and $value2 == $value) or (!$this->post_value($name) and $defaul)) $extras = " checked=\"checked\" ";

		$extras .= $this->extras($obj);

		if(!$value) $value = $this->post_value($name);

		return "<input type=\"radio\" name=\"" . $name . "\" value=\"" . htmlspecialchars($value) . "\"" . $extras . " />" . $this->error($name);			
	}				

	public function button($type, $name, $value, $obj = array()) {

		$extras .= $this->extras($obj);			

		return "<input type=\"" . $type . "\" name=\"" . $name . "\"  value=\"" . $value . "\" " . $extras . " />" . $this->error($name);			
	}

	public function hidden($name, $value = false, $obj = array()) {

		$extras .= $this->extras($obj);

		if(!$value) $value = $this->post_value($name);

		return "<input type=\"hidden\" name=\"" . $name . "\" value=\"" . htmlspecialchars($value) . "\"" . $extras . " />";			
	}

	public function input_attach($name, $obj = array()) {

		$extras = $this->extras($obj);	

		return "<input type=\"file\" name=\"" . $name . "\" " . $extras . " />" . $this->error($name);			
	}	

   /**
	* textarea
	*/
	public function textarea($name, $obj = array()) {

		$extras = $this->extras($obj);								

		if(isset($value))
			$value = $this->post_value($name);

		return "<textarea name=\"" . $name . "\" " . $extras . ">" . $this->post_value($name) . "</textarea>" . $this->error($name);	
	}

   /**
	* select
	*/
	public function select($name, $options, $obj = array()){

		$extras = $this->extras($obj);	

		foreach($options as $value => $view) {	
			if (is_array($view)) {
				$html 		= '';
				$sub_option = '';

				foreach($view as $_value => $_view){
					$selected = "";	
					eval('$control = ereg(\'^('.$this->post_value($name).')$\', \''.$_value.'\') ? true : false;');

					if ($control) $selected = "selected=\"selected\"";	

					$sub_option .= "<option value=\"" . $_value."\" " . $selected. "> " . $_view."</option>\n";												
				}
				$option .= "<optgroup label=\"{$value}\">{$sub_option}</optgroup>";

			} else {		

				$selected = "";	
				eval('$control = ereg(\'^('.$this->post_value($name).')$\', \''.$value.'\') ? true : false;');

				if ($control) $selected = "selected=\"selected\"";	

				$option .= "<option value=\"" . $value."\" " . $selected. "> " . $view."</option>\n";								
			}
		}		

		return "<select name=\"". $name."\" " . $extras . ">\n" . $option . "</select>" . $this->error($name);			
	}	


   /**
	* select_date DD-MM-YY hh:mm:ss optional
	*/
	public function select_date($format, $default = true, $w = 1) {

		$options = array(
							"D" => array("d", $this->date_array("num", 1, 31), 50),
							"M" => array("m", $this->date_array("mon", 1, 12), 100),
							"Y" => array("Y", $this->date_array("num", date('Y')-100, date('Y')+20), 60),
							"h" => array("H", $this->date_array("num", 0, 23), 50),
							"m" => array("i", $this->date_array("num", 0, 59), 50),
							"s" => array("s", $this->date_array("num", 0, 59), 50)
						);	

		foreach($format as $select => $name) {

			$inter = ($select == 'm' or $select == 's') ? ":" : "";
			$inter = ($select == 'h') ? "&nbsp;&nbsp;" : $inter ;

			if($default and !$this->post[$name]) $this->post[$name] = date($options[$select][0]);		
			$date .= $inter . $this->select($name, $options[$select][1], array("style" => 'width:'.($options[$select][2]*$w).'px;')) . "\n";
		}			
		return $date;
	}

   /**
	* Devuelve el boton submit de acuerdo a la accion
	*/	
	public function submit($params = array()) {		

		$p = $params['options'];

		$location = preg_replace("/[?|&](add&modificar&id)=[0-9]+/", '', $_SERVER['REQUEST_URI']);
		$location = preg_match("/[?|&](add&)[a-z_]+(id)=[0-9]+/", $location) ? 
							preg_replace("/[?](add&)/", '?', $location) : $location;

		$location = preg_replace("/[?](add)$/", '', $location);

		$p['onclick'] = "location.href='{$location}'";
		$add_new = $this->button("button", "cancel", " Cancelar ", $p);

		if (isset($_GET['modificar'])) {
			if (is_array($params['hidden'])) {
				foreach ($params['hidden'] as $name) {
					$hidden .= call_user_func_array(array($this, "hidden"), array($name))."\n";	
				}

				#$add_new = " <a href='".str_replace("update&", "", $_SERVER['REQUEST_URI'])."'> Add nuevo [+] </a>";
			}	

			$extras = array("submit", "update", " Modificar ", $params['options']);
		} else {
			$extras = array("submit", "insert", " Guardar ", $params['options']);
		}

		return $hidden . call_user_func_array(array($this, "button"), $extras) . $add_new;	
	}	

   /**
	* Traigo el valor del post de acuerdo al nombre del campo
	*/	
	private function post_value($name) {
		$name 		= str_replace(']', '', trim($name));
		$field 		= preg_split("/(\[|\]|\]\[)/", $name);
		$field_name = (string)"['".implode("']['", $field)."']";
		eval('$value = isset($this->post'.$field_name.') ? $this->post'.$field_name.' : "";');							
		return $value;
	}

	private function date_array($flag, $from, $until)	{

		$month = split(",","Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre");
		#$month = split(",","Ene,Feb,Mar,Abr,May,Jun,Jul,Ago,Set,Oct,Nov,Dic");

		for($i=$from; $i<=$until; $i++){	

			$num = str_pad($i,2,"0",STR_PAD_LEFT);
			$date[$num] = ($flag == "num")? $num : $month[$i-1];
		}
		return $date;
	}

	private function extras($obj){
		$extras = null;
		if(count($obj)!=0){			
			foreach($obj as $objName => $val){				
				$extras .= $objName."=\"".$val."\" ";								
			}
		}	
		return 	$extras;
	}

	private function error($name){		

		if($this->error[$name]) return '<label for="field" generated="true" class="error">'.$this->error[$name].'</label>'; 		
	}

}	
?>
	