<!DOCTYPE html>
<html class="definitions">
    <head>
        <title>SALT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles.css">



    </head>
    <body class="definitions">

            <div class="wrapper">

            <form id="contact" method="POST" action="add-content.php">
                <label for="myName">*Name:</label> 
                <input type="text" name="myName" id="myName" required="required">
				
<!-- consider name field    after value-->
                <label for="category">Choose a Category</label>
                <select name="category" id="category">
                    <option value="category1">category1</option>
                    <option value="category2">category2</option>
                    <option value="category3">category3</option>
                    <option value="category4">category4</option>
                </select>
			
                <label for="myWord">*Word:</label>
                <input type="text" name="myWord" id="myWord" required="required">
                
                <label for="myDefinition">*Definition</label>
                <textarea name="myDefinition" id="myDefinition" rows="5" cols="43"></textarea>
            
                <label for="mySource">*Source:</label> 
                <input type="text" name="mySource" id="mySource" required="required">
				
<!-- consider name field    after value-->


                <select name="referenceMaterials" id="referenceMaterials">
                    <option value="reference1">category1</option>
                    <option value="reference2">category2</option>
                    <option value="reference3">category3</option>
                    <option value="reference4">category4</option>
                </select>

                <div id="myButtons">
                    <input type="submit" id="myPreview" value="Preview"> 
                </div>
                </form>
        </div><!--End Wrapper-->
            
            

    </body>
</html>