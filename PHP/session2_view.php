<?php
session_start();

$questions = [
    "What is your favorite color?",
    "What is your quest?",
    "What is the capital of Assyria?",
    "What is your favorite food?",
    "What is the velocity of an unladen swallow?"
];
if (!isset($_SESSION['current_q'])) {
    $_SESSION['current_q'] = 0;
    $_SESSION['answers'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $idx = $_SESSION['current_q'];
    if ($idx < count($questions)) {
        $_SESSION['answers'][$idx] = htmlspecialchars($_POST['answer']);
        $_SESSION['current_q']++;
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
$current_index = $_SESSION['current_q'];
$answers = $_SESSION['answers'];
$is_finished = $current_index >= count($questions);
$current_question_text = $is_finished ? null : $questions[$current_index];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Example 2</title>
</head>
<body>
    <h1>Session Q&A</h1>
    <?php if (!$is_finished): ?>
        <form method="POST" action="">
            <p>
                <strong>Question <?php echo $current_index + 1; ?>:</strong> 
                <?php echo $current_question_text; ?>
            </p>
            <input type="text" name="answer" required>
            <button type="submit">Submit</button>
        </form>
    <?php else: ?>
        <p><strong>All questions answered!</strong></p>
    <?php endif; ?>
    <hr>

    <h3>Previous Answers:</h3>
    <?php if (!empty($answers)): ?>
        <ul>
            <?php for ($i = 0; $i < count($answers); $i++): ?>
                <li>
                    <strong><?php echo $questions[$i]; ?></strong>: 
                    <?php echo $answers[$i]; ?>
                </li>
            <?php endfor; ?>
        </ul>
    <?php else: ?>
        <p>No answers submitted yet.</p>
    <?php endif; ?>

    <form method="POST" action="">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
