<?php
include 'init.php';

$db = getDB();
$bf = new BetFactory($db);
$bet = new Bet($_POST['cust'],  $_POST['week']);
$bf->save($bet);

$p1 = new BetSelection($bet->id, $_POST['p1'], 0);
$bf->saveSelection($bet, $p1);

$p2 = new BetSelection($bet->id, $_POST['p2'], 0);
$bf->saveSelection($bet, $p2);

$p3 = new BetSelection($bet->id, $_POST['p3'], 0);
$bf->saveSelection($bet, $p3);

$p4 = new BetSelection($bet->id, $_POST['p4'], 0);
$bf->saveSelection($bet, $p4);

$p5 = new BetSelection($bet->id, $_POST['p5'], 0);
$bf->saveSelection($bet, $p1);

$p6 = new BetSelection($bet->id, $_POST['p6'], 0);
$bf->saveSelection($bet, $p6);


header('Location: /index.php');

// echo "User " . $_POST['cust'] . " selected the following players: <br><br>"  ;
// echo "p1 id = " . $_POST['p1'] . "<br>";
// echo "p2 id = " . $_POST['p2'] . "<br>";
// echo "p3 id = " . $_POST['p3'] . "<br>";
// echo "p4 id = " . $_POST['p4'] . "<br>";
// echo "p5 id = " . $_POST['p5'] . "<br>";
// echo "p6 id = " . $_POST['p6'] . "<br>";
// echo "<br>For week: " . $_POST['week']  ;
 ?>
