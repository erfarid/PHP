<?php
$errors = [];
$students = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors[] = "Age must be a valid number.";
    }

    if (empty($errors)) {
        $studentData = "Name: $name, Age: $age\n";
        
        $file = 'students.txt';
        if (file_put_contents($file, $studentData, FILE_APPEND)) {
            echo "<p>Student added successfully!</p>";
        } else {
            $errors[] = "Failed to save student data to the file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Student</title>
</head>
<body>
    <h1>New student</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        Name: <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" /> <br>
        Age: <input type="text" name="age" value="<?php echo isset($age) ? htmlspecialchars($age) : ''; ?>" /> <br>
        <button type="submit">Add student</button>
    </form>
</body>
</html>
