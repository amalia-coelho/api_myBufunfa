<?php
    $router = new Dispatcher();
    
    // Greetings
    $router->addRoute('GET', '/hello', 'get_hello');
    
    // User access
    $router->addRoute('POST', '/register', 'register_user');
    $router->addRoute('POST', '/login', 'login_user');

    return $router;
?>