<?php
class Database {
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            try {
                $host = 'localhost';
                $dbname = 'mybufunfa';
                $username = 'root';
                $password = 'root';

                self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->exec("set names utf8");
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
                exit;
            }
        }
        return self::$conn;
    }

    public static function exec($sql, $params = []) {
        $conn = self::connect();
        $stmt = $conn->prepare($sql);
        
        // Vincular os parâmetros com bindParam
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        
        // Executa a query
        if ($stmt->execute()) {
            if (preg_match('/^INSERT/i', $sql)) {
                return $conn->lastInsertId(); // Retorna o último ID inserido
            }
            return true;
        } else {
            return false;
        }
    }

    public static function query($sql, &$params = []) {
        $conn = self::connect();
        $stmt = $conn->prepare($sql);
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value); // bindParam usado aqui
        }
        $stmt->execute();
        return $stmt;
    }

    public static function fetch($sql, $params = []) {
        $stmt = self::query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function fetchAll($sql, $params = []) {
        $stmt = self::query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>