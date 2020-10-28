<?php
session_start();
require 'dbconnect.php';
$collection = $manager->mydb->newusers;
$collection->deleteOne(['_id' => ($_GET['id'])]);
$_SESSION['success'] = "Word has been deleted";


?>