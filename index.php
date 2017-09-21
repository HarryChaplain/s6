<?php

spl_autoload_register(function ($class) {
  include 'classes/' . $class . '.php';
});
function getDB(){
    $host = '127.0.0.1';
    $db   = 's6';
    $user = 'user';
    $pass = 'password';

    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    return $pdo;
}

function render($view, $params = []){
    extract($params);
    include __DIR__."/". $view.'.php';
}

render('page', [
    'page' => $page
]);
?>
