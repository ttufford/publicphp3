<?php
require 'dbconnect.php';
$collection = $manager->mydb->newusers;

if(isset($_POST['submit'])){
if(!empty($_POST['FlashcardWords'])) {
echo "<span>You have selected :</span><br/>";
$d = array();

// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['FlashcardWords'] as $select)
{
    $d[] = $select;

}


}}
$json = json_encode($d);
$json2 = json_decode($json);

print_r($json2);

// $collection->insertOne([
 
//     'email' => $_POST['username'],
//     'password' => md5($_POST['password']),
//     'verification key' => $vdkey

// ]);
?>