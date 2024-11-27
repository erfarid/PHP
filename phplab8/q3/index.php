<!-- On a movie web page we would like to select a movie category from a dropdown list. 
However, the backend system needs not the text of the category but its identifier value. 
Eg 5 - Action, 4 - Drama, 8 - Comedy. Find out the data structure, 
and then generate the dropdown list based on this data structure! -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" ,method ="POST">
        <label for="Category">Category</label>
        <select name="category" id="category">


        <?php
        $categories = [
            5 => "Action",
            4 => "Drama",
            8 => "Comedy",
            9 => "Horror",
            7 => "Science Fiction"
        ];
        foreach($categories as $id =>$name) 
        {
            echo "<option value = \"$id\">$name</option>";
        
        }
        ?>

        </select> 
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>