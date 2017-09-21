<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'init.php';

    $db = getDB();
    $cf = new CustomerFactory($db);

    $nuUsername = $_POST['newUsername'];
    $nuPassword = $_POST['newPassword'];
    $nuPassword2 = $_POST['newPassword2'];
    $nuDOB = $_POST['newDOB'];
    
    $username = $_POST['username'];
    $pass = $_POST['password'];
    
    
    $customer = new Customer($username);
    $cf->save($customer);

     ?>
    <h1>New user added</h1>
    <a href="index.php">Home</a>
  </body>
</html>
