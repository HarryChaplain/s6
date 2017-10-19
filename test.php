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
    <!-- <script src="vendor/msdropdown/jquery.dd.min.js" type="text/javascript"></script> -->

    <script type="text/javascript" src="image-picker/image-picker.min.js"></script>
    <link href="image-picker/image-picker.css" rel="stylesheet"/>

    </script>
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

    <!-- Page Content -->
    <div class="container">

      <?php

      include 'init.php';

      echo "<h3> Welcome ". $_SESSION['username'] . "</h3>";

      $db = getDB();
      $cf = new CustomerFactory($db);

      $pf = new PlayerFactory($db);
      $players = $pf->getAll();
      // $cf->save($customer);
      //
      // $customer->username = "Barry";
      // $pf->save($customer);

       ?>
       <?php
          //  if (isset($_SESSION['username'])){
              ?>
                <br>

                <h4>Place a Bets:</h4>
                <form action="/logic/placeTest.php" method="post">
                 <p>For what Week?</p>
                 <select name="week" required>
                    <option selected="selected" value="">Choose one</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                 <br><br>

                 <p>Select 6 players</p>
                  <select multiple="multiple" id="selector" data-limit="6" class="image-picker show-labels show-html" name="playerid[]">

                   <?php
                     foreach ($players as $p){
                   ?>
                     <option value="<?php echo $p->id; ?>"  data-img-src="playerHeadshots/<?php echo $p->name; ?>.png" ><?php echo $p->name; ?></option>
                   <?php
                     }
                   ?>
                 </select>


                <input class="btn btn-primary" type="submit" name="" value="Place Bet">
              </form>
              <br><hr>


              </div>

        <?php
          //  }else {
          //    echo "<br><h3> Please sign in to place a bet.</h3>";
          //  }
         ?>

       <script language="javascript">
         $(document).ready(function(e) {
           try {

                      $("#selector").imagepicker({
                        show_label: true
                      });
           } catch(e) {
             alert(e.message);
           }
         });

       </script>


  </div>


    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

  </body><br>

</html>
