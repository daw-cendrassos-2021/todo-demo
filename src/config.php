<?php

$config = array();

/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = getenv("DB_USER");
$config["db"]["pass"] = getenv("DB_PASSWORD");
$config["db"]["dbname"] = getenv("DB_DATABASE");
$config["db"]["host"] = getenv("DB_HOST");

/* Path on guardarem el fitxer sqlite */
$config["sqlite"]["path"] = '../';

/* Nom de la cookie */
$config["cookie"]["name"] = 'tasques';

require_once "../src/models/tasquesSQLite.php";
require_once "../src/models/tasquesMySQLi.php";
require_once "../src/models/tasquesPDO.php";
require_once "../src/models/tasques.php";
