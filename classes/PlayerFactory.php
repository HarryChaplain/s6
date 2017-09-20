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
            insert into player (name)
            values(:name)
        ");

        $r = $stmt->execute([
            'name'  => $p->name
        ]);
        $p->id = $this->db->lastInsertId();
    }

    public function update(Player $p){
        $stmt = $this->db->prepare("
            update player set
                name = :name
            where playerid = :id
        ");
        return $stmt->execute([
            'name'  => $c->name,
            'id'    => $c->id
        ]);
    }

    public function byName($name){
        $r = $this->db->prepare(
            "select playerid, name from player where name = :name"
        );

        $r->execute(['name' => $name]);

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
