<?php
date_default_timezone_set("Europe/London");
class Bet {
    public $id;
    public $customerId;
    public $datePlaced;
    public $betWeekId;

    public function __construct($customerId = null, $betWeekId = null){
        $this->customerId = $customerId;
        $this->datePlaced = date("Y-m-d");
        $this->betWeekId = $betWeekId;
    }

    public function fromArray(array $a){
        $this->id = $a["betid"];
        $this->customerId = $a["customerid"];
        $this->datePlaced  = $a["datePlaced"];
        $this->betWeekId = $a["betWeekid"];
    }
}
?>
