<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Feedback Form | Student Feedback System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f0f4ff, #dfe9f3); min-height:100vh;  }
.feedback-container { max-width:600px; margin:50px auto; background:#fff; padding:2.5rem; border-radius:20px; box-shadow:0 10px 30px rgba(0,0,0,0.1); }
.feedback-header { text-align:center; margin-bottom:2rem; }
.feedback-header img { border-radius:50%; margin-bottom:1rem; }
.form-label { font-weight:600; color:#34495e; }
.form-control { border-radius:10px; border:1px solid #ced4da; }
.btn-primary { background: linear-gradient(90deg, #4c84ff, #6c63ff); border:none; border-radius:12px; }
.btn-primary:hover { background: linear-gradient(90deg, #6c63ff, #4c84ff); }
textarea { resize:none; }
</style>
<script>
function restrictInput(event) {
  const char = String.fromCharCode(event.which);
  if (!/^[A-Za-z\s]+$/.test(char)) event.preventDefault();
}
</script>
</head>
<body>

<?php include 'header.php'; ?>

<div class="feedback-container">
  <div class="feedback-header">
    <img src="p.jpg" width="100" height="100" alt="SCTI Logo">
    <h2>Sindhuli Community Technical Institute</h2>
    <p class="text-muted mb-1">Ka Na Pa -06, Nunthala, Sindhuli</p>
    <p class="text-muted">Bagmati Pradesh</p>
    <h4 class="text-primary mt-3">Student Feedback Form</h4>
  </div>

  <form action="submit_feedback.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="student_name" class="form-label">Full Name</label>
      <input type="text" id="student_name" name="student_name" class="form-control" value="<?= $_SESSION['student_name'] ?>" readonly>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="<?= $_SESSION['student_email'] ?>" readonly>
    </div>

    <div class="mb-3">
      <label for="subject" class="form-label">Related Subject</label>
      <input type="text" id="subject" name="subject" class="form-control" onkeypress="restrictInput(event)" required>
    </div>

    <div class="mb-3">
      <label for="feedback" class="form-label">Your Feedback</label>
      <textarea id="feedback" name="feedback" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image (optional)</label>
      <input type="file" id="image" name="image" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
      <label for="video" class="form-label">Upload Video (optional)</label>
      <input type="file" id="video" name="video" class="form-control" accept="video/*">
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Submit Feedback</button>
  </form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
