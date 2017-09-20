<?php

include 'CustomerClass.php';
include 'CustomerFactory.php';

function getDB(){
    $host = '127.0.0.1';
    $db   = 's6';
    $user = 'user';
    $pass = 'password';

    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    return $pdo;
}

$db = getDB();

$cf = new CustomerFactory($db);

$customer = new Customer("Fred");
$cf->delete($customer);
// $cf->save($customer);

// $customer->username = "Barry";
// $pf->save($customer);

 // $customers = $cf->byUsername("Brown");

// foreach ($customers as $cust){
//     echo $cust->username . " has an ID of: " . $cust->id.PHP_EOL;
    //$cf->delete($cust);
// }



 ?>
