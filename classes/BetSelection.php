<?php
class BetSelection {
    public $id;
    public $betId;
    public $playerId;
    public $didScore;


    public function __construct($betId = null, $playerId = null, $didScore = 0){
        $this->betId = $betId;
        $this->playerId = $playerId;
        $this->didScore = $didScore;
    }

    public function fromArray(array $a){
        $this->id = $a["betSelectionid"];
        $this->betId = $a["betid"];
        $this->playerId = $a["playerid"];
        $this->didScore = $a["didScore"];
    }
}
?>
