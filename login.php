<?php
require_once __DIR__ . "/vendor/autoload.php";

//db connection
      require 'dbconnect.php';

//select db
$db = $manager->mydb;

//$collection = $manager->mydb->users
$collection = $manager->mydb->administrators;
  
  
if (!empty($_POST)) {
    //gets user's info based off of a username.
   try {
        $database = $manager->$db->administrators; //Selects the user collection
			$userDatabaseFind = $database->find(array('username' => $_POST['username'])); //Does a search for Mobile with the posted mobile Variable
				
				//Iterates through the found results
				foreach($userDatabaseFind as $userFind) {
				    $storedUsername = $userFind['username'];
				    $storedPassword = $userFind['password'];
				}
	
		if($_POST['username'] == $storedUsername && md5($_POST['password']) == $storedPassword)
		{   
		//$response["success"] = 1;
        //$response["message"] = "Login Success!!!";
		header("location: admin-index.php");
        die(json_encode($response));
        }
		else{
		//$response["success"] = 0;
        $response['Message'] = "Error. Please Try Again!";
        die(json_encode($response));	
				
			}
		}		
					
    catch (Exception $ex) {
        // For testing, you could use a die and message. 
       // die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one to product JSON data:
       
    }
	}
?>
