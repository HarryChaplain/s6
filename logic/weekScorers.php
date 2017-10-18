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
             $rf = new ResultFactory($db);
             $playerArray = [];
             $week = $_POST['week'];

             if (count($_POST['playerid']) <=0) {
               echo "<br><br><h3>You need to select some players</h3>";
             }else {
               foreach ($_POST['playerid'] as $p) {
                 $rf->setScorer($_POST['week'],  $p);
               }
                echo "<h3>Scorers saved for week $week </h3>";
             }


             echo "<br><a class='btn btn-primary' href='../admin.php'>Back</a>  ";
             echo "<a class='btn btn-primary' href='../index.php'>Home</a>";
            ?>


         </div>

       </div>

     </div>

   </body>
 </html>
