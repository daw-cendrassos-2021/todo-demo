<?php 

$i = $_COOKIE["comptador"];

if(isset($i)){
	$i++;
} else {
	$i = 0;
}
setcookie("comptador",$i);

include "view.php";



