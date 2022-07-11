<?php

use Andrea\instagram\Controller\SignUp;

$router = new \Bramus\Router\Router();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
$dotenv->load();

session_start();
$router->get('/', function(){
    echo "Inicio";
    
});
$router->get('/login', function(){
    echo "Login";
});
$router->post('/auth', function(){
    echo "Inicio";
});
$router->get('/singnUp', function(){
    $controller = new SignUp;
    $controller->render('signup/index');
});
$router->post('/register', function(){
    echo "Inicio";
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
