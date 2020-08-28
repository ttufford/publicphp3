<?php
//this banner will be shown on the admin index page
session_start();
if(isset($_POST['submit'])){
   require 'dbconnect.php';
   	  $collection = $manager->mydb->approved;

   
   $myId = uniqid();
   
   $insertOneResult = $collection->insertOne([
		'_id' => "$myId",
	   'SubmittedBy' => $_POST['SubmittedBy'], 
	   'Word' => $_POST['Word'], 
	   'Definition' => $_POST['Definition'], 
	   'PublicationName' => $_POST['PublicationName'], 
	   'NISTSourcesName' => $_POST['NISTSourcesName'], 
	   'ArticleName' => $_POST['ArticleName'],
	   'Website' => $_POST['Website'], 
	   'Author' => $_POST['Author'], 
	   'Year' => $_POST['Year'], 
	   'ArticleLink' => $_POST['ArticleLink'], 
	   'VideoLink' => $_POST['VideoLink'],
	   
	   

   ]);


   $_SESSION['success'] = "Success!";
   header("Location: approved-index.php");
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
         Your Name
		 <input type="text" name="SubmittedBy" required="" class="form-control" >
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
         <input type="text" name="ArticleLink"  class="form-control" >
      </div>
	  
	    <div class="form-group">
         NIST Sources Name
         <input type="text" name="NISTSourcesName"  class="form-control" >
      </div>
	  
	    <div class="form-group">
         Publication Name
         <input type="text" name="PublicationName"  class="form-control">
      </div>
	  
	    <div class="form-group">
         Video Link
         <input type="text" name="VideoLink"  class="form-control">
      </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>


</body>

</html>