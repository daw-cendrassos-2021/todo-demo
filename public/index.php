<?php 

$tasquesJson = $_COOKIE["tasques"];

if(isset($tasquesJson)){
	$tasques = json_decode($tasquesJson);
} else {
	$tasques= array();
}

$tasca = $_POST["tasca"];

if(isset($tasca)){
	$tasques[] = $tasca;
}

setcookie("tasques",$tasques);

include "view.php";



