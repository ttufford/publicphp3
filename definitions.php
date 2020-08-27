<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'dbconnect.php';
include_once('header.php');


if (isset($_GET['ID'])) {

$ID = $_GET['ID'];


$result = $collection->find(['_id' => ($ID)]);
$wordArray = iterator_to_array($result);

//$result = $collection->find(['myName' => new MongoDB\BSON\ObjectID($ID)]);

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
                <div id="referenceMaterial">
                <h4>Articles</h4>
                <div id="referenceDiv">
                <?php echo $definition['NISTSourcesName']; ?>
                <div id="articleLink">

                
                <p> <?php $citation= $definition['Author'].'. '.$definition['Year'].'.'.$definition['ArticleName'].'. '.$definition['Source'].' '.$definition['ArticleLink'] ?></p>
                <?php echo '<textarea id="txt_copy" aria-hidden="true">'.$citation.'</textarea><a href='.$definition['ArticleLink'].'>'.$definition['ArticleName'].'<a/>';
                echo '<button class="def-btn" data-clipboard-target="#txt_copy">Copy Citation
                </button></div></div>';
                
                ?>
           
             <?php
    $url = $definition['Video Link'];
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    $id = $matches[1];
    $width = '550px';
    $height = '400px';
?>
<iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
    frameborder="0" allowfullscreen></iframe> 
            </div>
            <?php  
                    
                }
             ?> 
        </div><!--End wrapper-->
        <script type='text/javascript'>
    var clipboard = new ClipboardJS('.def-btn');
   
   </script>
</body>

</html>