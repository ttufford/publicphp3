<?php
//connect to db
require 'dbconnect.php';
//create and declare counter table
$collection = $manager->mydb->counter;
//select all* from counter
//$options=[];	  
$counter = $collection->find([]);




//
if (empty($counter)){
	$counter = 1;
	//$insert = mysql_query("INSERT INTO counter VALUES('$counter')");
	
	   $insert = $collection->insertOne([
		'counter' => "$counter"]);
	
}

//
$add = $counter+1;
//$insertNew = mysql_query("UPDATE counter SET counter='$add'");

	   $insertNew = $collection->updateOne([
		//'counter' => ($_GET["$add"])]);
		
		//'counter' => "$add"]);
		
		//'$set' => ['SubmittedBy' => $_POST['SubmittedBy']
		'$set' => ['counter' => "44"]]);
		//]]);

		
		
//deleted
//echo "$counter";

foreach($insertNew as $doc){
	echo $doc->counter;
}

   $collection->updateOne(
       ['_id' => ($_GET['id'])],	   
	   ['$set' => ['counter' => $_POST["$add"]
	   ]]
	   
   );



$collection->updateOne(
    ['state' => 'ny'],
    ['$set' => ['counter' => 'add']]
);
