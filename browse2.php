<?php
//Including Database configuration file.
require 'dbconnect.php';
//include_once('header.php');

//    $result = $collection->find(array(),array("myName"=>1)); 
   $filter = [];
   $options = ['sort' => ['Word' => 1]];
   //$result = $collection->find($filter,$options);
   //$wordArray = iterator_to_array($result);

       ?>


<!DOCTYPE html>
<html>
    <head>
    <title>SALT</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
	
	<div class="header">
        <a href="index.php"><img id="headerLogo" src="Images\Logo.svg"></a>
                <div id="headerbox">
                    <nav>
                        <ul>
                            <li><a href="browse.php">Browse</a></li>
                            <li><a href="aboutus.html">About Us</a></li>
                            <li><a href="reports.html">Reports</a></li>
                        </ul>
                    </nav>
                    <div id="headersearchbar">
                    <form autocomplete="off" id="search" method="POST" action="jdeltest.php">
                        <label for="search-input"></label>
                            <input aria-label="Search" id="search-input"  name="query" placeholder="Search" type="search">
                            <button>
                            <svg viewbox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                <path d="M0 0h24v24H0z" fill="none">
                            </svg>
                            </button> 
                        </form>
                          <div id="block">
                          </div>
                   
                    </div>
                </div>
          </div>    

    <body id="browseBody">
        
      <div id="jumper">
        <ul>
            <li><a href="#letter#">#</a></li>
            <li><a href="#letterA">A</a></li>
            <li><a href="#letterB">B</a></li>
            <li><a href="#letterC">C</a></li>
            <li><a href="#letterD">D</a></li>
            <li><a href="#letterE">E</a></li>
            <li><a href="#letterF">F</a></li>
            <li><a href="#letterG">G</a></li>
            <li><a href="#letterH">H</a></li>
            <li><a href="#letterI">I</a></li>
            <li><a href="#letterJ">J</a></li>
            <li><a href="#letterK">K</a></li>
            <li><a href="#letterL">L</a></li>
            <li><a href="#letterM">M</a></li>
            <li><a href="#letterN">N</a></li>
            <li><a href="#letterO">O</a></li>
            <li><a href="#letterP">P</a></li>
            <li><a href="#letterQ">Q</a></li>
            <li><a href="#letterR">R</a></li>
            <li><a href="#letterS">S</a></li>
            <li><a href="#letterT">T</a></li>
            <li><a href="#letterU">U</a></li>
            <li><a href="#letterV">V</a></li>
            <li><a href="#letterW">W</a></li>
            <li><a href="#letterX">X</a></li>
            <li><a href="#letterY">Y</a></li>
            <li><a href="#letterZ">Z</a></li>
        </ul>
     </div>
     
      <div id="innerwrapper">

          <div id="browsebox2">
                <!-- <h3 id="letterA">A</h3>
                <ul> -->

                    

        </div><!--End wrapper-->
        <script src="app.js"></script>
</body>

</html>