<?php
//connect to db
require 'dbconnect.php';
$collection = $manager->mydb->counter;


$currentday = date("Y-m-d");
$day2 = date("Y-m-d", strtotime("+1 day"));
$day1 = date("Y-m-d", strtotime("-1 day"));

$now = time();
$one_minutes = $now + (1 * 60);
$startDate = date('m-d-Y H:i:s', $now);
$endDate = date('m-d-Y H:i:s', $one_minutes);

//increments by 1  
$result =  $collection->findOneAndUpdate(
            [ 'name' => 'notyet22' ],
            [ '$inc' => [ 'seq' => 1] ],
            [ 'upsert' => true,
              'projection' => [ 'seq' => 1 ],
              'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
             ]
);

$start = new MongoDB\BSON\UTCDateTime(strtotime("midnight") * 1000);
$filter = ['date' => ['$gte' => $start]];
$options = ['sort' => ['date' => -1]];
$query = new MongoDB\Driver\Query($filter,$options);
//add date from line 7
$mongQ = $collection->updateOne(['name' => 'notyet22'],
					[ '$set' => [ 'time' => $currentday ]]
);

//$result2 = $collection->find(array('time' => $start));
//$article = $collection->findOne(array('time'=> $start));
//echo $result2;
//echo $article;



$result2 = $collection->find(array('time' => array('$gte' => '$start')));
//$result4 = $collection->find( [ 'time2' => '30'] );

//resets the count after 24 hours
$result30 = $collection->updateMany(array('time' => array('$lte' => '$start')), array('$unset' => array('seq' => True)));

?>

<!DOCTYPE html>



		<table class='table table-bordered'>
                     <thead>
                        <tr>
                          <th>Seq</th>
						  <th>time</th>
                        </tr>
                     </thead>
					 <?php 
					 foreach ($result2 as $entry) {
						 ?>
					
					   <?php echo $entry['seq']; ?>
					   <br>
					  <?php echo $entry['time']; ?>
					  <br>
					  <?php echo $currentday; ?>
					  <br>
					  <?php echo $day2; ?>
					  	<?php echo $now; ?>
						<?php echo $endDate; ?>




						




                      </tr>
                   <?php //$i++;  
                    
					 }
                  ?>
                    </table>
                  