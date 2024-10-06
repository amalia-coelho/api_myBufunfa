<?php
class Dispatcher {
    private $routes = [];

    // Adiciona uma nova rota
    public function addRoute($method, $path, $action) {
        $this->routes[] = ['method' => $method, 'path' => $path, 'action' => $action];
    }

    // Roda o roteador
    public function run($requestUri, $requestMethod) {
        foreach ($this->routes as $route) {
            if ($requestMethod == $route['method'] && $requestUri == $route['path']) {
                include_once $route['action']; // Inclui a rota correspondente
                return;
            }
        }
        // Retorna 404 se não encontrar a rota
        http_response_code(404);
        echo json_encode(["message" => "Rota não encontrada"]);
    }
}
?>