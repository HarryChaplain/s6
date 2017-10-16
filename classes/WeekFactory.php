<?php
class WeekFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }


    public function save(BetWeek $bw){

        $stmt = $this->db->prepare("
            insert into player (startDate, endDate)
            values(:lastname, :firstname)
        ");

        $r = $stmt->execute([
            'start'  => $bw->start,
            'finish'  => $bw->finish
        ]);
        $bw->id = $this->db->lastInsertId();
    }






}

 ?>
