<?php 

class tasques {
	
	public $tasques = array();

	function __construct(){
		$tasquesJson = $_COOKIE["tasques"];

		if(isset($tasquesJson)){
			$this->tasques = json_decode($tasquesJson);
		}
	}

	function afegir($tasca){
		$this->tasques[] = $tasca;
	}

	function esborrar($id){
		array_splice ($this->tasques, $id, 1);
	}

	function guardar(){
		setcookie("tasques",json_encode($this->tasques));
	}

	function llistat(){
		return $this->tasques;
	}
}