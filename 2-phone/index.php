<?php
$errors = [
    'fullname' => '',
    'email' => '',
    'colour' =>'',
    'cardnumber' =>'',


];


if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    // Validate Name
    if (empty($_GET['fullname'])) {
        $errors['fullname'] = "full name is requried.";
    } else if (strpos($_GET['fullname'], " ") == false) {
        $errors['fullname'] = "full name must be atleast two characters .";
    }



    if (empty($_GET['email'])) {
        $errors['email'] = "email is required .";
    } else if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "email must be in proper format .";
    }


    if (empty($_GET['colour'])) {
        $errors['colour'] = "Please select a color.";
    }

    if(empty($_GET['cardnumber'])){
        $errors['cardnumber'] ="please enter the card detail";
    }elseif (!preg_match('/^\d{4}-\d{4}-\d{4}-\d{4}$/', $_GET['cardnumber'])) {
        $errors['cardnumber'] = "Card number must be in XXXX-XXXX-XXXX-XXXX format.";
    }
    
    
};
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Task 2</title>
</head>

<body>
    <h1>Task 2: You've just won a new phone!</h1>

    <form action="index.php" method="get" novalidate>
        <label for="i1">Your full name:</label>
        <input type="text" name="fullname" id="i1" value="<?php echo htmlspecialchars($_GET['fullname'] ?? ''); ?>">
        <span class="error-message"><?php echo $errors['fullname']; ?></span><br>

        <label for="i2">Your e-mail address:</label>
        <input type="text" name="email" id="i2" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
        <span class="error-message"><?php echo $errors['email']; ?></span><br>

        <!-- condition ? value_if_true : value_if_false; -->
        <label>Choose colour:</label> 
        <span class="error-message"><?php echo $errors['colour']; ?></span><br>
        <input type="radio" value="black" name="colour" id="i3a" <?php echo isset($_GET['colour']) && $_GET['colour'] === 'black' ? 'checked' : ''; ?>>
        <label for="i3a">black</label><br>

        <input type="radio" value="white" name="colour" id="i3b" <?php echo isset($_GET['colour']) && $_GET['colour'] === 'white' ? 'checked' : ''; ?>>
        <label for="i3b">white</label><br>

        <input type="radio" value="gold" name="colour" id="i3c" <?php echo isset($_GET['colour']) && $_GET['colour'] === 'gold' ? 'checked' : ''; ?>>
        <label for="i3c">gold</label><br>

        <input type="radio" value="pink" name="colour" id="i3d" <?php echo isset($_GET['colour']) && $_GET['colour'] === 'pink' ? 'checked' : ''; ?>>
        <label for="i3d">pink</label><br>

        <input type="radio" value="blue" name="colour" id="i3e" <?php echo isset($_GET['colour']) && $_GET['colour'] === 'blue' ? 'checked' : ''; ?>>
        <label for="i3e">blue</label><br>

        


        <label for="i4">Your credit card number:</label>
        <input type="text" name="cardnumber" id="i4" value="<?php echo htmlspecialchars($_GET['cardnumber'] ?? ''); ?>"> 
        <span class="error-message"><?php echo $errors['cardnumber']; ?></span><br>

        <button type="submit">Click here to get your free phone today!</button>
    </form>

    
    <div id="success">
        <h2></h2>
		<div id="progress-bar">
			<div id="progress-bar-fill"></div>
		</div>
	</div>


    <h2>Hyperlinks for testing</h2>
    <a href="index.php?fullname=&email=&cardnumber=">fullname=&email=&cardnumber=</a><br>
    <a href="index.php?fullname=Grandma&email=&cardnumber=">fullname=Grandma&email=&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=&cardnumber=">fullname=Lovely+Grandma&email=&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi&cardnumber=">fullname=Lovely+Grandma&email=nagyi&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&cardnumber=">fullname=Lovely+Grandma&email=nagyi%40webprog.hu&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=red&cardnumber=">fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=red&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=">fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234">fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234.5678.1234.5678">fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234.5678.1234.5678</a><br>
    <a href="index.php?fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234-5678-1234-5678"><span style="color: green">Correct input: </span>fullname=Lovely+Grandma&email=nagyi%40webprog.hu&colour=pink&cardnumber=1234-5678-1234-5678</a><br>

    <script src="index.js"></script>
</body>

</html>