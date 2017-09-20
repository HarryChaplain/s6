<?php

class Customer {
    public $id;
    public $username;

    public function __construct($username = null){
        $this->username = $username;
    }

    public function fromArray(array $a){
        $this->id = $a["customerid"];
        $this->username  = $a["username"];
    }
}
?>
