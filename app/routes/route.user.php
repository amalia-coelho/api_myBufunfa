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

    function check_email($vars){
        $email = $_POST['email'] ?? null;

        if (empty($email)) {
            $resp = [
                'status' => 'error',
                'content' => "Parâmetros insuficientes"
            ];
            return json_encode($resp);
        }

        $resp = User::check_email($email);

        echo $resp;
    }
?>