<?php
//this banner will be shown on the admin index page
session_start();
if(isset($_POST['submit'])){
   require 'dbconnect.php';
   
   $myId = uniqid();
   
   $insertOneResult = $collection->insertOne([
		'_id' => "$myId",
		'SubmittedBy' => $_POST['SubmittedBy'],
		'Word' => $_POST['Word'],
		'Definition' => $_POST['Definition'],
	   'ArticleName' => $_POST['ArticleName'], 
	   'Website' => $_POST['Website'], 
	   'Author' => $_POST['Author'], 
	   'Year' => $_POST['Year'], 
	   'ArticleLink' => $_POST['ArticleLink'],
	   'NISTSourcesName' => $_POST['NISTSourcesName'],
	   'PublicationName' => $_POST['PublicationName'],
	   'VideoLink' => $_POST['VideoLink']

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
   Add
   <a href="admin-index.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         Your Name
		 <input type="text" name="SubmittedBy" required="" class="form-control" placeholder="Name">
      </div>
<!--
      <div class="form-group">
         <h1>Category:</h1>
         <select class="form-control" name="category" placeholder="category" placeholder="category">
		         <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>
      </div>
-->  
	   <div class="form-group">
         Word
         <input type="text" name="Word" required="" class="form-control" >
      </div>
	  
	        <div class="form-group">
         Definition
         <input type="text" name="Definition" required="" class="form-control" >
      </div>
	  
	        <div class="form-group">
         Article Name
         <input type="text" name="ArticleName" required="" class="form-control" >
      </div>
	  
   <div class="form-group">
         Website
         <input type="text" name="Website" required="" class="form-control" >
      </div>
	                 
  <div class="form-group">
         Author
         <input type="text" name="Author" required="" class="form-control" >
      </div>
	  
	    <div class="form-group">
         Year
         <input type="text" name="Year" required="" class="form-control" >
      </div>
	  
	    <div class="form-group">
         Article Link
         <input type="text" name="ArticleName" required="" class="form-control" >
      </div>
	  
	    <div class="form-group">
         NIST Sources Name
         <input type="text" name="NISTSourcesName" required="" class="form-control" >
      </div>
	  
	    <div class="form-group">
         Publication Name
         <input type="text" name="PublicationName" required="" class="form-control" placeholder="PublicationName">
      </div>
	  
	    <div class="form-group">
         Video Link
         <input type="text" name="VideoLink" required="" class="form-control" placeholder="VideoLink">
      </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>



</body>

</html>