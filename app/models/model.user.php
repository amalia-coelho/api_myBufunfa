<?php

class User {
    public static function register($email, $password, $name){
        try {
            $sql = "SELECT id FROM users WHERE email = :email";
            $params = [
                ':email' => $email,
            ];

            $db = Db::connect();
            $query = $db->query($sql, $params);
            $result = $query->fetchAll();

            if (!empty($result)){
                $resp = array(
                    'status' => 'error',
                    'content' => 'Este email já esta sendo usado'
                );

                return $resp;
            }else{
                $sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
                $params = [
                    ':email' => $email,
                    ':password' => $password,
                    ':name' => $name
                ];

                $result = $db->exec($sql, $params);

                if ($result){
                    $resp = [
                        'status' => 'success',
                        'content' => 'Cadastrado!'
                    ];

                    return $resp;
                }
            }   
        }catch (Exception $error){
            $resp = array(
                'status' => "error",
                'content' => $e->getMessage()
            );
            return $resp;
        }
    } 

    public function login($email, $password) {
        // Query para buscar o usuário com base no email
        
        $sql = "SELECT id, name, email, password FROM users WHERE email = :email";
        $db = Db::connect();
        $query = $db->query($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Retorna os dados do usuário, exceto a senha
            unset($user['password']);
            return $user;
        }
        return false;
    }
}
?>