<?php
session_start();
require 'dbconnect.php';
if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => ($_GET['id'])]);
}
if(isset($_POST['submit'])){
   $collection->updateOne(
        ['_id' => ($_GET['id'])],
     //  ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials'
	   
	   ['$set' => ['SubmittedBy' => $_POST['SubmittedBy'], 'Word' => $_POST['Word'], 'Definition' => $_POST['Definition'], 'PublicationName' => $_POST['PublicationName'], 
	   'NISTSourcesName' => $_POST['NISTSourcesName'], 'ArticleName' => $_POST['ArticleName'],'Website' => $_POST['Website'], 'Author' => $_POST['Author'], 
	   'Year' => $_POST['Year'], 'ArticleLink' => $_POST['ArticleLink'], 'VideoLink' => $_POST['VideoLink']
	   
	   ]]
   );
   $_SESSION['success'] = "Success!";
   header("Location: admin-index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
   <title>Edit</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <h1>Edit</h1>
   <a href="admin-index.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h4>Your Name:</h4>
		 <input type="text" name="SubmittedBy" value="<?php echo $entry->SubmittedBy; ?>" class="form-control">
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
         <input type="text" name="Word" required="" value="<?php echo $entry->Word; ?>" class="form-control" placeholder="Word">
      </div>
	  
	        <div class="form-group">
         <h4>Definition:</h4>
         <textarea type="text" name="Definition"  style="min-width: 100%" rows="5" class="form-control" placeholder="Definition"><?php echo $entry->Definition; ?></textarea>
      </div>
	  
	        <div class="form-group">
         <h4>Article Name:</h4>
         <input type="text" name="ArticleName" value="<?php echo $entry->ArticleName; ?>"required="" class="form-control" placeholder="ArticleName">
      </div>
	  
   <div class="form-group">
         <h4>Website:</h4>
         <input type="text" name="Website" value="<?php echo $entry->Website; ?>"required="" class="form-control" placeholder="ArticleName">
      </div>
	                 
  <div class="form-group">
         <h4>Author:</h4>
         <input type="text" name="Author" value="<?php echo $entry->Author; ?>"required="" class="form-control" placeholder="Author">
      </div>
	  
	    <div class="form-group">
         <h4>Year:</h4>
         <input type="number" name="Year" value="<?php echo $entry->Year; ?>"required="" class="form-control" placeholder="Year">
      </div>
	  
	    <div class="form-group">
         <h4>Article Link:</h4>
         <input type="text" name="ArticleName" value="<?php echo $entry->ArticleName; ?>"class="form-control" placeholder="ArticleName">
      </div>
	  
	    <div class="form-group">
         <h4>NIST Sources Name:</h4>
         <input type="text" name="NISTSourcesName" value="<?php echo $entry->NISTSourcesName; ?>" class="form-control" >
      </div>
	  
	    <div class="form-group">
         <h4>Publication Name:</h4>
         <input type="text" name="PublicationName" value="<?php echo $entry->PublicationName; ?>" class="form-control">
      </div>
	  
	    <div class="form-group">
         <h4>Video Link:</h4>
         <input type="text" name="VideoLink" value="<?php echo $entry->VideoLink; ?>" class="form-control">
      </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>

</body>

</html>