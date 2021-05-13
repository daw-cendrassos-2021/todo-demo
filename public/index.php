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
include "../src/config.php";

include "../src/controladors/afegir.php";
include "../src/controladors/esborrar.php";
include "../src/controladors/portada.php";
include "../src/controladors/restaurar.php";

$r = $_REQUEST["r"];
$model = new Daw\tasquesMysqli($config["db"]);


if ($r === "afegir") {
    ctrlAfegir($_POST, $model);
} elseif ($r === "esborrar") {
    ctrlEsborrar($_GET, $model);
} elseif ($r === "restaurar") {
    ctrlrestaurar($_GET, $model);
} else {
    ctrlPortada($_GET, $model);
}
