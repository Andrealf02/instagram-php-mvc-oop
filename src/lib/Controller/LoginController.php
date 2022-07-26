<?php
namespace Andrea\instagram\Controller;

use Andrea\instagram\lib\Controller;


class Login extends Controller{
     
    public function __construct(){
        parent::__construct();
    }
    public function auth(){
        $username = $this->post('username');
        $password = $this->post('password');

        if(!is_null($username) && !is_null($password)){
            // TODO:: AÑADIR MODELO DEL USER Y ACABAR EL IF , ELSE
            if(){

            }else{

            };
            

        }else{
            $this->render('error/index');
        }
    }
}