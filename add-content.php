<?php
//include libraries
require __DIR__ . '/vendor/autoload.php';

//db connection
require 'dbconnect.php';


//extract what was sent to the server
$SubmittedBy= filter_input(INPUT_POST, 'SubmittedBy', FILTER_SANITIZE_STRING);
$Word= filter_input(INPUT_POST, 'Word', FILTER_SANITIZE_STRING);
$Definition= filter_input(INPUT_POST, 'Definition', FILTER_SANITIZE_STRING);
$PublicationName= filter_input(INPUT_POST, 'PublicationName', FILTER_SANITIZE_STRING);
$NISTSourcesName= filter_input(INPUT_POST, 'NISTSourcesName', FILTER_SANITIZE_STRING);
$ArticleName= filter_input(INPUT_POST, 'ArticleName', FILTER_SANITIZE_STRING);
$Website= filter_input(INPUT_POST, 'Website', FILTER_SANITIZE_STRING);
$Author= filter_input(INPUT_POST, 'Author', FILTER_SANITIZE_STRING);
$Date= filter_input(INPUT_POST, 'Date', FILTER_SANITIZE_STRING);
$Link= filter_input(INPUT_POST, 'Link', FILTER_SANITIZE_STRING);
$VideoLink= filter_input(INPUT_POST, 'VideoLink', FILTER_SANITIZE_STRING);

//$myId = random_int(0,80005);
$myId = uniqid();

//convert to an array in php
$submission = [
"_id" => "$myId",
"SubmittedBy" => "$SubmittedBy",
"Word" => "$Word",
"Definition" => "$Definition",
"PublicationName" => "$PublicationName",
"NISTSourcesName" => "$NISTSourcesName",
"ArticleName" => "$ArticleName",
"Website" => "$Website",
"Author" => "$Author",
"Date" => "$Date",
"Link" => "$Link",
"VideoLink" => "$VideoLink"
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