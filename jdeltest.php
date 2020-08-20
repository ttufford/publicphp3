<?php
require 'vendor/autoload.php'; // include Composer's autoloader

//db connection
      require 'dbconnect.php';


$options = [
    'sort' => ['_id' => -1],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $term = $_REQUEST['term'];
 

//green comment below is what you've been using and works
//$result = $collection->find( [ 'myName' => $term] );

//shell OR query
//db.users.find({$or : [{"myName": "wordup"},{"myDefinition" :{$regex:".*wordup*"}}]})
$result = $collection->find(array('$or' => array(array("myName" => array('$regex' => $term)),
array("myDefinition" => array('$regex' => $term)))));

//$result = $collection->find(array('myName' => $term, 'myDefinition' => $term));
//$result1 = $collection->find( ['myDefinition' => $term] );
//$result=$collection->findOne(array('myName' => '$term', 'myDefinition' => '$term'));

//case insensitive
$result=$collection->find(['Word' => new MongoDB\BSON\Regex('^'.$term, 'i')]);

}





  //if (empty($term)) {
	//$result = $collection->find();
  //} 
  


  
  

?>
<!--
<!DOCTYPE html>



		<table class='table table-bordered'>
                     <thead>
                        <tr>
                          <th>Submitted by</th>
						  <th>Word</th>
						  <th>Definition</th>
						  <th>Publication Name</th>
						  <th>NIST Source</th>
                          <th>Article Name</th>
                          <th>Website</th>
						  <th>Author</th>
						  <th>Year</th>
                          <th>Article Link</th>
                          <th>VideoLink</th>
                        </tr>
                     </thead>
					 <?php 
					 foreach ($result as $entry) {
						 ?>
					
					    <?php echo $entry['SubmittedBy']; ?>
					  <?php echo $entry['Word']; ?>
					  	<?php echo $entry["Definition"];  ?>
                        <?php echo $entry["PublicationName"];  ?>
						<?php echo $entry["NISTSourcesName"];  ?>
                        <?php echo $entry["ArticleName"];  ?>
                        <?php echo $entry["Website"];  ?>
                        <?php echo $entry["Author"];  ?>
                        <?php echo $entry["Year"];  ?>
                       <?php echo $entry["ArticleLink"];  ?>
                       <?php echo $entry["VideoLink"];  ?>
					   
						




                      </tr>
                   <?php //$i++;  
                    
					 }
                  ?>
                    </table>
					


					<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
$(function(){
  $('.editlink').on('click', function(){
    var id = $(this).data('id');
    if(id){
      $.ajax({
          method: "GET",
          url: "record_ajax.php",
          data: { id: id}
        })
        .done(function( result ) {
          result = $.parseJSON(result);
          $('#myName').val(result['mySource']);
          $('#category').val(result['category']);
          $('#myWord').val(result['myWord']);
          $('#myDefinition').val(result['myDefinition']);
          $('#mySource').val('mySource');
          $('#form1').attr('action', 'record_edit.php');
        });
      }
    });
});

</script>
					
</html>
-->
<?

?>
	

