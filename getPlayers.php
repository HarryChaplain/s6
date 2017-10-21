<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Striker</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/dd.css" />

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/msdropdown/jquery.dd.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="image-picker/image-picker.min.js"></script>
    <link href="image-picker/image-picker.css" rel="stylesheet"/>
    <style media="screen">
    .vertical-center {
      align-items: center;
      display: flex;
      min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 100vh;
}
    </style>
  </head>
   <body>

    <!-- Navigation -->
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <a class="nav-link" href=<?php echo "getBet.php?id=" . $_SESSION['id'];  ?>>My Bets</a>
            </li>
          </li>
            <a class="nav-link" href="getPlayers.php">All Players</a>
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

     <div class="container" align="center">

           <?php

             include 'init.php';

             $db = getDB();
             $pf = new PlayerFactory($db);
             $playerArray = [];
             $week = $_GET['week'];

             echo "<h2>List of All Players</h2>";
             echo "<div class=\"grid\">";

             $players = $pf->getAll();

             if (count($players) <=0) {

               echo "<h3>No players</h3>";
             }else {
               foreach ($players as $p) {

                 echo "<div class=\"item\">";
                 echo "<div> <h4>" . $p->name . "</h4></div>";
                 echo "<div><img src='playerHeadshots/". $p->name.".png' width='250px' hieght='250px'> </div>";
                 echo "</div>";
               }
             }
             echo "</div>";
            ?>
         </div>


    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


   </body>
 </html>
