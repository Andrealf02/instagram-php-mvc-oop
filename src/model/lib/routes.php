<?php

$router = new \Bramus\Router\Router();
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
$router->get('/signup', function(){
    echo "Inicio";
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
$router->get('/singout', function(){
    echo "Inicio";
});

$router->get('/profile/{username}', function($username){
    echo "profile";
});

$router->run();
