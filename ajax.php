<?php
//Including Database configuration file.
require 'dbconnect.php';
//Getting value of "search" variable from "script.js".
//<!-- <?php echo $Query 
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
   $fullQuery = $collection->find(array(),array("Word"=>1)); 
   // $Query2=$collection->find(['myName' => new MongoDB\BSON\Regex($Name)]);

   // $Query=$collection->find(['myName' => new MongoDB\BSON\Regex($Name)]);
   $Query2=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   $Query=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$Name, 'i')]);

   // $Query=$collection->find(array('$or' => array(array("myName" => array('$regex' => $term)),
   // array("myDefinition" => array('$regex' => $term)))));
   // $ExecQuery =$collection->find($Query);
   // $testerr=$collection->find([$Query => fullQuery]);
   // $countingA=$collection->count($Query);
   $countingA=count($Query2->toArray());


       ?>
<?php 
if ($countingA>0) {
foreach ($Query as $doc)
{ 

   echo '<a class="dropdown" href=definitions.php?ID='.$doc['_id'].'>'.$doc['Word'].'</a>';

//   echo '<a class="dropdown" href=definitions.php?ID='.$doc['_id'].'>'.'<div class="dropdown">'.$doc['Word'].'</div>'.'</a>';
   // echo '<div class="dropdown">'.$doc['myName'].'</div>';
   // {$doc['_id']}

}} 
else {
   //$noResult= "Looks like".' '.$Name.' '."Is not in in the database. You can add it yourself ".'<a href='.$Name.'.txt>Here </a>';
   $noResult= "Looks like".' '.$Name.' '."Is not in in the database. You can add it yourself ".'<a href="sub.php">Here </a>';

   echo '<div class="dropdown2">'.$noResult.'</div>';
}
?>
   <?php
}
?>

