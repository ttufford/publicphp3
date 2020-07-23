<?php
//straight to the public page
session_start();
if(isset($_POST['submit'])){
   require 'dbconnect.php';
   $insertOneResult = $collection->insertOne([

       'name' => $_POST['name'],
       'detail' => $_POST['detail'],
	   
	   'myName' => $_POST['myName'], 
	   'category' => $_POST['category'], 
	   'myWord' => $_POST['myWord'], 
	   'myDefinition' => $_POST['myDefinition'], 
	   'mySource' => $_POST['mySource'], 
	   'referenceMaterials' => $_POST['referenceMaterials']

   ]);


   $_SESSION['success'] = "Success!";
   header("Location: admin-index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
   <title>Add</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">
   <h1>Add</h1>
   <a href="admin-index.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h1>Name:</h1>
		 <input type="text" name="myName" required="" class="form-control" placeholder="Name">
      </div>

      <div class="form-group">
         <h1>Category:</h1>
         <select class="form-control" name="category" placeholder="category" placeholder="category">
		         <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>
      </div>
	  
	   <div class="form-group">
         <h1>Word:</h1>
         <input type="text" name="myWord" required="" class="form-control" placeholder="myWord">
      </div>
	  
	        <div class="form-group">
         <h1>Definition:</h1>
         <input type="text" name="myDefinition" required="" class="form-control" placeholder="myDefinition">
      </div>
	  
	        <div class="form-group">
         <h1>Source:</h1>
         <input type="text" name="mySource" required="" class="form-control" placeholder="mySource">
      </div>
	  
	        <div class="form-group">
         <h1>Reference Material:</h1>
         <select name="referenceMaterials" required="" class="form-control" placeholder="referenceMaterials">
		             <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>
      </div>
	                 

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>


</body>

</html>