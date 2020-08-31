<?php 

$tasquesJson = $_COOKIE["tasques"];

if(isset($tasquesJson)){
	$tasques = json_decode($tasquesJson);
} else {
	$tasques= array();
}

$tasca = $_POST["tasca"];
$delete = $_GET["delete"];

if(isset($tasca)){
	$tasques[] = $tasca;
}

if(isset($delete)){
	array_splice ($tasques, $delete, 1);
}

setcookie("tasques",json_encode($tasques));

include "view.php";



