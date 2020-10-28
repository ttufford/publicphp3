<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'dbconnect.php';
$collection = $manager->mydb->approved;

include_once('header.php');


if (isset($_GET['ID'])) {

$ID = $_GET['ID'];


$result = $collection->find(['_id' => ($ID)]);
$wordArray = iterator_to_array($result);

//$result = $collection->find(['myName' => new MongoDB\BSON\ObjectID($ID)]);
//php function to find today's date
$currentday = date("Y-m-d");
//php function to find previous day's date
$day1 = date("Y-m-d", strtotime("-1 day"));


//increments by 1 every time a user clicks on something  
$result1 =  $collection->findOneAndUpdate(
            [ '_id' => $ID ],
            [ '$inc' => [ 'seq' => 1] ],
            [ 'upsert' => true,
              'projection' => [ 'seq' => 1 ],
			  'set' => [ 'time' => $currentday ],
              'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
             ]
);

//add date from line 20 to the db
$result2 = $collection->updateOne(['_id' => $ID],
					[ '$set' => [ 'time' => $currentday ]]
);




//resets the count after 24 hours
$result3 = $collection->updateMany(array('time' => array('$lt' => '$currentday')), array('$unset' => array('seq' => True)));

//this query will bring you every document that was queried within the last 48 hours
$result4 = $collection->find(array('time' => array('$gte' => '$day1')));


}
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Salt | <?php 
            foreach ($wordArray as $title) { echo $title['Word'];}
            ?>
            
    </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

       

    </head>

    <body id="browseBody">
       
      <div id="innerwrapper">
            <div class="content">
            <?php 
					 foreach ($wordArray as $definition) {
						 ?>
                <h1> <?php echo $definition['Word']; ?></h1>
                <hr>
                        
                <p><?php echo $definition['Definition']; ?></p>

                <hr>
                <?php echo $definition['NISTSourcesName']; ?>

                <div id="referenceMaterial">
                    
                    <h4>Supplemental Material</h4>

                    <?php $citation1= $definition['Author'].'. '.$definition['Date'].'.'.$definition['ArticleName'].'. '.$definition['Website'].' '.$definition['Link']; 

                    echo '<textarea id="txt_copy1" aria-hidden="true">'.$citation1.'</textarea>';
                    $citation2= $definition['Author2'].'. '.$definition['Date2'].'.'.$definition['ArticleName2'].'. '.$definition['Website2'].' '.$definition['Link2']; 
                    echo '<textarea id="txt_copy2" aria-hidden="true">'.$citation2.'</textarea>';

                    $citation3= $definition['Author3'].'. '.$definition['Date3'].'.'.$definition['ArticleName3'].'. '.$definition['Website3'].' '.$definition['Link3']; 

                    echo '<textarea id="txt_copy3" aria-hidden="true">'.$citation3.'</textarea>';
                    ?>
                        <div class="parent">
                        <div class="div1">
                        <h6>Articles</h6>
                        <hr>
                        <div class="articlessss">
                           
                            <?php
						if(!empty($definition['Link'])){
							
                               echo '<p><a href='.$definition['Link'].'>'.$definition['ArticleName'].'<a/></p>';
                               echo '<button class="def-btn" data-clipboard-target="#txt_copy1">Copy Citation</button>'; ?>
                         </div>
                        </div>
						
					<?php
					};
					?>


                        <div class="div2">
                            <div class="articlessss">
						<?php
						if(!empty($definition['Link2'])){
							
							or
				
							 <?php if ($definition['ArticleName3']!=" Word is not found") {
							    echo '<p><a href='.$definition['Link2'].'>'.$definition['ArticleName2'].'<a/></p>';
                                echo '<button class="def-btn2" data-clipboard-target="#txt_copy2">Copy Citation</button>'; 
							?>
                            </div>
                     </div>
					 
					<?php
					};
					?>
                        
						
				
						
                    <div class="div3">
                        <div class="articlessss">
				<?php
						if(!empty($definition['Link3'])){
							echo
                                  '<p><a href='.$definition['Link3'].'>'.$definition['ArticleName3'].'<a/></p>';
                                 echo '<button class="def-btn3" data-clipboard-target="#txt_copy3">Copy Citation</button>';
				?>
                            </div>
                        </div>
					
				<?php
					};
				?>
					
                    <div class="div4"> 
                    <h6>Books</h6>
                        <hr>
                        <div class="articlessss">
                        <?php 
                                 echo '<p>'.$definition['BookTitle'] .' <br>By: '. $definition['BookAuthor'].'<a/></p>';

                                ?>
                            </div>
                        </div>
                        <!-- echo '<p>'.$definition['BookTitle'].'</p>'.'<p>'.$definition['BookAuthor'].'</p>';?> -->

                      
                    
                        </div><!--End Parent -->

                        <div class="div5"> 
                        <h6>Video</h6>
                        <hr>
                        <?php
                            $url = $definition['VideoLink'];
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];

                            ?>
                            <iframe id="ytplayer" type="text/html" width="300px" height="200px"
                                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                frameborder="0" allowfullscreen></iframe> 
                            </div>
                        <?php }; ?>



        </div> <!--end reference Material -->
        </div> <!--end content-->
         </div><!--End wrapper-->
        <script type='text/javascript'>
    var clipboard = new ClipboardJS('.def-btn');
    var clipboard = new ClipboardJS('.def-btn2');
    var clipboard = new ClipboardJS('.def-btn3');

   </script>
</body>

</html>