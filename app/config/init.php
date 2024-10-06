<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Accept, X-Auth-Token, Origin, Authorization');

// Alterar timezone pra não ler horário de verão
// date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set("America/Recife");

# ---------
# Load all models
$modelsDir = realpath(dirname(__FILE__) . "/../models/");
if ($modelsDir) {
    $directories = dir($modelsDir);
    while ($file = $directories->read()) {
        if (strstr($file, "model.") && substr($file, -4) === ".php") {
            require_once($modelsDir . "/" . $file);
        }
    }
    $directories->close();
}

# ---------
# Load all routes
$routesDir = realpath(dirname(__FILE__) . "/../routes/");
if ($routesDir) {
    $dir = dir($routesDir);
    while ($fileName = $dir->read()) {
        if (strstr($fileName, "route") && substr($fileName, -4) === ".php") {
            require_once($routesDir . "/" . $fileName);
        }
    }
    $dir->close();
}

?>