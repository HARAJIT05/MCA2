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