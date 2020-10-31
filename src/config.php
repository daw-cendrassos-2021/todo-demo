<?php

$config = array();

/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'tasques';
$config["db"]["pass"] = 'daw2020';
$config["db"]["dbname"] = 'tasques';
$config["db"]["host"] = 'localhost';

/* Path on guardarem el fitxer sqlite */
$config["sqlite"]["path"] = '../';

/* Nom de la cookie */
$config["cookie"]["name"] = 'tasques';

require_once "../src/models/tasquesSQLite.php";
require_once "../src/models/tasquesMySQLi.php";
require_once "../src/models/tasquesPDO.php";
require_once "../src/models/tasques.php";
