<?php
require_once __DIR__ . "/vendor/autoload.php";

//db connection
$manager = new MongoDB\Client(
  'mongodb://phpsalt:L3IHhZLLvYiNQbOXDgAbGSsA1pTctCZtMW0bjNIcepeZ8kaSZkAS4dCqy467xCnxog15I2RHbFC2vrrdClBqWg==@phpsalt.mongo.cosmos.azure.com:10255/?ssl=true&replicaSet=globaldb&retrywrites=false&maxIdleTimeMS=120000&appName=@phpsalt@');

//select db
$db = $manager->mydb;

$collection = $manager->mydb->words;


?>