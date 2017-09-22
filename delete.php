<?php

    include 'init.php';

    $db = getDB();
    $cf = new CustomerFactory($db);
    $id = $_GET['id'];

    $cf->deleteById($id);
    
    header('Location: /index.php');
     ?>
