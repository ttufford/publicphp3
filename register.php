 <?php
 require_once __DIR__ . "/vendor/autoload.php";

//db connection
      require 'dbconnect.php';


//$collection = $manager->mydb->users
$collection = $manager->mydb->administrators;

//$insert = array(“username” => 'demo@9lessons.info', “password” => md5(“demo_password”));
//$db->insert($insert);

//if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // $admin = $_REQUEST['admin'];


   //$insertOneResult = $collection->insertOne([

     //  'username' => '$admin',
       //'password' => md5('$admin'),
	   
	  //'username' => $_POST['username'],
     //  'password' => $_POST(md5['password'])
	 //   ]);
//}

	 
if(isset($_POST['submit'])){
   $insertOneResult = $collection->insertOne([

	   'username' => $_POST['username'],
       'password' => md5($_POST['password'])

   ]);


   header("Location: admin-index.php");
}
	   
	   



?>

