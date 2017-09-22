<?php
    include 'init.php';

    $db = getDB();
    $cf = new CustomerFactory($db);

    $nuUsername = $_POST['newUsername'];
    $nuPassword = $_POST['newPassword'];
    $nuPassword2 = $_POST['newPassword2'];
    $nuDOB = $_POST['newDOB'];
    
    $username = $_POST['username'];
    $pass = $_POST['password'];
    
    
    $customer = new Customer($username);
    $cf->save($customer);
    header('Location: /index.php');
    
?>
