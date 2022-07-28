<?php
namespace Andrea\instagram\Controller;

use Andrea\instagram\lib\Controller;
use Andrea\instagram\Model\User;

class Login extends Controller{
     
    public function __construct(){
        parent::__construct();
    }
    public function auth(){
        $username = $this->post('username');
        $password = $this->post('password');

        if(!is_null($username) && !is_null($password)){
            // TODO:: AÑADIR MODELO DEL USER Y ACABAR EL IF , ELSE

            if(!is_null($username)&& !is_null($password)){
                if(User::exists($username)){

                    $user = User::get($username);

                    if($user->commparePassword($password)){
                        //serialize (objeto en un elemento que puedo guardar)
                        $_SESSION['user'] = serialize($user);
                        error_log('the user logged in');
                        header('location: /instagram/home');

                    }else{
                        header('location: /instagram/login');
                    }

                }else{  
                    header('location: /instagram/login');
                }
            }else{
                header('location: /instagram/login');
            };
            

        }else{
            header('location: /instagram/login');
        }
    }
}