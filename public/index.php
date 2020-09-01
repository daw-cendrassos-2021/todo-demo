<?php 

include "tasques.php";

$tasca = $_POST["tasca"];
$delete = $_GET["delete"];

$model = new tasques;

if(isset($tasca)){
	$model->afegir($tasca);
}

if(isset($delete)){
	$model->esborrar($delete);
}

$model->guardar();
$tasques = $model->llistat();


include "view.php";



