<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items with Checkboxes</title>
</head>
<body>

<!-- GET: Sends form data as part of the URL, visible in the browser’s address bar.
POST: Sends form data in the body of the HTTP request, not visible in the URL. -->
<h2>Select Items</h2>

<form action="process_selection.php" method="post">

    <?php
    // Associative array of item IDs and descriptions
    $items = [
        23 => "Pen Drive",
        24 => "Flash Drive",
        25 => "External Hard Drive",
        26 => "USB Cable",
        27 => "Mouse"
    ];

    // Loop through the items and create a checkbox for each one
    foreach ($items as $id => $description) {
        echo "<label><input type='checkbox' name='items[]' value='$id'> $description</label><br>";
        //by clicking on text we can select the cheakbox that is done by label tag 
        //here the items[] as an array send the data to server 
        
    }

    ?>
            
    <button type="submit">Submit</button>
</form>

</body>
</html>
