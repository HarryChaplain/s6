<?php

$cm = new CustomerFactory(getDB());
$user = new Customer(
    $_POST['username'],
    $_POST['password']
);
    
    if (!$cm->byUsername($username, $password)) {
        echo "username not found, maybe register \n \n";
    } else {
        if ($user->checkLogin($_POST['username'], $_POST['password' ])) {
                echo "password looks good \n";
                var_dump ($nu);
            } else {
                echo "password incorrect \n";
            }
    }
    
    function login($username) {
        $usernames = $this->db->prepare('select username from customer where username = ?');
        $usernames->execute(array($username));
        if (isset($usernames)){
            #checkPasswordLogin($pass);
        } else {
            #username not found message - clear input boxes
        }
    }

?>
