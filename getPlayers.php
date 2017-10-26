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
    <link href="css/players.css" rel="stylesheet">

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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
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

    <div align="center">
     <div class="container"  align="center">
       <div class="">




        <?php
          include 'init.php';

          $db = getDB();
          $pf = new PlayerFactory($db);
          $playerArray = [];
          $week = $_GET['week'];

          echo "<h2>List of All Players</h2>";
          echo "<div class='vertical-center'>";
          echo "<div class=\"grid\" >";

          $players = $pf->getAll();

          if (count($players) <=0) {
            echo "<h3>No players</h3>";
          }else {
            echo "<div class='row vertical-center'>";
            shuffle($players);
            foreach ($players as $p) {
            //  echo "<li class='thumbnail col-sm-3 col-xs-6'>";
            //  echo "<img src='playerHeadshots/". $p->name.".png'>";
            //  echo "</li>";
            ?>
            <div class="item vertical-align" align="center">

              <!-- "<a href='#lookman' data-toggle='modal' class='btn btn-primary' role='button'>Read More</a> "; -->

              <a href='#player-<?php echo $p->id ?>' data-toggle='modal'>
                <img src='playerHeadshots/<?php echo $p->name ?>.png' width="100px" height="100px" >

              </a>
              <h3><?php echo $p->name ?></h3>
        <div id="player-<?php echo $p->id ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-header">
            <!-- <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button> -->
            <h4> <?php echo $p->name ?>  Player Profile</h4>
          </div>
          <div class="modal-body">
            <img src="playerHeadshots/<?php echo $p->name ?>.png" alt="<?php echo $p->name ?>" class="img-responsive pull-left">
            <p>
            <?php echo $p->name ?> is a Premier League footballer who loves football.
            </p>
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="https://en.wikipedia.org/wiki/<?php echo $p->name ?>" target="_blank">Read More</a> <br/>
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
        </div>
      <?php
            }
            echo "</div>";
            echo "</div>";// end of row
          }
          echo "</div>";
        ?>
      </div>

      </div>
         </div>



    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


   </body>
 </html>
