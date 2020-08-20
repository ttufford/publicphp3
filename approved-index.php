<?php
session_start();
//https://stackoverflow.com/questions/7115852/notice-undefined-index-zzzzzzwtf
error_reporting(E_ALL ^ E_NOTICE);
      require 'dbconnect.php';
	  $collection = $manager->mydb->approved;

?>

<!DOCTYPE html>

<html>
<head>
   <title>Admin GUI</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

<div class="container">
<h1>Approved Words</h1>
<a href="approved-create.php" class="btn btn-success">Add Word</a>

<?php
   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
   }
?>


<table class="table table-borderd">

   <tr>
                          <th>Submitted by</th>
						  <th>Word</th>
						  <th>Definition</th>
						  <th>Publication Name</th>
						  <th>NIST Source</th>
                          <th>Article Name</th>
                          <th>Website</th>
						  <th>Author</th>
						  <th>Year</th>
                          <th>Article Link</th>
                          <th>VideoLink</th>

   </tr>

<?php
//db connection
      require 'dbconnect.php';
	  require 'vendor/autoload.php';
	  $collection = $manager->mydb->approved;


	  
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

         echo "<td>".$entry->SubmittedBy."</td>";
         echo "<td>".$entry->Word."</td>";
		 echo "<td>".$entry->Definition."</td>";
         echo "<td>".$entry->PublicationName."</td>";
         echo "<td>".$entry->NISTSourcesName."</td>";
         echo "<td>".$entry->ArticleName."</td>";	
		 echo "<td>".$entry->Website."</td>";
		 echo "<td>".$entry->Author."</td>";
         echo "<td>".$entry->Year."</td>";
         echo "<td>".$entry->ArticleLink."</td>";
         echo "<td>".$entry->VideoLink."</td>";	
		 

		 

         echo "<td>";

         echo "<a href='approved-edit.php?id=".$entry->_id."' class='btn btn-primary'>Edit</a>";

         echo "<a href='approved-delete.php?id=".$entry->_id."' class='btn btn-danger'>Delete</a>";
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
		
		?><a href="approved-index.php?page=<?php echo $b; ?>" style="text-decoration:none "><?php echo $b." "; ?></a> <?php
		         

	}

   ?>
   <br><br>
		<?php         
				 echo "<a href='admin-index.php?id=".$entry->_id."' class='btn btn-success'>Pending Words</a>";

   ?>

</div>



</body>
</html>