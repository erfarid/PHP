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

// Function to display student information in a table
function displayStudentTable($students) {
    echo "<table border='1'>";
    echo "<thead><tr><th>Name</th><th>Neptune ID</th><th>Date of Birth</th><th>Sex</th></tr></thead>";
    echo "<tbody>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['neptune_id']}</td>";
        echo "<td>{$student['dob']}</td>";
        echo "<td>{$student['sex']}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

// Function to find and return the oldest student
function getOldestStudent($students) {
    $oldestStudent = null;
    foreach ($students as $student) {
        if (!$oldestStudent || strtotime($student['dob']) < strtotime($oldestStudent['dob'])) {
            $oldestStudent = $student;
        }
    }
    return $oldestStudent;
}

// Function to check if there is a girl among the students
function hasGirl($students) {
    foreach ($students as $student) {
        if ($student['sex'] === 'Female') {
            return true;
        }
    }
    return false;
}

// Function to display the number of boys and girls as color bars
function displayGenderBars($students) {
    $boyCount = 0;
    $girlCount = 0;
    
    foreach ($students as $student) {
        if ($student['sex'] === 'Male') {
            $boyCount++;
        } elseif ($student['sex'] === 'Female') {
            $girlCount++;
        }
    }

    echo "<div class='bar boys' style='width: " . ($boyCount / count($students)) * 100 . "%;'></div>";
    echo "<div class='bar girls' style='width: " . ($girlCount / count($students)) * 100 . "%;'></div>";
    echo "<p>Boys: $boyCount, Girls: $girlCount</p>";
}

// Separate functions for displaying individual data:
function displayOldestStudent($oldestStudent) {
    echo "<h3>Oldest Student</h3>";
    echo "<p>Name: {$oldestStudent['name']}<br>";
    echo "Date of Birth: {$oldestStudent['dob']}</p>";
}

function displayGirlStatus($hasGirl) {
    echo "<h3>Is there a Girl among the students?</h3>";
    echo "<p>" . ($hasGirl ? 'Yes' : 'No') . "</p>";
}

function displayBoysAndGirls($students) {
    $boyCount = 0;
    $girlCount = 0;
    
    foreach ($students as $student) {
        if ($student['sex'] === 'Male') {
            $boyCount++;
        } elseif ($student['sex'] === 'Female') {
            $girlCount++;
        }
    }

    echo "<h3>Number of Boys and Girls</h3>";
    echo "<div class='bar boys' style='width: " . ($boyCount / count($students)) * 100 . "%;'></div>";
    echo "<div class='bar girls' style='width: " . ($girlCount / count($students)) * 100 . "%;'></div>";
    echo "<p>Boys: $boyCount, Girls: $girlCount</p>";
}

// Get the calculated data
$oldestStudent = getOldestStudent($students);
$hasGirl = hasGirl($students);

// Display all information by calling the respective functions
?>

<h3>Student Table</h3>
<?php displayStudentTable($students); ?>

<?php displayOldestStudent($oldestStudent); ?>

<?php displayGirlStatus($hasGirl); ?>

<?php displayBoysAndGirls($students); ?>

</body>
</html>
