<?php
    // Descomente para debugar erros
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    require_once __DIR__."/vendor/autoload.php";
    require_once __DIR__ .'/app/config/init.php';
    
    header("Content-Type: application/json");
    header('Access-Control-Allow-Origin: *');

    // Captura a URL e o método da requisição
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $result = $router->run($requestUri, $requestMethod);

    if ($result){
        // Se a rota foi encontrada, retorna o resultado
        echo json_encode($result);
    }
?>