<?php
    function get_hello($vars) {
        $response = [
            'status' => 'success',
            'message' => 'Hello, World!'
        ];
        echo json_encode($response);
    }

    function test_connection($vars) {
        try {
            $db = Db::connect();
            $resp = [
                'status' => 'success',
                'message' => 'Conexão bem-sucedida!'
            ];
        } catch (Exception $e) {
            $resp = [
                'status' => 'error',
                'message' => 'Falha na conexão: ' . $e->getMessage()
            ];
        }
        
        echo json_encode($resp);
    }

?>