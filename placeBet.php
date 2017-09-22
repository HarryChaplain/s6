<?php
include 'init.php';

$db = getDB();
$bf = new BetFactory($db);
$playerArray = [];
$bet = new Bet($_POST['cust'],  $_POST['week']);
$bf->save($bet);
array_push($playerArray, $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['p6']);
if (count($playerArray) !== count(array_unique($playerArray))) {
    echo "<h3>You cant select the same player more than once</h3>";
}else {
  $p1 = new BetSelection($bet->id, $_POST['p1'], 0);
  $bf->saveSelection($bet, $p1);

  $p2 = new BetSelection($bet->id, $_POST['p2'], 0);
  $bf->saveSelection($bet, $p2);

  $p3 = new BetSelection($bet->id, $_POST['p3'], 0);
  $bf->saveSelection($bet, $p3);

  $p4 = new BetSelection($bet->id, $_POST['p4'], 0);
  $bf->saveSelection($bet, $p4);

  $p5 = new BetSelection($bet->id, $_POST['p5'], 0);
  $bf->saveSelection($bet, $p5);

  $p6 = new BetSelection($bet->id, $_POST['p6'], 0);
  $bf->saveSelection($bet, $p6);


  echo "<h3>Bet Saved</h3>";
  echo "<a href='/index.php'>Home</a>";

}



 ?>
