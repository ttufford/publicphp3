<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'vendor/autoload.php';
require 'dbconnect.php';

if (isset($_GET['ID'])) {

$ID = $_GET['ID'];


$result = $collection->find(['_id' => ($ID)]);
//$result = $collection->find(['myName' => new MongoDB\BSON\ObjectID($ID)]);

}
?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>SALT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
        
    </head>

    <body id="browseBody">
        <div class="header">
            <img id="headerLogo" src="Images\Logo.svg">
                <div id="browsebox1">
                    <nav>
                        <ul>
                            <li><a href="browse.html">Browse</a></li>
                            <li><a href="aboutus.html">About Us</a></li>
                            <li><a href="reports.html">Reports</a></li>
                        </ul>
                    </nav>
                    <div id="headersearchbar">
                        <form autocomplete="off" id="search" method="POST">
                        <label for="search-input"></label>
                            <input aria-label="Search" id="search-input"  name="query" placeholder="Search" type="search">
                            <button>
                            <svg viewbox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                <path d="M0 0h24v24H0z" fill="none">
                            </svg>
                            </button>
                        </form>
                    </div>
                </div>
          </div>    
      <div id="innerwrapper">
            <div class="content">
            <?php 
					 foreach ($result as $definition) {
						 ?>
                <h1> <?php echo $definition['Word']; ?></h1>
                <hr>

                <p><?php echo $definition['Definition']; ?></p>
                <hr>
                <div id="referenceMaterial">
                <h4>Reference Material</h4>
				<ul><?php echo $definition['NISTSourcesName']; ?></ul>
                <p > <?php $citation= $definition['Author'].'. '.$definition['Year'].'.'.$definition['ArticleName'].'. '.$definition['Source'].' '.$definition['ArticleLink'] ?></p>
            <?php echo '<textarea id="verse">'.$citation.'</textarea>' ?>
           
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
        
</body>

</html>