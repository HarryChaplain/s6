<?php
class PlayerFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function delete(Player $p){
        $stmt = $this->db->prepare("
            delete from player where playerid = :id
        ");

        return $stmt->execute([
            'id' => $c->id,
        ]);
    }

    public function deleteById($id){
        $stmt = $this->db->prepare("
            delete from player where playerid = :id
        ");

        return $stmt->execute([
            'id' => $id,
        ]);
    }

    public function save(Player $p){
        if (isset($p->id)){
            return $this->update($o);
        }

        $stmt = $this->db->prepare("
            insert into player (lastname, firstname, club)
            values(:lastname, :firstname, :club)
        ");

        $r = $stmt->execute([
            'lastname'  => $p->lastname,
            'firstname'  => $p->firstname,
            'club'  => $p->club
        ]);
        $p->id = $this->db->lastInsertId();
    }

    public function update(Player $p){
        $stmt = $this->db->prepare("
            update player set
                lastname = :lastname
            where playerid = :id
        ");
        return $stmt->execute([
            'lastname'  => $c->lastname,
            'id'    => $c->id
        ]);
    }

    public function byName($name){
        $r = $this->db->prepare(
            "select playerid, lastname from player where lastname = :lastname"
        );

        $r->execute(['lastname' => $lastname]);

        $customers = [];
        foreach ($r as $row){
            $p = new Player();
            $p->fromArray($row);
            $player[] = $p;
        }

        return $players;
    }

    public function getAll(){
        $r = $this->db->query(
            "select playerid, name from player"
        );

        $players = [];
        foreach ($r as $row){
            $p = new Player();
            $p->fromArray($row);
            $players[] = $p;
        }

        return $players;
    }
}

 ?>
