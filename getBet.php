<?php

    include 'init.php';

    $db = getDB();
    $bf = new BetFactory($db);
    $id = $_GET['id'];

    //echo "<h3> Customer $id has selected these players: </h3>";
    $bets = $bf->byCustId($id);
    //
    foreach ($bets as $b) {

      echo "<h3> Bet ID: ".$b->id ."</h3>";
      echo "<p> Placed on: ".$b->datePlaced ." for bet week $b->betWeekId</p>";
      echo "<h3> Selections: </h3>";
      foreach ($b->selections as $bs) {
        echo "<p>" . $bs->player->name ;
        if ($bs->player->didScore == 0) {
          echo " has not score";
        }elseif ($bs->player->didScore == 1) {
          echo "has scored";
        }


        echo "</p>";
      }
      echo "<br>";
    }

    if (!$bets) {
      echo "<h3> You have not placed any bets";
    }

    //var_dump($bets);
 ?>
