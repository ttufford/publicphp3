<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'dbconnect.php';
$collection = $manager->mydb->counter;



//if (isset($_GET['ID'])) {

//$ID = $_GET['ID'];

if(isset($_COOKIE['username'])){
$result =  $collection->findOneAndUpdate(
            [ 'name' => 'notyet22' ],
            [ '$inc' => [ 'seq' => 1] ],
            [ 'upsert' => true,
              'projection' => [ 'seq' => 1 ],
              'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
             ]
);
}

//$result = $collection->find(['myName' => new MongoDB\BSON\ObjectID($ID)]);
//php function to find today's date
$currentday = date("Y-m-d");
//php function to find previous day's date
$day1 = date("Y-m-d", strtotime("-1 day"));


//increments by 1 every time a user clicks on something  
$result1 =  $collection->findOneAndUpdate(
            [ '_id' => $ID ],
            [ '$inc' => [ 'seq' => 1] ],
            [ 'upsert' => true,
              'projection' => [ 'seq' => 1 ],
			  'set' => [ 'time' => $currentday ],
              'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
             ]
);

//add date from line 20 to the db
$result2 = $collection->updateOne(['_id' => $ID],
					[ '$set' => [ 'time' => $currentday ]]
);




//resets the count after 24 hours
$result3 = $collection->updateMany(array('time' => array('$lt' => '$currentday')), array('$unset' => array('seq' => True)));

//this query will bring you every document that was queried within the last 48 hours
$result4 = $collection->find(array('time' => array('$gte' => '$day1')));


//}
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Salt | <?php 
            foreach ($wordArray as $title) { echo $title['Word'];}
            ?>
            
    </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

       

    </head>

  <body>
  hi
  </body>

</html>








