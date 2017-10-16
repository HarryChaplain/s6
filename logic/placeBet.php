<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Place Bet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/logo-nav.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <h3>Super Striker</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-10">

          <?php
          include '../init.php';

          $db = getDB();
          $bf = new BetFactory($db);
          $playerArray = [];
          $bet = new Bet($_SESSION['id'],  $_POST['week']);
          $bf->save($bet);
          array_push($playerArray, $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['p6']);
          if (count($playerArray) !== count(array_unique($playerArray))) {
              echo "<h3>You cant select the same player more than once</h3><br>";
              echo "<a class='btn btn-primary' href='../index.php'>Back</a>";
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


            echo "<h3>Bet Saved</h3><br>";
            echo "<a class='btn btn-primary' href='../index.php'>Back</a>";

          }



           ?>

        </div>

      </div>

    </div>

  </body>
</html>
