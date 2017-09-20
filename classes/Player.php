<?php

class Player {
    public $id;
    public $name;

    public function __construct($name = null){
        $this->name = $name;
    }

    public function fromArray(array $a){
        $this->id = $a["playerid"];
        $this->name  = $a["name"];
    }
}
?>
