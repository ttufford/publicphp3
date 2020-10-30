<?php
    require_once 'library.php';
	require_once 'dbconnect.php';
    if(chkLogin()){
       
        $name = $_SESSION["uname"];
        echo "Welcome, $name!";
$collection = $manager->mydb->newusers;
$query = $collection->find(['FirstName'=>$name]);

foreach($query as $doc){
$status =  $doc->Admin;	
	

if($status==!"yes"){
	header("Location:login.php");
}

}
	

    }
    else{
        header("Location: login.php");
    }

    if(isset($_POST['logout'])){
        
        $var = removeall();
        if($var){
            header("Location:login.php");
        }
        else{
            echo "Error!";
        }
    
    }
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Admin Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
<body id="browseBody">
    <div class="thisheadera">
        <a id="adminLogo" href="index.php"><img id="headerLogo" src="Images\Logo.svg"></a>
		

		
                <div id="headerbox">
                    <nav>
                        <ul>
                            <li><a href="approved-index.php">Approved Words</a></li>
                            <li><a href="admin-index.php">Pending Words</a></li>
							<li><a href="admin-users.php">Manage Users</a></li>
							<li><a href="admin-scrape.php">Import Scraped Data</a></li>

                        </ul>
                    </nav>
                   
          </div>       

</div>

        <form method="post" action="">
            <input type="submit" name="logout" value="Logout">
        </form>
		<!-- copied until metric table-->
		<div id="innerwrapper">

  
                         <?php 
								error_reporting(E_ALL ^ E_NOTICE);
								require 'dbconnect.php';
								require 'vendor/autoload.php';
								require_once 'library.php';
								
	

								
								
								$collection = $manager->mydb->administrators;



								
								$count2 = $collection->count();
								
								 
                                $collection = $manager->mydb->approved;

                                $result = $collection->find();

								$wordArray = iterator_to_array($result);
								$count1 = $collection->count();
					
								echo "<p id='adminCount'>Total Number of Words: " .$count1."</p>";
								echo "<p id='adminCount'>Total Number of Registered Users:  " .$count2."</p>";

								



								


//don't delete anything above this line
//move these later
//$result = $collection->find($filter, $options);
//$wordArray = iterator_to_array($result);


						?>
		
		<table id='metricTable' class='table table-bordered'>

                     <thead>
                        <tr>
                          <th>Word</th>
                          <th>Hits</th>
                        </tr>
                     </thead>
                     <tbody>
                    <?php
                     foreach ($wordArray as $entry) {

                        if (!empty($entry['seq'])) {

				   echo '<tr>' 
                    ?>

                       <?php echo '<td>'.$entry['Word'].'</td>'; ?>
                      <?php echo '<td>'.$entry['seq'].'</td>'; 
					  
					  
					  ?>
         
     <?php  }};


	 ?> 

            
                     </tr>
                     </tbody>
                     </table>
                     <!-- <iframe style="background: #FFFFFF;border: none;border-radius: 2px;box-shadow: 0 2px 10px 0 rgba(70, 76, 79, .2);" width="640" height="480" src="https://charts.mongodb.com/charts-project-0-drkab/embed/charts?id=e163760b-ad55-472b-b158-823cd6a13bd9&theme=light"></iframe> -->

    </div><!--End wrapper-->
<div>



		
</div>

</div>
		
		
    </body>
</html>
