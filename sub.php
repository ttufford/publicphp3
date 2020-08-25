
<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html id="submithtml">
    <head>
        <title>tester</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">
        <script type="text/javascript" src="script.js"></script>

    </head>
<body id="browseBody">
    <!-- <div class="header">
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
      </div>     -->

  <div id="innerwrapper">
    
      <h4>Fill the form to add an entry to the library.</h4>

      <div id="submitContent">
        <form  id="contact" method="POST" action="add-content.php">
            <div id="nameBox">

                    <label for="myName">*Your Name:</label> 
                    <input type="text" name="SubmittedBy" id="SubmittedBy" required="required">
                    </div>
					<!--
                    <div id="categoryBox">
                <label for="category">Choose a Category</label>
                <select name="category" id="category">
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <option value="category3">Category 3</option>
                    <option value="category4">Category 4</option>
                </select>
            </div> 
			-->
            <div id="wordBox"> 
                <label for="Word">*Word:</label>
                <input type="text" name="Word" id="Word" required="required">
            </div>   
            <div id="definitionBox">  
                <label for="Definition">*Definition</label>
                <textarea name="Definition" id="Definition"></textarea>
            </div> 
            <div id="sourceBox">
                <label for="PublicationName">*Publication Name:</label> 
                <input type="text" name="PublicationName" id="PublicationName" required="required">
            </div>
			<div id="sourceBox">
                <label for="NISTSourcesName">*NIST Sources Name:</label> 
                <input type="text" name="NISTSourcesName" id="NISTSourcesName" required="required">
            </div>
			<div id="sourceBox">
         <label for="ArticleName">Article Name:</label> 
         <input type="text" name="ArticleName" required="">
      </div>
	  
			<div id="sourceBox">
         <label for="ArticleName">Website:</label> 
         <input type="text" name="ArticleName" required="" class="form-control">
      </div>
			<div id="sourceBox">
         <label for="Author">Author:</label> 
         <input type="text" name="Author" required="" class="form-control">
      </div>
	  
			<div id="sourceBox">
         <label for="Year">Year:</label> 
         <input type="text" name="Year" required="" class="form-control">
      </div>
	  
			<div id="sourceBox">
         <label for="ArticleLink">Article Link:</label> 
         <input type="text" name="ArticleLink" required="" class="form-control">
      </div>
			<div id="sourceBox">
         <label for="VideoLink">Video Link:</label> 
         <input type="text" name="VideoLink" required="" class="form-control">
      </div>
			<!--
            <div id="ReferenceBox">
                <label for="myReferenceMaterials">*Reference Materials:</label> 

                <select name="myReferenceMaterials" id="myReferenceMaterials">
                    <option value="Reference1">Reference 1</option>
                    <option value="Reference">Reference 2</option>
                    <option value="category3">Reference 3</option>
                    <option value="category4">Reference 4</option>
                </select>
            </div>
			-->
                <div id="myButtons">
                    <input type="submit" id="myPreview" value="Submit"> 
                </div>
            </form>
        </div>
    </div><!--End wrapper-->


</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="previewForm/previewForm.js"></script>
<!-- <script>
$(document).ready(function() {
	$('#contact').previewForm();
});
</script> -->
</body>
</html>