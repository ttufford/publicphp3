<?php
//include libraries
require __DIR__ . '/vendor/autoload.php';

//db connection
require 'dbconnect.php';


//extract what was sent to the server
$myName= filter_input(INPUT_POST, 'myName', FILTER_SANITIZE_STRING);
$category= filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
$myWord= filter_input(INPUT_POST, 'myWord', FILTER_SANITIZE_STRING);
$myDefinition= filter_input(INPUT_POST, 'myDefinition', FILTER_SANITIZE_STRING);
$mySource= filter_input(INPUT_POST, 'mySource', FILTER_SANITIZE_STRING);
$referenceMaterials= filter_input(INPUT_POST, 'referenceMaterials', FILTER_SANITIZE_STRING);

//$myId = random_int(0,80005);
$myId = uniqid();

//convert to an array in php
$submission = [
"_id" => "$myId",
"myName" => "$myName",
"category" => "$category",
"myWord" => "$myWord",
"myDefinition" => "$myDefinition",
"mySource" => "$mySource",
"referenceMaterials" => "$referenceMaterials"
];

//add to db
$add2 = $collection->insertOne($submission);

//echo the result at the end
if($add2->getInsertedCount()==1){
			echo 'Success! ';
			//echo 'New document id: ' . $add2->getInsertedId();
		}
		else {
			echo 'error adding customer';
		}