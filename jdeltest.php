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
$result = $collection->find(array('$or' => array(array("myName" => $term),
array("myDefinition" => array('$regex' => $term)))));



//$result = $collection->find(array('myName' => $term, 'myDefinition' => $term));
//$result1 = $collection->find( ['myDefinition' => $term] );
//$result=$collection->findOne(array('myName' => '$term', 'myDefinition' => '$term'));

}





  if (empty($term)) {
	$result = $collection->find();
  } 
  


  
  

?>
<!DOCTYPE html>



		<table class='table table-bordered'>
                     <thead>
                        <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Word</th>
						  <th>Definition</th>
						  <th>Source</th>
                          <th>Reference Materials</th>
                        </tr>
                     </thead>
					 <?php 
					 foreach ($result as $entry) {
						 ?>
					<tr>
					    <td><?php echo $entry['myName']; ?></td>
                        <td><?php echo $entry["category"];  ?></td>
                        <td><?php echo $entry["myWord"];  ?></td>
                        <td><?php echo $entry["myDefinition"];  ?></td>
                        <td><?php echo $entry["mySource"];  ?></td>
                        <td><?php echo $entry["referenceMaterials"];  ?></td>
						


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
<?

?>
	

