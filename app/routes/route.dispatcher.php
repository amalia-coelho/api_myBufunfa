<?php
    $router = new Dispatcher();
    
    // Greetings
    $router->addRoute('GET', '/hello', 'get_hello');
    $router->addRoute('GET', '/test_connection', 'test_connection');
    
    // User access
    $router->addRoute('POST', '/check_email', 'check_email');
    $router->addRoute('POST', '/register', 'register_user');
    $router->addRoute('POST', '/login', 'login_user');

    return $router;
?>