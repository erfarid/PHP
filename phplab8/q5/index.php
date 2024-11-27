<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
</head>
<body>

<h2>Survey Questions</h2>

<form action="process_survey.php" method="post">
    <?php
    // Example questions and possible answers
    // Since $questions is a numerically indexed array, $index will be 0, 1, 2, 
    $questions = [
        [
            'question' => 'What is the capital of France?',
            'answers' => ['Berlin', 'Madrid', 'Paris', 'Rome'],
            'correct_answer' => 'Paris'
        ],
        [
            'question' => 'Which is the largest planet?',
            'answers' => ['Earth', 'Jupiter', 'Mars', 'Saturn'],
            'correct_answer' => 'Jupiter'
        ]
    ];
    //The value of the selected radio button that will be sent to the server when the form is submitted.
    // Loop through the questions
    foreach ($questions as $index => $question) {
        echo "<p><strong>{$question['question']}</strong></p>";
          

        // Loop through the answers for each question
        foreach ($question['answers'] as $answer) {
            // Generate radio buttons, all in the same group for each question
            echo "<label><input type='radio' name='question{$index}' value='$answer'> $answer</label><br>";
        }
    }
    ?>
    <!-- in strong tag the text is important thats by default browser makes in bold -->

    <button type="submit">Submit</button>
</form>

</body>
</html>
