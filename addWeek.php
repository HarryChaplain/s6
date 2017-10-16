<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Bet Week</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">

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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li class="nav-item active" >
              <a class="nav-link" href=<?php echo "getBet.php?id=" . $_SESSION['id'];  ?>>My Bets</a>
            </li>
          </li>
          <?php
      				if (isset($_SESSION['username'])){
      					include('includes/session-logout.inc.php');
      				}else {
      					include('includes/session-login.inc.php');
      				}
      			?>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-10">
          <?php

              include 'init.php';

              $db = getDB();
              
           ?>

        </div>

      </div>

    </div>

  </body>
</html>
