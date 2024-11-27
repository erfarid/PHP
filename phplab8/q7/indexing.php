<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        .bar {
            width: 200px;
            height: 20px;
            margin-top: 10px;
        }
        .boys {
            background-color: blue;
        }
        .girls {
            background-color: pink;
        }
    </style>
</head>
<body>

<h2>Student Information</h2>

<?php
// Sample student data
$students = [
    ['name' => 'John Doe', 'neptune_id' => 'A12345', 'dob' => '1998-05-15', 'sex' => 'Male'],
    ['name' => 'Jane Smith', 'neptune_id' => 'B67890', 'dob' => '2000-11-22', 'sex' => 'Female'],
    ['name' => 'Alex Johnson', 'neptune_id' => 'C11223', 'dob' => '1999-07-30', 'sex' => 'Male'],
    ['name' => 'Emily Davis', 'neptune_id' => 'D44556', 'dob' => '2001-02-17', 'sex' => 'Female']
];

// Initialize variables for counting boys, girls, and checking if there is a girl
$boyCount = 0;
$girlCount = 0;
$hasGirl = false;
$oldestStudent = null;

// Loop through each student to gather data
foreach ($students as $student) {
    // Count boys and girls
    if ($student['sex'] === 'Male') {
        $boyCount++;
    } elseif ($student['sex'] === 'Female') {
        $girlCount++;
        $hasGirl = true; // Found a girl
    }

    // Find the oldest student
    if ($oldestStudent === null || strtotime($student['dob']) < strtotime($oldestStudent['dob'])) {
        $oldestStudent = $student;
    }
}
?>

<h3>Student Table</h3>
<table border="1">
    <thead>
        <tr><th>Name</th><th>Neptune ID</th><th>Date of Birth</th><th>Sex</th></tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['neptune_id']); ?></td>
            <td><?php echo htmlspecialchars($student['dob']); ?></td>
            <td><?php echo htmlspecialchars($student['sex']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Oldest Student</h3>
<p>Name: <?php echo htmlspecialchars($oldestStudent['name']); ?><br>
Date of Birth: <?php echo htmlspecialchars($oldestStudent['dob']); ?></p>

<h3>Is there a Girl among the students?</h3>
<p><?php echo $hasGirl ? 'Yes' : 'No'; ?></p>

<h3>Number of Boys and Girls</h3>
<div class="bar boys" style="width: <?php echo ($boyCount / count($students)) * 100; ?>%;"></div>
<div class="bar girls" style="width: <?php echo ($girlCount / count($students)) * 100; ?>%;"></div>
<p>Boys: <?php echo $boyCount; ?>, Girls: <?php echo $girlCount; ?></p>

</body>
</html>
