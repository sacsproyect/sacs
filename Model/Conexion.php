<?php
abstract class Conexion {

    private static $server = 'localhost';
    private static $db = 'sacs';
    private static $user = 'rooot';
    private static $password = '';

    public static function connectDB() {
        try {
            $conection = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db . ";charset=utf8", self::$user, self::$password);
        } catch (PDOException $e) {

            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        return $conection;
    }

}



