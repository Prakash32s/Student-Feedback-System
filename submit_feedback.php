<?php
require 'db_config.php';
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}

// POST data
$name     = $_POST['student_name'];
$email    = $_POST['email'];
$subject  = $_POST['subject'];
$feedback = $_POST['feedback'];

// Optional uploads
$image_path = null;
$video_path = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $img_name = time().'_'.basename($_FILES['image']['name']);
    $target_img = "uploads/images/".$img_name;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) {
        $image_path = $target_img;
    }
}

if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
    $vid_name = time().'_'.basename($_FILES['video']['name']);
    $target_vid = "uploads/videos/".$vid_name;
    if (move_uploaded_file($_FILES['video']['tmp_name'], $target_vid)) {
        $video_path = $target_vid;
    }
}

// Validation
$errors = [];
if ($name === '') $errors[] = "Name is required.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
if ($feedback === '') $errors[] = "Feedback is required.";

if (!empty($errors)) {
    foreach ($errors as $err) echo '<p>'.htmlspecialchars($err).'</p>';
    echo '<p><a href="javascript:history.back()">Go back</a></p>';
    exit;
}

// Insert into DB with image/video paths
$stmt = $mysqli->prepare("INSERT INTO feedback (student_name, email, subject, feedback, image, video) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssss', $name, $email, $subject, $feedback, $image_path, $video_path);

if ($stmt->execute()) {
    header('Location: thankyou.php');
    exit;
} else {
    echo "Database error: ".htmlspecialchars($stmt->error);
}

$stmt->close();
$mysqli->close();
?>
