<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // for ($i = 1; $i < 10; $i++) {  
    //     echo "<p style='font-size: " . (10 * $i) . "px;'>Hello World!</p>";

    //  }
     //Error messages are given in an array. Show them as an HTML list!
     $errormessage =["username i srequred" ,"password must be at least 8 character ","please try more secure password "];
     if(!empty($errormessage)){
        echo "<ol>";
        foreach ($errormessage as $msg) {
            echo"<li> $msg</li>";
        }
        echo "</ol>";
     }
     else{
        echo "No Error Found ";
     }
     echo count($errormessage) ;

     
    ?>
    <!-- //On a movie web page we would like to select a movie category from a dropdown list.
      However, the backend system needs not the text of the category but its identifier value. Eg 5 - Action, 4 - Drama, 8 - Comedy. Find out the data structure,
      and then generate the dropdown list based on this data structure! -->
    
</body>
</html>