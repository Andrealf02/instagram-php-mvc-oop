<?php
namespace Andrea\instagram\lib;

use Andrea\instagram\lib\Database;

class Model{
    private $db;

    public function __construct($db){
        $this->db = new Database;
    }
    public function query($query){
        return $this->db_>connect()->query($query);
    }
    public function prepare($query){
        return $this->db_>connect()->query($query);
    }

}