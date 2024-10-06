<?php
    $route = new Router();

    // User access
    $route->addRoute('POST', '/register', 'register_user');
    $route->addRoute('POST', '/login', 'login_user');

?>