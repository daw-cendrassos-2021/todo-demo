<?php

include "../src/config.php";


$error = false;

/*
Primer escollim el model en funció dels paràmetres
la variable argv té els paràmetres de la línia de comandes.
*/
if (count($argv) > 1) {
    if ($argv[1] == "pdo") {
        $model = new Daw\tasquesPDO($config["db"]);
    } elseif ($argv[1] == "sqlite") {
        $model = new Daw\TasquesSQLite($config["sqlite"]);
    } elseif ($argv[1] == "mysqli") {
        $model = new Daw\TasquesMySqli($config["db"]);
    } else {
        $error = true;
    }
} else {
    $error = true;
}

/* Si hem pogut carregar un model inserim un camp d'exemple */
if (!$error) {
    $model->afegir("tasca d'exemple");
    echo "Acabem inserir una tasca d'exemple";
    return 1;
} else {
    if ($argv[1] == "cookie") {
        echo "Les cookies només funcionen amb el navegador.\n\n";
        echo "Si vols fer algun manteniment utilitza l'inspector del navegador\n";
    } else {
        echo "Falten paràmetres!!!!\n";
        echo "Ex: $ php init.php pdo\n\n";
        echo "Paràmetres acceptats: pdo mysqli sqlite  i cookie";
    }
    return 0;
}
