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
          player.playerid as playerid,
          player.name,
          betSelection.didScore,
          bet.betid,
          bet.datePlaced,
          betSelection.betSelectionid as betSelectionid,
          bet.customerid as customerid,
          bet.betWeekid
        from bet
        join betSelection on (betSelection.betid = bet.betid)
        join player on (player.playerid = betSelection.playerid)
        where customerid = :id;
        ");

        $r->execute(['id' => $custid]);

        $bets = [];
        foreach ($r as $row){

            $p = new Player();
            $p->fromArray($row);

            $bs = new BetSelection();
            $bs->fromArray($row);
            $bs->player = $p;

            if (!isset($bets[$row['betid']])){
              $bets[$row['betid']] = new Bet();
              $bets[$row['betid']]->fromArray($row);
            }
            $bets[$row['betid']]->selections[] = $bs;
        }


        return $bets;
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
