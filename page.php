<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test Customers</title>
  </head>
  <body>
    <h4>Customers:</h4>
    <?php

    //include 'init.php';

    $db = getDB();
    $cf = new CustomerFactory($db);

    $pf = new PlayerFactory($db);
    $players = $pf->getAll();
    // $cf->save($customer);
    //
    // $customer->username = "Barry";
    // $pf->save($customer);

    $customers = $cf->getAll();

    foreach ($customers as $cust){
        echo "<p>" .  $cust->username . " has an ID of: " . $cust->id.PHP_EOL  . "<a href='delete.php?id=" . $cust->id . "'>Delete</a>" . "<a>  </a>" . "<a href='getBet.php?id=" . $cust->id . "'>View Bet</a>". "</p>" ;
        //$cf->delete($cust);
    }


     ?>
     <div class="">
      <b>Add a new customer:</b>
     </div>
     <form action="addUser.php" method="post">
       <input type="text" name="username" value="">
       <input type="submit"/>
     </form>
     <br>
     <form action="register.php" method="post">
   <!--
   <input type="text" name="username" placeholder="username">
   <input type="text" name="password" placeholder="password">
   <input type="submit" name="login">
 -->
       <input type="text" name="newUsername" placeholder="new username">
       <input type="text" name="newPassword" placeholder="password">
       <input type="text" name="newPassword2" placeholder="repeat">
       <input type="text" name="newDOB" placeholder="dob">
       <input type="submit" name="register" value="register">
    </form>
    <br>

     <h4>Bets:</h4>
     <form action="placeBet.php" method="post">
       <p>What customer are you?</p>
       <select name="cust">
          <option selected="selected">Choose one</option>
        <?php
          foreach ($customers as $c){
        ?>
          <option value="<?php echo $c->id; ?>"><?php echo $c->username; ?></option>
        <?php
          }
        ?>
      </select>
      <br>
      <p>For what Week?</p>
      <select name="week">
         <option selected="selected">Choose one</option>
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

      <p>Select 6 players</p>
       <select name="p1">
          <option selected="selected">Choose one</option>
        <?php
          foreach ($players as $p){
        ?>
          <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
        <?php
          }
        ?>
      </select>
      <select name="p2">
         <option selected="selected">Choose one</option>
       <?php
         foreach ($players as $p){
       ?>
         <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
       <?php
         }
       ?>
      </select>
      <select name="p3">
         <option selected="selected">Choose one</option>
       <?php
         foreach ($players as $p){
       ?>
         <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
       <?php
         }
       ?>
      </select>
      <select name="p4">
         <option selected="selected">Choose one</option>
       <?php
         foreach ($players as $p){
       ?>
         <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
       <?php
         }
       ?>
     </select>
     <select name="p5">
        <option selected="selected">Choose one</option>
      <?php
        foreach ($players as $p){
      ?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php
        }
      ?>
     </select>
     <select name="p6">
        <option selected="selected">Choose one</option>
      <?php
        foreach ($players as $p){
      ?>
        <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
      <?php
        }
      ?>
     </select>
     <input type="submit" name="" value="submit">
   </form>

  </body>
</html>
