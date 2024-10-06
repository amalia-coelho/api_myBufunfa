<?php
    function register_user($vars){
        if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name'])) {
            $resp = [
                'status' => 'error',
                'content' => "Parâmetros insuficientes"
            ];
            echo json_encode($resp);
            return;
        }
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
    
        // Chama o método de registro no model
        $response = User::register($email, $password, $name);
        echo json_encode($response);
    }
?>