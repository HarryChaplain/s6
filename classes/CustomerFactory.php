<?php
class CustomerFactory {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }


    public function delete(Customer $c){
        $stmt = $this->db->prepare("
            delete from customer where customerid = :id
        ");

        return $stmt->execute([
            'id' => $c->id,
        ]);
    }

    public function deleteById($id){
        $stmt = $this->db->prepare("
            delete from customer where customerid = :id
        ");

        return $stmt->execute([
            'id' => $id,
        ]);
    }

    public function save(Customer $c){
        if (isset($c->id)){
            return $this->update($c);
        }

        $stmt = $this->db->prepare("
            insert into S6.customer (username, password, dob)
            values(:username, :password, :dob)
        ");

        $stmt->execute([
            'username'  => $c->username,
            'password'  => $c->password,
            'dob'  => $c->dob
        ]);
        $c->id = $this->db->lastInsertId();
    }

    public function checkLogin($username, $password){
        $r = $this->db->prepare(
            "select customerid, username, password from customer where username = :username"
        );

        $r->execute([
            'username' => $username
            ]);

          $hash = $r->fetch()['password'];

        #unhash password and check what the user typed is the same
        if (password_verify($password, $hash)){
            return True;
        }
        return False;
    }

    public function update(Customer $c){
        $stmt = $this->db->prepare("
            update customer set
                username = :username
            where customerid = :id
        ");
        return $stmt->execute([
            'username'  => $c->username,
            'id'    => $c->id
        ]);
    }

    public function byUsername($username){
        $r = $this->db->prepare(
            "select customerid, username, dob from customer where username = :username"
        );

        $r->execute(['username' => $username]);

        $customers = [];
        foreach ($r as $row){
            $c = new Customer();
            $c->fromArray($row);
            $customers[] = $c;
        }

        return $customers;
    }

    public function getAll(){
        $r = $this->db->query(
            "select customerid, username from customer"
        );

        $customers = [];
        foreach ($r as $row){
            $c = new Customer();
            $c->fromArray($row);
            $customers[] = $c;
        }

        return $customers;
    }
}

 ?>
