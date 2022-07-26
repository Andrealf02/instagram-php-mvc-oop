<?php
namespace Andrea\instagram\lib;
use PDO;
use PDOException;

class Database{
    private string $host;
    private string $db;
    private string $user;
    private string $pass;
    private string $charset;

    public function connect():PDO{
        try{
            $con = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $option = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES      =>false,

            ];

            $pdo = new PDO(
                $con,
                $this->user,
                $this->pass,
                $option
            );
            return $pdo;

        }catch(PDOEXception $e){
            throw $e;
        }
    }
    
}

