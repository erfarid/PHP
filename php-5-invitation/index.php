<?php
$errors = [
    'full_name' => '',
    'wizards' => '',
    'pet' => '',
    'agree' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    // Validate Name
    if (empty($_GET['full_name'])) {
        $errors['full_name'] = "Child's name is required.";
    }
    else if (strlen($_GET['full_name']) < 6) {
        $errors['full_name'] = "Child's name must be at least 6 characters long.";
    }
    else if (strpos($_GET['full_name'], ' ') === false) {
        $errors['full_name'] = "Child's name must include at least one space.";
    }

    // Validate Wizards in Family
    if (empty($_GET['wizards'])) {
        $errors['wizards'] = "Number of wizards is required.";
    }
    else if (!filter_var($_GET['wizards'],FILTER_VALIDATE_INT)){
        $errors['wizards'] = "Number of wizards must be an integer.";
    }
    else if($_GET['wizards'] < 1 || ($_GET['wizards'] >256)){
        $errors['wizards'] = "Number of wizards must be in between 1 and 256 integer.";

    }


    // (1 point) The number of wizards in family must be between 1 and 256, inclusive.

    // Validate Pet
    if (empty($_GET['pet'])) {
        $errors['pet'] = "Selecting a pet is required.";
    }
    if (empty($_GET['agree'])) {
        $errors['agree'] = "You must consent to the processing of your data.";
    }
}
// b. Name length validation

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>5. Invitation</h1>
    <form action="index.php" method="GET" novalidate>
        <!-- disable build in brwoser validation  -->
        <label for="full_name">Name of child:</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($_GET['full_name'] ?? ''); ?>">
        <span class="error-message"><?php echo $errors['full_name']; ?></span>
       
        <!-- Wizards in Family -->
        <label for="wizards">Wizards in family:</label>
        <input type="text" name="wizards" value="<?php echo htmlspecialchars($_GET['wizards'] ?? ''); ?>">
        <span class="error-message"><?php echo $errors['wizards']; ?></span>
       
       
        <label for="pet">Accompanying pet:</label>
            <select name="pet">
            <option value="">Select a pet</option>
            <option value="owl" <?php if (($_GET['pet'] ?? '') === 'owl') echo 'selected'; ?>>Owl</option>
            <option value="cat" <?php if (($_GET['pet'] ?? '') === 'cat') echo 'selected'; ?>>Cat</option>
            <option value="toad" <?php if (($_GET['pet'] ?? '') === 'toad') echo 'selected'; ?>>Toad</option>
            <option value="rat" <?php if (($_GET['pet'] ?? '') === 'rat') echo 'selected'; ?>>Rat</option>
        </select>
        <span class="error-message"><?php echo $errors['pet']; ?></span>

        <input type="checkbox" name="agree" id="agree" <?php if (isset($_GET['agree'])) echo 'checked'; ?>>
        <label for="agree" style="display: inline-block">I consent to the processing of my data.</label>
        <span class="error-message"><?php echo $errors['agree']; ?></span>


        <input type="submit" value="Send application">
    </form>
    
    <div id="success">
        <h2>Thank you for your application!</h2>
        If we decide to admit your child, we will notify you by owl mail shortly.
    </div>

    <div class="help">
        <h2>Links for testing</h2>
        <ul>
            <li><a href="index.php?">No data sent</a></li>
            <li><a href="index.php?full_name=L&wizards=4&pet=owl&agree=on">Name too short</a></li>
            <li><a href="index.php?full_name=LunaLovegood&wizards=4&pet=owl&agree=on">No space in name</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=four&pet=owl&agree=on">Wizard count is not a number</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=3.14&pet=owl&agree=on">Wizard count is not an integer</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=0&pet=owl&agree=on">Wizard count is too low</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=300&pet=owl&agree=on">Wizard count is too high</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=4&agree=on">Missing pet</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=4&pet=lizard&agree=on">Invalid pet</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=4&pet=owl">Missing consent to data processing</a></li>
            <li><a href="index.php?full_name=Luna%20Lovegood&wizards=4&pet=owl&agree=on">Correct input</a></li>
        </ul>
    </div>
</body>



</html>