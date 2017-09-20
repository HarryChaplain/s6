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
    $id = $_GET['id'];

    $cf->deleteById($id);
    echo "<h1>User $id deleted</h1>";

     ?>
     <a href="index.php">Home</a>
  </body>
</html>
