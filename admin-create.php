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
	   'Date' => $_POST['Date'], 
	   'Link' => $_POST['Link'],
	   'NISTSourcesName' => $_POST['NISTSourcesName'],
	   'PublicationName' => $_POST['PublicationName'],
	   'VideoLink' => $_POST['VideoLink'],

		'ArticleName2' => $_POST['ArticleName2'],'Website2' => $_POST['Website2'], 'Author2' => $_POST['Author2'], 
	   'Date2' => $_POST['Date2'], 'Link2' => $_POST['Link2'], 
	   
	   'ArticleName3' => $_POST['ArticleName3'],'Website3' => $_POST['Website3'], 'Author3' => $_POST['Author3'], 
	   'Date3' => $_POST['Date3'], 'Link3' => $_POST['Link3']

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
         Your Name
		 <input type="text" name="SubmittedBy"  class="form-control">
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
         <h4>Word:</h4> 
         <input type="text" name="Word"  " class="form-control" placeholder="Word">
      </div>
	  
	        <div class="form-group">
         <h4>Definition:</h4>
         <textarea type="text" name="Definition"  style="min-width: 100%" rows="5" class="form-control" placeholder="Definition"></textarea>
      </div>
      <div class="form-group">
         <h4>NIST Sources Name:</h4>
         <input type="text" name="NISTSourcesName"  class="form-control" >
      </div>
	  
	    <div class="form-group">
         <h4>NIST Publication Name:</h4>
         <input type="text" name="PublicationName"  class="form-control">
      </div>
	  
	    <div class="form-group">
         <h4>Video Link:</h4>
         <input type="text" name="VideoLink"  class="form-control">
      </div>
      <h4>Article 1:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName" class="form-control" placeholder="ArticleName">
            </div>
         
         <div class="form-group">
               <h4>Website:</h4>
               <input type="text" name="Website" class="form-control" placeholder="ArticleName">
            </div>
                        
      <div class="form-group">
               <h4>Author:</h4>
               <input type="text" name="Author" class="form-control" placeholder="Author">
            </div>
         
            <div class="form-group">
               <h4>Year:</h4>
               <input type="text" name="Date" class="form-control" placeholder="Date">
            </div>
         
            <div class="form-group">
               <h4>Article Link:</h4>
               <input type="text" name="Link" class="form-control" placeholder="ArticleName">
            </div>
      </div>

     
      <h4>Article 2:</h4>

      <div class="adminEditArticle" style="margin-left: 6rem;">

            <div class="form-group">
               <h5>Article Name <h5>
               <input type="text" name="ArticleName2" class="form-control" >
            </div>

            <div class="form-group">
               <h5>Website:</h5>
               <input type="text" name="Website2" class="form-control" placeholder="ArticleName">
            </div>
                        
            <div class="form-group">
               <h5>Author:</h5>
               <input type="text" name="Author2" class="form-control" placeholder="Author">
            </div>

            <div class="form-group">
               <h5>Year:</h5>
               <input type="text" name="Date2" class="form-control" placeholder="Date">
            </div>

            <div class="form-group">
               <h5>Article Link:</h5>
               <input type="text" name="Link2" class="form-control" placeholder="ArticleName">
            </div>
    </div>
    <h4>Article 3:</h4>

    <div class="adminEditArticle" style="margin-left: 6rem;">

         <div class="form-group">
            <h5>Article Name <h5>
            <input type="text" name="ArticleName3" class="form-control" placeholder="ArticleName">
         </div>

         <div class="form-group">
            <h5>Website:</h5>
            <input type="text" name="Website3" class="form-control" placeholder="ArticleName">
         </div>
                     
         <div class="form-group">
            <h5>Author:</h5>
            <input type="text" name="Author3" class="form-control" placeholder="Author">
         </div>

         <div class="form-group">
            <h5>Year:</h5>
            <input type="text" name="Date3" class="form-control" placeholder="Year">
         </div>

         <div class="form-group">
            <h5>Article Link:</h5>
            <input type="text" name="Link3" class="form-control" placeholder="ArticleName">
         </div>
    </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>

</body>

</html>