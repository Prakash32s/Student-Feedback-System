<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Feedback System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    header {
      background-color: #003366;
      padding: 15px 30px;
    }
    header h2 {
      color: white;
      font-weight: 600;
      margin: 0;
      font-size: 24px;
    }
    .nav-links a {
      color: white;
      margin-left: 20px;
      font-weight: 500;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s;
    }
    .nav-links a:hover { color: #ffc107; }
    main {
      flex: 1; /* pushes footer down */
      padding: 20px;
    }
  </style>
</head>
<body>
<header class="d-flex justify-content-between align-items-center">
<div class="d-flex align-items-center">
  <a href="index.php" class="d-flex align-items-center text-decoration-none">
    <div style="background-color:#003366; padding:5px; border-radius:8px;">
    
    </div>
    <h2 class="ms-2 text-white">SCTI-Feedback Portal</h2>
  </a>
</div>

  <div class="nav-links">
    <?php if(isset($_SESSION['student_id'])): ?>
      <a href="feedback_form.php">Feedback</a>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </div>
</header>

<main>
