<?php
session_start();

require 'dbconnect.php';
$collection = $manager->mydb->newusers;

if (isset($_GET['id'])) {

   $entry = $collection->findOne(['_id' => ($_GET['id'])]);
}
$collection = $manager->mydb->administrators;
if(isset($_POST['submit'])){
 //  $collection->insertOne(
   //    ['_id' => ($_GET['id'])],
     //  ['$set' => ['myName' => $_POST['myName'], 'category' => $_POST['category'], 'myWord' => $_POST['myWord'], 'myDefinition' => $_POST['myDefinition'], 'mySource' => $_POST['mySource'], 'referenceMaterials' => $_POST['referenceMaterials']]]
   //);
   
      $collection->insertOne([
		'_id' => ($_GET['id']),
	   'username' => $_POST['username'], 
	   'password' => md5($_POST['password'])


	   
	   

   ]);
   
   //$collection = $manager->mydb->words;
   //$collection->deleteOne(['_id' => ($_GET['id'])]);

   
   $_SESSION['success'] = "Success!";
   header("Location: admin-users.php");
}
?>


<!DOCTYPE html>
<html>
<head>
   <title>Admin GUI</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <h1>Approve</h1>
   <a href="admin-users.php" class="btn btn-primary">Back</a>
   <form method="POST">
      <div class="form-group">
         <h4>Username</h4>
		 <input type="text" name="username" value="<?php echo $entry->username; ?>" class="form-control" required="" class="form-control" placeholder="Name">
      </div>


      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Approve</button>

      </div>

   </form>

</div>

</body>

</html>