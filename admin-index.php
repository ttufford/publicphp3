<?php
//db connection
require 'dbconnect.php';
require 'vendor/autoload.php';
//change later. title2 no work
session_start();
//https://stackoverflow.com/questions/7115852/notice-undefined-index-zzzzzzwtf
error_reporting(E_ALL ^ E_NOTICE)
?>
<!DOCTYPE html>

<html>
<head>
   <title>Admin GUI - Pending Words</title>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  
  <link rel="stylesheet" href="styles.css">


<script>
$(document).ready(function() {
    $('#table_id').DataTable( {
        "sScrollX": true
    } );

    
} );
</script>
</head>
<body id="eadBody"> 
   <div id="eadHeader">
      <h1>Add, edit, or delete words</h1>
      <a href="approved-index.php" class="eadApproved">Go to Approved Words</a>
	   <a href="admin-create.php" class="eadAddNew">Add Word</a>
	   <a href="admin-home.php" class="eadHome">Dashboard</a>

   </div>
  

<?php
  // if(isset($_SESSION['success'])){
    //  echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
  // }
?>

<table id="table_id" class="display" style="width:100%">
      <thead>
         <tr>  
         <th>edit, approve, delete</th>

         <th>Submitted by</th>
               <th>Word</th>
               <th>Definition</th>
               <!-- <th>Publication Name</th> -->
               <!-- <th>NIST Source</th> -->
               <th>Article 1</th>
              <th>Article 2</th>
              <th>Article 3</th>

              <th>Video Link</th>

               <!-- <th>edit, approve, delete</th> -->


         </tr>
      </thead>
<tbody>



<?php

$options=[];	  

$result = $collection->find([], $options);


//$result1 = $collection->find([]);
//count the number of entries in the db and store them as a variable [countrow]


     foreach($result as $entry) {
		      // while($entry = array($result)) {


         echo "<tr >";


         echo "<td><div class='eadindexbuttons'><a href='admin-edit.php?id=".$entry->_id."''><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='20' height='20' viewBox='0 0 24 24' stroke-width='2.5' stroke='#CDDC39' fill='none' stroke-linecap='round' stroke-linejoin='round'>
         <path stroke='none' d='M0 0h24v24H0z'/>
         <path d='M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3' />
         <path d='M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3' />
         <line x1='16' y1='5' x2='19' y2='8' />
       </svg>Edit</a></div>
       <div class='eadindexbuttons'><a href='admin-approve.php?id=".$entry->_id."' class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-check' width='18' height='18' viewBox='0 0 24 24' stroke-width='2.5' stroke='#4CAF50' fill='none' stroke-linecap='round' stroke-linejoin='round'>
         <path stroke='none' d='M0 0h24v24H0z'/>
         <path d='M5 12l5 5l10 -10' />
       </svg>Approve</a></div>
       <div class='eadindexbuttons'><a href='admin-delete.php?id=".$entry->_id."' class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-ban' width='20' height='20' viewBox='0 0 24 24' stroke-width='2.5' stroke='#F44336' fill='none' stroke-linecap='round' stroke-linejoin='round'>
         <path stroke='none' d='M0 0h24v24H0z'/>
         <circle cx='12' cy='12' r='9' />
         <line x1='5.7' y1='5.7' x2='18.3' y2='18.3' />
       </svg>Delete</a></div>";
         echo "</td>";
         
         echo "<td>".$entry->SubmittedBy."</td>";


        





         echo "<td>".$entry->Word."</td>";

		   echo "<td>".$entry->Definition."</td>";
        //  echo "<td>".$entry->PublicationName."</td>";
        //  echo "<td>".$entry->NISTSourcesName."</td>";
         echo "<td><table>
         <tbody><tr>
         <td>Article Name:</td><td>".$entry->ArticleName."</td></tr>
         <tr><td> Author:</td><td>".$entry->Author."</td></tr>
         <tr><td>Website</td><td>".$entry->Website."</td></tr>
         <tr><td>Year</td><td>".$entry->Date."</td></tr>
         <tr><td>ArticleLink</td><td>".$entry->Link."</td></tr>


         </tbody></table></td>"; 
         echo "<td><table>
         <tbody><tr>
		 
         <td>Article Name:</td><td>".$entry->ArticleName2."</td></tr>
         <tr><td> Author:</td><td>".$entry->Author2."</td></tr>
         <tr><td>Website</td><td>".$entry->Website2."</td></tr>
         <tr><td>Year</td><td>".$entry->Date2."</td></tr>
         <tr><td>ArticleLink</td><td>".$entry->Link2."</td></tr>

         </tbody></table></td>"; 
         echo "<td><table>
         <tbody><tr>
         <td>Article Name:</td><td>".$entry->ArticleName3."</td></tr>
         <tr><td> Author:</td><td>".$entry->Author3."</td></tr>
         <tr><td>Website</td><td>".$entry->Website3."</td></tr>
         <tr><td>Year</td><td>".$entry->Date3."</td></tr>
         <tr><td>ArticleLink</td><td>".$entry->Link3."</td></tr>

         </tbody></table></td>";
         echo "<td>".$entry->VideoLink."</td>";	




         echo "</tr>";
         
 
 

        
      };


   ?>


   </tbody>
</table>



</body>
</html>


