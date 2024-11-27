<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>
    <form method="POST"> <!-- Fixed the typo 'mehtod' to 'method' -->
        <label for="number">Enter the number you want to find the factorial of:</label> <!-- Added 'for' attribute to label -->
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Calculate Factorial">
    </form>
    
    <?php
    echo "Hello World <br>";
    $name = "farid";
    echo "Hello {$name}<br>";
    echo date("h:i:s A");

    // Factorial calculation function
    function factorialcal($num) {
        $fact = 1;
        for ($i = 1; $i <= $num; $i++) { // Fixed the loop condition to $i <= $num
            $fact *= $i;
        }
        return $fact;
    }

    
        if(isset($_POST["number"])) {
        $number = $_POST['number']; 
        echo "<br>The factorial of {$number} is: " . factorialcal($number); 
        }
    
    ?>
</h1>
    
</body>
</html>
