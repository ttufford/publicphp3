<?php
require_once __DIR__ . "/vendor/autoload.php";


//$collection = (new MongoDB\Client)->hddatabase->books;

//db connection
$manager = new MongoDB\Client(
  'mongodb+srv://<username>:<pass>@cluster0-s8mjc.azure.mongodb.net/mydb?retryWrites=true&w=majority');

//select db
$db = $manager->mydb;

$collection = $manager->mydb->users


?>