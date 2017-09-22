<?php

//var_dump($_POST); #information from <form action="register.php" method="post">

include 'init.php';

$cm = new CustomerFactory(getDB());
$nu = new Customer(
    $_POST['newUsername'],
    $_POST['newDOB'],
    $_POST['newPassword']
);

if ($cm->byUsername($nu->username)) {
    echo "<h3>username already in use</h3>";
} else {
    if ($nu->isOldEnough($nu->dob)) {

        if ($nu->validPassword($_POST['newPassword2'])) {
            $cm->save($nu);
            header('Location: /index.php');
        } else {
            echo "<h3>Password not valid</h3>";
        }

    } else {
        echo "<h3>Not old enough</h3>";
    }
}



?>
