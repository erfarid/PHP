<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>

    <?php
    // Array of students
    $students = [
      ['name' => 'Student1', 'age' => 20],
      ['name' => 'Student2', 'age' => 10],
      ['name' => 'Student3', 'age' => 30],
      ['name' => 'Student4', 'age' => 20],
      ['name' => 'Student5', 'age' => 10],
    ];

    // Get the 'age' parameter from the URL
    if (isset($_GET['age'])) {
        $ageFilter = $_GET['age'];
    } else {
        $ageFilter = null;
    }

    if ($ageFilter !== null && is_numeric($ageFilter)) {
        // Filter students by the given age
        $filteredStudents = array_filter($students, function ($student) use ($ageFilter) {
            return $student['age'] == $ageFilter;
        });
    } else {
        // Show the full list if no valid age parameter is provided
        $filteredStudents = $students;
    }

    // Generate the list
    echo '<ul>';
    foreach ($filteredStudents as $student) {
        echo '<li>' . htmlspecialchars($student['name']) . ' (' . htmlspecialchars($student['age']) . ')</li>';
    }
    echo '</ul>';
    ?>

    <p>To filter by age, you can add <code>?age=10</code> or any other valid age to the URL.</p>
</body>
</html>
