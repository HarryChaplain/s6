<?php
class BetFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function delete(Bet $b){
        $stmt = $this->db->prepare("
            delete from bet where betid = :id
        ");

        return $stmt->execute([
            'id' => $b->id,
        ]);
    }

    public function deleteById($id){
        $stmt = $this->db->prepare("
            delete from bet where betid = :id
        ");

        return $stmt->execute([
            'id' => $id,
        ]);
    }

    public function save(Bet $b){
        if (isset($b->id)){
            return $this->update($b);
        }

        $stmt = $this->db->prepare("
            insert into bet (customerid, betWeekid, datePlaced)
            values(:customerid, :betWeekid, :datePlaced)
        ");

        $r = $stmt->execute([
            'customerid'  => $b->customerId,
            'betWeekid'  => $b->betWeekId,
            'datePlaced'  => $b->datePlaced
        ]);
        $b->id = $this->db->lastInsertId();



    }

    public function saveSelection(Bet $b, BetSelection $bs){
      $stmt = $this->db->prepare("
          insert into betSelection (betid, playerid, didScore)
          values(:betid, :playerid, :didScore)
      ");
      $r = $stmt->execute([
          'betid'  => $bs->betId,
          'playerid'  => $bs->playerId,
          'didScore'  => $bs->didScore
      ]);
    }


    public function byId($id){
        $r = $this->db->prepare(
            "select * from bet where betid = :id"
        );

        $r->execute(['id' => $id]);

        $bets = [];
        foreach ($r as $row){
            $b = new Bet();
            $b->fromArray($row);
            $bets[] = $b;
        }

        return $bets;
    }

    public function byCustId($custid){
        $r = $this->db->prepare("
            select
              player.name
            from bet
            join betSelection on (betSelection.betid = bet.betid)
            join player on (player.playerid = betSelection.playerid)
            where customerid = :id;
        ");

        $r->execute(['id' => $custid]);

        $players = [];
        foreach ($r as $row){
            $b = new Player();
            $b->fromArray($row);
            $players[] = $b;
        }

        return $players;
    }

    public function getAll(){
        $r = $this->db->query(
            "select * from bet"
        );

        $bets = [];
        foreach ($r as $row){
            $b = new Bet();
            $b->fromArray($row);
            $bets[] = $b;
        }

        return $bets;
    }
}

 ?>
