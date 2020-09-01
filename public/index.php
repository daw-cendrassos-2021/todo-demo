<?php 

include "tasques.php";

$tasca = $_POST["tasca"];
$delete = $_GET["delete"];
$undelete = $_GET["undelete"];

$model = new tasques;

if(isset($tasca)){
	$model->afegir($tasca);
}

if(isset($delete)){
	$model->esborrar($delete);
}

if(isset($undelete)){
	$model->restaura($undelete);
}

$model->guardar();
$tasques = $model->llistat();
$fetes = $model->llistatFetes();

include "view.php";



