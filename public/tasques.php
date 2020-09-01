<?php 

class tasques {
	
	public $tasques = array(
		"actives" => array(),
		"fetes" => array(),
	);

	function __construct(){
		$tasquesJson = $_COOKIE["tasques"];

		if(isset($tasquesJson)){
			$this->tasques = json_decode($tasquesJson, True);
		}
	}

	function afegir($tasca){
		$this->tasques["actives"][] = $tasca;
	}

	function esborrar($id){
		$this->tasques["fetes"][] = $this->tasques["actives"][$id];
		array_splice ($this->tasques["actives"], $id, 1);
	}

	function guardar(){
		setcookie("tasques",json_encode($this->tasques));
	}

	function llistat(){
		return $this->tasques["actives"];
	}

	function llistatFetes(){
		return $this->tasques["fetes"];
	}
}