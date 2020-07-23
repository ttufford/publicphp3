<?php
session_start();
require 'dbconnect.php';
if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if(isset($_POST['submit'])){
   $collection->updateOne(
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['myName' => $_POST['myName'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials']]]
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
         <h1>Name:</h1>
         <input type="text" name="myName" value="<?php echo $entry->myName; ?>" required="" class="form-control" placeholder="Name">
      </div>

      <div class="form-group">
         <h1>category:</h1>
         <select class="form-control" name="category" placeholder="category" placeholder="category"><?php echo $entry->category; ?></textarea>
		         <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>

      </div>
	        <div class="form-group">
         <h1>Word:</h1>
         <input type="text" name="myWord" placeholder="myWord" value="<?php echo $entry->myWord; ?>" >
      </div>
	        <div class="form-group">
         <h1>myDefinition:</h1>
         <input type="text" name="myDefinition" value="<?php echo $entry->myDefinition; ?>" required="" class="form-control" placeholder="myDefinition">
 
	        <div class="form-group">
         <h1>mySource:</h1>
         <input type="text" name="mySource" value="<?php echo $entry->mySource; ?>" required="" class="form-control" placeholder="mySource">
      </div>
	  	        <div class="form-group">
         <h1>referenceMaterials:</h1>
         <select type="text" name="referenceMaterials" value="<?php echo $entry->referenceMaterials; ?>" required="" class="form-control" placeholder="referenceMaterials">
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