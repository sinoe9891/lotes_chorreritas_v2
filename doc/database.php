<?php
class Database{
    private $dbhost   = 'localhost';
    private $dbname   = 'graduates';
    private $username = 'root';
    private $password = '';
    private $charset  = 'utf8mb4';

    function connect(){
        try{
            $conexion = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error de conexión: ' . $e->getMessage());
        }
    }
}
?>