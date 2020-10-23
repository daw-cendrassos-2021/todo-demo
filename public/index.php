<?php
/**
    * Gestor de tasques amb cookies.
    * Exemple per a M07 i M08.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Permet crear tasques, consultar-les, marcar-les com fetes o recuperar-les.
    * Per provar com funcionar podeu executar php -S localhost:8000 a la carpeta public.
    * I amb el navegador visitar la url http://localhost:8000/
    *
**/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/tasquesSQLite.php";

$tasca = $_POST["tasca"];
$delete = $_GET["delete"];
$undelete = $_GET["undelete"];

$model = new Daw\TasquesSQLite();

if (isset($tasca)) {
    $model->afegir($tasca);
}

if (isset($delete)) {
    $model->esborrar($delete);
}

if (isset($undelete)) {
    $model->restaura($undelete);
}

$model->guardar();
$tasques = $model->llistat();
$fetes = $model->llistatFetes();

include "../src/view.php";
