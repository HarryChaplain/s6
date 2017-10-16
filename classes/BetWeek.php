<?php

class BetWeek {
    public $id;
    public $start;
    public $finish;

    public function __construct($start = null, $finish = null){
        $this->start = $start;
        $this->finish = $finish;
    }

}
?>
