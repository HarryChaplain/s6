<?php

class Bet {
    public $id;
    public $customerId;
    public $betSelectionId;
    public $datePlaced;
    public $BetWeekId;

    public function __construct($username = null){
        $this->username = $username;
    }

    public function fromArray(array $a){
        $this->id = $a["customerid"];
        $this->username  = $a["username"];
    }
}
?>
