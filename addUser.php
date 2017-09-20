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
    $username = $_POST['username'];
    $customer = new Customer($username);
    $cf->save($customer);

     ?>
    <h1>New user added</h1>
    <a href="index.php">Home</a>
  </body>
</html>
