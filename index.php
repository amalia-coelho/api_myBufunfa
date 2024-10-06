<?php 
    require_once __DIR__."vendor/autoload.php";
    header("Content-Type: application/json");
    
    include_once 'routes/route.dispatcher.php'; // Inclui o dispatcher
    
    // Captura a URL e o método da requisição
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    
    // Executa o roteamento através do dispatcher
    $router = new Router();
    $router->run($requestUri, $requestMethod);
?>