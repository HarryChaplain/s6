<?php

    include 'init.php';

    $db = getDB();
    $bf = new BetFactory($db);
    $id = $_GET['id'];

    echo "<h3> Customer $id has selected these players: </h3>";
    $players = $bf->byCustId($id);

    foreach ($players as $p) {
      echo "<p>".$p->name ."</p>";
    }
 ?>
