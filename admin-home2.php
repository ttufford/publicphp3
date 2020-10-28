<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
<body id="browseBody">
    <div class="header">
        <a id="adminLogo" href="index.php"><img id="headerLogo" src="Images\Logo.svg"></a>
		

		
                <div id="headerbox">
                    <nav>
                        <ul>
                            <li><a href="approved-index.php">Approved Words</a></li>
                            <li><a href="admin-index.php">Pending Words</a></li>
                        </ul>
                    </nav>
                    <div id="headersearchbar">
                   
          </div>       





  <div id="innerwrapper">

  
                         <?php 
								 
								require 'dbconnect.php';
								require 'vendor/autoload.php';
								$filter = array();

                                $options = array(
                                    "sort" => array("seq" => -1),
                                );
								 
                                $collection = $manager->mydb->approved;


                                $result = $collection->find($filter, $options);
								$wordArray = iterator_to_array($result);

								$count1 = $collection->count();
					
								echo "Total Number of Words:" .$count1;
								



								


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