<?php
namespace Andrea\instagram\Controller;

class SingUp extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function registrer(){
        $username = $this->post('username');
        $pass = $this->post('pass');
        $profile = $this->file('profile');
        if(
            !is_null($username)&&
            !is_null($pass)&&
            !is_null($profile)
        ){
            $pictureName = UtilImage:: storeImage($profile);
            $user = new User($username, $pass);
            $user-> setProfile($pictureName);
            $user-> save;
            header('location : /instagram/login');
        }else{
            this->render('error/index');
        }
    }
}