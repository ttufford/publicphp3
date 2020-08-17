<?php
session_start();
//https://stackoverflow.com/questions/7115852/notice-undefined-index-zzzzzzwtf
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>

<html>
<head>
   <title>Admin GUI</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

<div class="container">
<h1>Admin Portal</h1>
<a href="admin-create.php" class="btn btn-success">Add Word</a>

<?php
   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }
?>


<table class="table table-borderd">

   <tr>
						  <th>Name</th>
                          <th>Category</th>
                          <th>Word</th>
						  <th>Definition</th>
						  <th>Source</th>
                          <th>Reference Materials</th>

   </tr>

<?php
//db connection
      require 'dbconnect.php';
	  require 'vendor/autoload.php';

	  
	  //page number 
$page = $_GET["page"];
if ($page=="" || $page=="1")
{
	$page1=0;
}
else{
	$page1=($page*5)-5;
}
$options=['limit' => 5,
	  'skip' => $page1
	  ];	  
     // $result = $collection->find([]);
	//limit in query:
	//$result = $collection->find(array(),array('limit' => 5));
      $result = $collection->find([], $options);


//$result1 = $collection->find([]);
//count the number of entries in the db and store them as a variable [countrow]


     foreach($result as $entry) {
		      // while($entry = array($result)) {


         echo "<tr>";

         echo "<td>".$entry->myName."</td>";
         echo "<td>".$entry->category."</td>";
		 echo "<td>".$entry->myWord."</td>";
         echo "<td>".$entry->myDefinition."</td>";
         echo "<td>".$entry->mySource."</td>";
         echo "<td>".$entry->referenceMaterials."</td>";		 
		 
		 

         echo "<td>";

         echo "<a href='admin-edit.php?id=".$entry->_id."' class='btn btn-primary'>Edit</a>";

         echo "<a href='admin-delete.php?id=".$entry->_id."' class='btn btn-danger'>Delete</a>";
	echo "<a href='admin-approve.php?id=".$entry->_id."' class='btn btn-primary'>Approve</a>";
         echo "</td>";

         echo "</tr>";

      };
echo '</table>';
$res1 = $collection->find();
$countrow=$collection->count($result);
//echo $countrow;

$a=$countrow/5;
$a=ceil($a);
echo "<br>"; echo "<br>";
	for($b=1;$b<=$a;$b++)
	{
		
		?><a href="admin-index.php?page=<?php echo $b; ?>" style="text-decoration:none "><?php echo $b." "; ?></a> <?php
		
	}

   ?>

</div>



</body>
</html>