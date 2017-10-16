<?php

include '../init.php';

$cm = new CustomerFactory(getDB());
$user = new Customer(
    $_POST['username'],
    $_POST['password']
);

    if (!$cm->byUsername($_POST['username'])) {
        echo "username not found, maybe register \n \n";
    } else {
        if ($cm->checkLogin($_POST['username'], $_POST['password'])) {
                $currentUser = $cm->byUsername($_POST['username'])[0];
                session_start();
                $_SESSION["id"] = $currentUser->id;
                $_SESSION["username"] = $currentUser->username;
                $_SESSION["dob"] = $currentUser->dob;

                header('Location: ../index.php');
              //  var_dump ($nu);
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
