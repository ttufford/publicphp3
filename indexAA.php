<?php	
require 'vendor/autoload.php'; // include Composer's autoloader

//db connection
      require 'dbconnect.php';			
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALT</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <h3>
                  Library Search
                </h3>
				

            </div>
        </div>
                  
<!--  <form id="contact" method="post" action="formfunc.php"> -->
<form id="contact" method="post" action="jdeltest.php">
search: <input type="text" name="term">
<input type="submit" value ="search database">

					</form>
<br>
									<a href="submit.html">contribute a term</a>
									<br>
									<br>
									<a href="admin-index.php">admin</a>

						
						


					
		


            </div>

</body>
</html>



