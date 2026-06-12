<?php

abstract class Banco {
    private static $conn;

    public static function getConn(): PDO {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(
                    "mysql:host=localhost;dbname=seucamp;charset=utf8mb4",
                    "root",
                    "",
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                );
            } catch (Exception $e) {
                header("Location: ?p=banco");
                exit;
            }
        }

        return self::$conn;
    }
}
