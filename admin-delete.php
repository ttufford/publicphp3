<?php
session_start();
require 'dbconnect.php';
$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
$_SESSION['success'] = "Word has been deleted";
header("Location: admin-index.php");

?>