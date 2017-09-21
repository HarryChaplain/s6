<pre>

<?php

var_dump($_POST); #information from <form action="register.php" method="post">

include 'init.php';

$cm = new CustomerFactory(getDB());
$nu = new Customer(
    $_POST['newUsername'],
    $_POST['newDOB'],
    $_POST['newPassword']
);

if ($cm->byUsername($nu->username)) {
    echo "username already in use";
} else {
    if ($nu->isOldEnough($nu->dob)) {
        echo "is old enough \n";
        
        if ($nu->validPassword($_POST['newPassword2'])) {
            echo "password good - saving \n";
            var_dump ($nu);
            $cm->save($nu);
        } else {
            echo "password fail \n";
        }

    } else {
        echo "age fail \n";
    }
}



?>