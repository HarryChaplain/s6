<?php

class Customer {
    public $id;
    public $username;
    public $dob;
    public $password;

    public function __construct($username = null, $dob = null, $password= null){
        $this->username = $username;
        $this->dob = $dob;
        $this->password = $password;
    }

    public function fromArray(array $a){
        $this->id = $a["customerid"];
        $this->username  = $a["username"];
        $this->password = $a["password"];
        $this->dob = $a["dob"];

    }

    public function isOldEnough() {
        date_default_timezone_set('Europe/London');
        $required_year = date('Y', time()) - 18;
        $youngest_age = strtotime( $required_year."-".date('m', time())."-".date('d', time()) );
        $dob = strtotime($this->dob);

        if ($dob <=  $youngest_age) {
            return True;
        } else {
            return False;
        }
    }

    function validPassword($repeatedPass) {
        
        #passwords must match
        if ($this->password != $repeatedPass){
            echo "passwords do not match".PHP_EOL;
            return False;
        }
        
        #passwords must be greater than 10 characters long
        if (strlen($this->password) >= 10) {
            #password
        } else {
            echo "password not long enough".PHP_EOL;
            return False;
        }
    
        $this->password = password_hash($password, PASSWORD_DEFAULT);
            return True;
    }
}
?>
