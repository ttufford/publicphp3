<?php
//connect to db
require 'dbconnect.php';
$collection = $manager->mydb->counter;
//$find = $collection->find( [] );
$find = $collection->find( ['id' => '234'] );

//10

//$value = $find['counter'];
//$newvalue = 1 + $value;

//$newvalue = 1 + $find;

//12

	$articles = $collection->updateOne(array('_id' =>'224'),
array('$set' => array('counter' => 'New Content'),
'$inc' => array('update_count' => 1)));
  
$articles->update(array('_id' => MongoId('4dcd2abe5981')),
array('$set' => array('content' => 'New Content'),
'$inc' => array('update_count' => 1)));



	
	
db.counter.find({
    "time2": {
        "$gt": 29
    }
}, {
    "seq": 1,
    "time2": 1
});



////idk


$result2 = $collection->find(array("seq" => array('$in' => array("name"))));

					 
					 
					 
?>

<!DOCTYPE html>



		<table class='table table-bordered'>
                     <thead>
                        <tr>
                          <th>Submitted by</th>
						  <th>Word</th>
                        </tr>
                     </thead>
					 <?php 
					 foreach ($result2 as $entry) {
						 ?>
					
					   <?php echo $entry['seq']; ?>
					  <?php echo $entry['time']; ?>

						




                      </tr>
                   <?php //$i++;  
                    
					 }
                  ?>
                    </table>
                  
				  
				  db.yourCollection.insert( {
   "logEvent": 2,
   "logMessage": "Success!"
} )
p36 timeout, but wait until inserting
50
57 unset
58/63


$result2 = $collection->find(array('time' => array('$gte' => '$start')));
db.collection.find( { qty: { $gt: 4 } } )


select Seq > 1 and time > 1hr

if 
db.yourCollection.update({}, {$unset: {seq:1}}, false, true);

db.yourCollection.update({}, {$unset: {seq:1}}, false, true);
db.yourCollection.update(
   { time: "6" },
   { $unset: { seq: 1 } }
)

{ $gte: [ "$qty", 250 ] }
	{$gte: "6"
	}
	<?
//good	
	
db.yourCollection.updateMany(
   { time: {$gte: "6"} },
   { $unset: { seq: 1 } }
)

$articles->update(array('_id' => MongoId('4dcd2abe5981')),array('$unset' => array('title' => True)));
$result3 = $collection->updateMany(array('time' => array('$gte' => '6')),array('$unset' => array('seq' => True)));

//with variable
$result3 = $collection->updateMany(array('time' => array('$gte' => '$start')));