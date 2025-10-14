<?php

require 'db_config.php';

$name     = trim($_POST['student_name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$level    = trim($_POST['level'] ?? '');
$subject  = trim($_POST['subject'] ?? '');
$feedback = trim($_POST['feedback'] ?? '');

$errors = [];
if ($name === '') {
    $errors[] = "Name is required.";
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email is required.";
}
if ($feedback === '') {
    $errors[] = "Feedback is required.";
}

if (!empty($errors)) {
    foreach ($errors as $err) {
        echo '<p>' . htmlspecialchars($err) . '</p>';
    }
    echo '<p><a href="javascript:history.back()">Go back</a></p>';
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO feedback (student_name, email, `level`, subject, feedback) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param('sssss', $name, $email, $level, $subject, $feedback);

if ($stmt->execute()) {
    header('Location: thankyou.php');
    exit;
} else {
    echo "Database error: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$mysqli->close();
