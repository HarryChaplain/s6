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
          $playerArray = $_POST['playerid'];
          $bet = new Bet($_SESSION['id'],  $_POST['week']);
          $bf->save($bet);

          var_dump($_POST['playerid']);

          if (count($playerArray) !== count(array_unique($playerArray))) {
              echo "<h3>You cant select the same player more than once</h3><br>";
              echo "<a class='btn btn-primary' href='../index.php'>Back</a>";
          }else {
            foreach ($playerArray as $player) {
              $bs = new BetSelection($bet->id, $player, 0);
              $bf->saveSelection($bet, $bs);
            }


            echo "<h3>Bet Saved</h3><br>";
            echo "<a class='btn btn-primary' href='../index.php'>Back</a>";

         }



           ?>

        </div>

      </div>

    </div>

  </body>
</html>
