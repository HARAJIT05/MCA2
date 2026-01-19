<?php
session_start();
$questions = [
    "What is your favorite color?",
    "What is your quest?",
    "What is the capital of Assyria?",
    "What is your favorite food?",
    "What is the velocity of an unladen swallow?"
];
if (!isset($_SESSION['current_index'])) {
    $_SESSION['current_index'] = 1;
}
if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $current_q = $_SESSION['current_index'];

    $_SESSION['answers'][$current_q] = htmlspecialchars($_POST['answer']);
    
    // Move to next question
    $_SESSION['current_index']++;
    
    // Redirect to avoid form resubmission issues on refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session</title>
</head>
<body>

    <h1>Session Q&A</h1>


    <?php if (!empty($_SESSION['answers'])): ?>
        <div class="answer-history">
            <h3>Your Answers So Far:</h3>
            <ul>
                <?php foreach ($_SESSION['answers'] as $q_num => $ans): ?>
                    <li>
                        <strong><?php echo $questions[$q_num]; ?></strong><br>
                        Answer: <?php echo $ans; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Display Current Question or Completion Message -->
    <div class="question-box">
        <?php if ($_SESSION['current_index'] <= count($questions)): ?>
            <form method="POST">
                <label for="answer">
                    <strong>Question <?php echo $_SESSION['current_index']; ?>:</strong>
                    <?php echo $questions[$_SESSION['current_index']]; ?>
                </label>
                <input type="text" name="answer" id="answer" required autofocus autocomplete="off">
                <button type="submit">Submit Answer</button>
            </form>
        <?php else: ?>
            <div class="completed">
                <h2>All questions answered!</h2>
                <p>Thank you for participating.</p>
            </div>
        <?php endif; ?>
        
        <br>
        <form method="POST">
            <button type="submit" name="reset" class="reset-btn">Reset Session</button>
        </form>
    </div>

</body>
</html>
