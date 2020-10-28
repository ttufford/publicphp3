<?php

    require_once 'library.php';
	error_reporting(E_ALL ^ E_NOTICE);

    if(chkLogin()){
        header("Location: admin-home.php");
    }
?>
<html id="submithtml">
    <head>
        <title>tester</title>
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
                        <li><a href="browse.php">Browse</a></li>
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
    
      <h4>Login</h4>

            <form class="form-horizontal" method="post" action="login_action.php">
			<div class="admin-container">
                    <label class="sr-only" for="uname">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" required>
					
					<br>
					
                    <label class="sr-only" for="psw">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="pass" placeholder="Password" required>
					
                <button id="admin-loginbtn" type="submit" name="login">Sign in</button>
				
						 Not a member? <a href="register.php">Click here to register</a>
						 
						        </div>
 

				
            </form>
        </div>
		</div>
    </body>
</html>