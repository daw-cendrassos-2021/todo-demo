<?php
/**
    * Controlador que gestiona el restaurat de tasques.
    * Exemple per a M07 i M08.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Restuara una tasca esborrada i redirigeix a la portada
    *
**/

/**
  * ctrlEsborrar: Controlador que carrega les tasques i visaulitza la portada
  *
  * @param $get array associatiu $_GET.
  * @param $tasques model que gestiona les tasques.
  *
**/
function ctrlRestaurar($get, $tasques)
{
    $undelete = $_GET["undelete"];
    $tasques->restaura($undelete);
    $tasques->guardar();
    header("location: index.php");
}
