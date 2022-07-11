<?php
namespace Andrea\instagram\lib;

class Controller{
    
    private View $view;
    protected function __construct(){
        $this->view = new View();
    }

    public function render(string $name, array $data = []){
        $this->view->render($name, $data);
    }

    protected function post(string $param){
        if(!isset($_POST[$param])){
            return NULL;
        }
        return $_POST[$param];
    }

    protected function get(string $param){
        if(!isset($_GET[$param])){
            return NULL;
        }
        return $_GET[$param];
    }
}