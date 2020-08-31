<?php
require_once __DIR__ . "/vendor/autoload.php";

//db connection
$manager = new MongoDB\Client(
  'mongodb+srv://<name>:<Pass>@cluster0-s8mjc.azure.mongodb.net/mydb?retryWrites=true&w=majority');

//select db
$db = $manager->mydb;

$collection = $manager->mydb->words;


?>