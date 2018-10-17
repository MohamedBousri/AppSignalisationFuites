<?php 

$id=$_POST['a'];
require_once __DIR__.'/db_config.php';
echo $id;
$bdd = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);

$bdd->exec('UPDATE assignissment SET status = 1 where id='.$id);

?>