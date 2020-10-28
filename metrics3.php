<?php
//connect to db
require 'dbconnect.php';
$collection = $manager->mydb->counter;
//[ 'counter' => '0' ],
//$counter = $collection->find([]);


$counter = $collection->find( ['id' => '234'] );
if (empty($counter)){
	$counter = 1;
	//$insert = mysql_query("INSERT INTO counter VALUES('$counter')");
	
	   $insert = $collection->insertOne([
		'counter' => "$counter"]);
	
}









$add = $counter + 1;

$updateResult = $collection->updateOne(

    ['id' => '234'],
	[ '$set' => [ 'counter' => $add ]]
);



$updateResult = $collection->updateOne(
[ 'movie_name' => 'God Father' ],
[ '$set' => [ 'genre' => 'suspense' ]]
);

?>

		
		
//deleted
//echo "$counter";


37
56
131

sec = 92. 230. 236

