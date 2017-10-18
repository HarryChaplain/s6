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

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">

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

          </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <h3>Admin Page</h3>
      <?php

      include 'init.php';

      $db = getDB();
      $cf = new CustomerFactory($db);

      $pf = new PlayerFactory($db);
      $players = $pf->getAll();
      // $cf->save($customer);
      //
      // $customer->username = "Barry";
      // $pf->save($customer);

       ?>
       <br><br>
       <h5>Set Strikers who Scored by Week:</h5>
      <form class="" action="/logic/weekScorers.php" method="post">
        <p>For what Week?</p>
        <select class="form-control" name="week" required>
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
        <br>

         <?php
           foreach ($players as $p){
         ?>
           <input type="checkbox" name="playerid[]" value="<?php echo $p->id; ?>"><?php echo $p->name; ?><br>
         <?php
           }
         ?>
         <br>
        <input class="btn btn-primary" type="submit" name="" value="Set scores">
      </form>
  </div>


    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
