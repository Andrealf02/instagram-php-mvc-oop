<?php

use Andrea\instagram\Controller\SignUp;
use Andrea\instagram\Controller\SignUpController;
use Andrea\instagram\lib\Controller\LoginController;
use Andrea\instagram\lib\Database;


$router = new \Bramus\Router\Router();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
$dotenv->load();

session_start();
$router->get('/', function(){
    echo "Inicio";
    
});
$router->get('/login', function(){
    $controller = new Login;
    $controller->render('login/index');
});
$router->post('/auth', function(){
    $controller = new Auth;
    $controller->auth();
});
$router->get('/singnup', function(){
    $controller = new SignUp;
    $controller->render('signup/index');
});
$router->post('/register', function(){
    $controller = new SignUp;
    $controller->registrer();
});
$router->get('/home', function(){
    echo "Inicio";
});
$router->post('/publish', function(){
    echo "Inicio";
});
$router->get('/profile', function(){
    echo "Inicio";
});
$router->post('/addLike', function(){
    echo "Inicio";
});
$router->get('/signout', function(){
    echo "Inicio";
});

$router->get('/profile/{username}', function($username){
    echo "profile";
});

$router->run();
