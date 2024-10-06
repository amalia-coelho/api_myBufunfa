<?php
    function get_hello($vars) {
        $response = [
            'status' => 'success',
            'message' => 'Hello, World!'
        ];
        echo json_encode($response);
    }

?>