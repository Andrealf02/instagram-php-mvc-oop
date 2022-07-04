<?php
namespace Andrea\instagram\lib;

class Controller{
    
    private View $view;
    public function __construct(){
        $this->view = new View();
    }

    public function render(string $name, array $data = []){
        $this->view->render($name, $data);
    }

    public function post(string $param){
        if(!isset($_POST[$param])){
            return NULL;
        }
        return $_POST[$param];
    }

    public function get(string $param){
        if(!isset($_GET[$param])){
            return NULL;
        }
        return $_GET[$param];
    }
}