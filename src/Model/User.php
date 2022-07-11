<?php
namespace Andrea\instagram\Model;

use Andrea\instagram\Model;

use PDO;
USE PDOException;

class User extends Model{

    private int $id;
    private array $posts;
    private string $profile;
    

    public function __construct(
        private string $username,
        private string $pass)
    {
        $this->post = [];
        $this->profile = "";
        $this->id = 1;
    
    }

    public function save(){
        try{
            //TODO: validar si existe el usuario
            $hash = $this->getHashedPassword($this->pass);
            $query = $this->prepare('INSERT INTO users (username, password, profile) VALUES(:username, :password, :profile)');
            $query->execute([
                'username' => $this->username,
                'pass'  => $hash,
                'profile' =>$this->profile
            ]);
        }catch(PDOException){
            error_log($e->getMessage());
            return false;
        }
    }

    private function getHashedPassword($pass){
        //algoritmo para conseguir optener el hash
        //tener en cuenta que cuanto mayor sea el numero del 'cost' las veces que aplique el algoritmo sobre el pass
        return password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function getId(){
        return $this->id;
    }
    public function setId($value){
         $this->id = $value;
    }
}