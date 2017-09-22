<?php
    include 'init.php';

    $db = getDB();
    $cf = new CustomerFactory($db);
    $username = $_POST['username'];
    $customer = new Customer($username);
    $cf->save($customer);
    header('Location: /index.php');
    
?>
