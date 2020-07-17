<?php
require 'vendor/autoload.php'; // include Composer's autoloader

//db connection
$manager = new MongoDB\Client(
  'mongodb+srv://<name>:<pass>@cluster0-s8mjc.azure.mongodb.net/mydb?retryWrites=true&w=majority');

  

$collection = $manager->mydb->users;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $term = $_REQUEST['term'];
 

//$result = $collection->find( [ 'myName' => 'all', 'category' => 'category1' ] );
$result = $collection->find( [ 'myName' => $term] );
}

  if (empty($term)) {
	$result = $collection->find();
  } 

?>
<!DOCTYPE html>
		<table class='table table-bordered'>
                     <thead>
                        <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Word</th>
						  <th>Definition</th>
						  <th>Source</th>
                          <th>Reference Materials</th>
                        </tr>
                     </thead>
					 <?php 
					 foreach ($result as $entry) { ?>
					<tr>
					    <td><?php echo $entry['myName']; ?></td>
                        <td><?php echo $entry["category"];  ?></td>
                        <td><?php echo $entry["myWord"];  ?></td>
                        <td><?php echo $entry["myDefinition"];  ?></td>
                        <td><?php echo $entry["mySource"];  ?></td>
                        <td><?php echo $entry["referenceMaterials"];  ?></td>
                      </tr>
                   <?php //$i++;  
                    } 
                  ?>
                    </table>
</html>
<?

?>
	

