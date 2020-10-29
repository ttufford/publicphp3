<?php
// error_reporting(E_ALL ^ E_NOTICE);
session_start();
require 'dbconnect.php';
$collection = $manager->mydb->approved;

// include_once('header.php');




// $filter = [];
$result = $collection->find();
                $wordArray = iterator_to_array($result);


                //GOOD one
                    // $users = array("access control","AAA protocol");
                    //   $result = $collection->find(array('Word' => 
                    //   array('$in' => $users)
                    // )
                    // );
                    // $wordArray = iterator_to_array($result);


//resets the count after 24 hours
// $result3 = $collection->updateMany(array('time' => array('$lt' => '$currentday')), array('$unset' => array('seq' => True)));

//this query will bring you every document that was queried within the last 48 hours
// $result4 = $collection->find(array('time' => array('$gte' => '$day1')));



?>
<!DOCTYPE html>
<html id="browsehtml">
    <head>
        <title>Salt | 
            
    </title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    </head>

    <body>
      <button>Back</button>
    <div id="innerwrapper">
    <form action="definitions-tt-flashcardSelected.php" method="POST" class="my-form">  
        <div id="flashcardBody">
      <h1>Flashcard Deck 1</h1>

        <select class="js-example-tags" multiple="multiple" name="FlashcardWords[]">
        
     <?php
               foreach ($wordArray as $title) {
              

                echo '<option value="'.$title['Word'].'">'.$title['Word'].'</option>';                
            } 
     ?>
</select>
<div class="js-example-tags-container"></div>

<div>    
<input type="submit" name="submit" value="Submit">

</div>
</form>
</div></div>

<script>
$(document).ready(function() {
  $(".js-example-tags").select2({
    tags: true
  }).on('change', function() {
    var $selected = $(this).find('option:selected');
    var $container = $(this).siblings('.js-example-tags-container');

    var $list = $('<ul>');
    $selected.each(function(k, v) {
      var $li = $('<li class="tag-selected"><a class="destroy-tag-selected">×</a>' + $(v).text() + '</li>');
      $li.children('a.destroy-tag-selected')
        .off('click.select2-copy')
        .on('click.select2-copy', function(e) {
          var $opt = $(this).data('select2-opt');
          $opt.attr('selected', false);
          $opt.parents('select').trigger('change');
        }).data('select2-opt', $(v));
      $list.append($li);
    });
    $container.html('').append($list);
  }).trigger('change');
});


// function doSomething() {
//   // var swrs = $('.js-example-tags').find(':selected');
//   // var swr = swrs.toString();

//     // alert(swrs);
//     var flashcardArray = $(".js-example-tags").select2("val")
//     var myString = JSON.stringify(flashcardArray);

//     alert(myString);

//     return false;
// }

</script>

</body>

</html>
