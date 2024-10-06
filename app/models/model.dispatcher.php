<?php
class Dispatcher {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function run($requestUri, $requestMethod) {
        foreach ($this->routes as $route) {
            if ($requestMethod === $route['method'] && $requestUri === $route['path']) {
                $handler = $route['handler'];
                if (function_exists($handler)) {
                    $handler([]); // Você pode passar parâmetros se necessário
                } else {
                    http_response_code(404);
                    echo json_encode(['message' => 'Handler not found']);
                }
                return;
            }
        }

        http_response_code(404);
        echo json_encode(['message' => 'Rota não encontrada']);
    }
}
?>