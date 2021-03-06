<?php session_start() ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Set Scorer</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <!-- Bootstrap core CSS -->
     <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="../css/logo-nav.css" rel="stylesheet">
     <style media="screen">
       .grid{
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
       }
       .item{
         padding: 25px;
       }
     </style>

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

             echo "<h2>List of all players that scored in week $week</h2><br>";
             echo "<div class=\"grid\">";

             $playerArray = $pf->getAllScorers($week);

             if (count($playerArray) <=0) {

               echo "<br><br><h3>This game week has not happened yet or no one has scored in this week</h3>";
             }else {
               foreach ($playerArray as $id) {
                 $player = $pf->getById($id);
                 echo "<div class=\"item\">";
                 echo "<h4>" . $player . "</h4>";
                 echo "<img src='playerHeadshots/". $player.".png' width='250px' hieght='250px'>  <br>";
                 echo "</div>";
               }
             }
             echo "</div>";
            ?>

     </div>

   </body>
 </html>
