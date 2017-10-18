<?php
class ResultFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function setScorer($week, $player){
      $stmt = $this->db->prepare("
          insert into playerWeek (playerid, weekid, didScore)
          values(:playerid, :weekid, :didScore)
      ");

      $r = $stmt->execute([
          'weekid'  => $week,
          'playerid'  => $player,
          'didScore' => 1
      ]);

        $stmt = $this->db->prepare("
            update betSelection
            set didScore = 1 where betWeekid = :weekid AND playerid = :playerid
        ");

        $r = $stmt->execute([
            'weekid'  => $week,
            'playerid'  => $player
        ]);


    }

}

 ?>
