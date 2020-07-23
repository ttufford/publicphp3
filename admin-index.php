<?php
   session_start();
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


      require 'dbconnect.php';
      $result = $collection->find([]);


      foreach($result as $entry) {

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

         echo "</td>";

         echo "</tr>";

      };


   ?>

</table>

</div>


</body>
</html>