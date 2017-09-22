<?php
    #register with username, password and DOB
    
    function register($nuUsername, $nuPassword, $nuPassword2, $nuDOB) {
        $usernames = $this->db->prepare("select username from customer where username = ?");
        $usernames->execute(array($nuUsername));
    
        if (!isset($usernames[$nuUsername])){
            #username already in use message
        } else {
            #oldEnough($nuDOB);
            #checkPassword($nuPassword, $nuPassword2);
            save($nuUsername);
        }
    }
    
    /* function oldEnough($nuDOB, $nuPassword) {
        date_default_timezone_set('Europe/London');
        $required_year = date('Y', time()) - 18;
        $youngest_age = strtotime( $required_year."-".date('m', time())."-".date('d', time()) );
        $dob = strtotime($nuDOB);
        if ($dob <=  $youngest_age) {
            passwordValid($nuPassword);
            
        } else {
            accessdenied();
        }
    }
    
    function passwordValid($nuPassword, $nuPassword2) {
        
        if (strcmp($nuPassword, $nuPassword2) != 0){
            #header("Refresh:0; url=registration.php");
        } else {
            echo "passwords do not match";
        }
        
        if (str_len($nuPassword) < 10) {
            #password
        } else {
            #password not long enough
        }
        
        $acceptedSpecial = "^%$#().";
        $passArr = array();
        $specArr = array();
        
        for ($i=0; $i < strlen($nuPassword)-1; $i++) {
            $passArr[$i] = substr($nuPassword, $i,$i+1);
        } #for every password char and special char
        
        for ($i=0; $i < strlen($acceptedSpecial)-1; $i++) {
            $acceptedSpecial[$i] = substr($acceptedSpecial, $i,$i+1);
        }
    
        for ($j=0; $j < strlen($acceptedSpecial); $j++) {
            if (!strcmp($passArr[$i], $specArr[$j])){
                #password contains invalid chars header("Refresh:0; url=mini_project.php");
            }
        }
    
        $nuPassword = password_hash($nuPassword, PASSWORD_DEFAULT);
            return $nuPassword;
    
    }
    */
    
    function login($username) {
        $usernames = $this->db->prepare('select username from customer where username = ?');
        $usernames->execute(array($username));
        if (isset($usernames)){
            #username valid
            #checkPasswordLogin($pass);
        } else {
            #username not found message - clear input boxes
        }
    }
    
    #when logging in, check password matches that of db, which is hashed
    /*
    function checkPasswordLogin($pass) {
        $usersPass = $this->db->prepare('select password from customer where username = ?');
        $usernames->execute(array($username));
    
        return password_verify($pass, $this->password);
    }
    */

?>