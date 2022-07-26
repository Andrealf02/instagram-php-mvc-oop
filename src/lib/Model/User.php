<?php
namespace Andrea\instagram\Model;

use Andrea\instagram\lib\Model;
use Andrea\instagram\lib\Database;

use PDO;
use PDOException;

class User extends Model{

    private int $id;
    private array $posts;
    private string $profile;
    

    public function __construct(
        private string $username,
        private string $pass)
    {
        //$this-> id = 0;
        parent:: __construct('');
        $this->post = [];
        $this->profile = "";
        $this->id = -1;
    
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
        }catch(PDOException $e){
            error_log($e->getMessage());
            return false;
        }
    }

    private function getHashedPassword($pass){
        //algoritmo para conseguir obtener el hash
        //tener en cuenta que cuanto mayor sea el numero del 'cost' las veces que aplique el algoritmo sobre el pass
        return password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public static function exists($username){
        try{
            $db = new Database();
            $query = $db->connect()->prepare('SELECT username FROM users WHERE username = :username');
            $query->execute( ['username' => $username] );

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            error_log($e->getMessage());
            return false;
        }
    }

    public function getUser($username){
        try{
            $db = new Database();
            $query = $db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute( ['username' => $username] );

            $data = $query->fetch(PDO::FETCH_ASSOC);

            $user = new User($data['username'], $data['password']);
            $user->setId($data['user_id']);
            $user->setProfile($data['profile']);

            return $user;

        }catch(PDOException $e){
            error_log($e->getMessage());
            return false;
        }
    }

    public function commparePassword(string $pass):bool{
        return password_verify($pass, $this->pass);
    }

    public function getId(){
        return $this->id;
    }
    public function setId($value){
         $this->id = $value;
    }


}