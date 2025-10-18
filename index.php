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
  min-height: 100vh;
  margin: 0;
  display: flex;
  flex-direction: column;
  background: linear-gradient(135deg, #00c6ff, #0072ff);
}

/* Hero Section */
.hero {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 80px 20px;
  color: white;
  animation: fadeIn 1s ease-in;
}

.hero-box {
  background: rgba(255, 255, 255, 0.95);
  padding: 40px 30px;
  border-radius: 20px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.2);
  max-width: 900px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 30px;
}

.hero-text {
  flex: 1 1 300px;
}

.hero-text h1 {
  color: #003366;
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 20px;
}

.hero-text p {
  color: #333;
  font-size: 18px;
  line-height: 1.7;
  margin-bottom: 25px;
}

.btn-primary {
  background: #003366;
  border-radius: 50px;
  padding: 12px 35px;
  font-weight: 600;
  transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
}

.btn-primary:hover {
  background: #00264d;
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

/* Hero image */
.hero-img {
  flex: 1 1 300px;
  text-align: center;
}

.hero-img img {
  max-width: 100%;
  border-radius: 20px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.2);
  animation: float 3s ease-in-out infinite;
}

/* Animations */
@keyframes fadeIn {
  from {opacity: 0; transform: translateY(20px);}
  to {opacity: 1; transform: translateY(0);}
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

/* Responsive */
@media(max-width:768px) {
  .hero-box { flex-direction: column; text-align: center; }
  .hero-text h1 { font-size: 28px; }
  .hero-text p { font-size: 16px; }
  .btn-primary { font-size: 16px; padding: 10px 25px; }
}
</style>
</head>
<body>

<!-- Header -->
<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="hero">
  <div class="hero-box">
    <div class="hero-text">
      <h1>Welcome to the Student Feedback System</h1>
      <p>Share your opinions about courses and faculty to help us improve the academic environment. Your feedback matters!</p>
     <div class="d-flex justify-content-center mt-3">
  <a href="feedback_form.php" class="btn btn-primary">Give Feedback</a>
</div>

    </div>
    <!-- <div class="hero-img">
      <img src="feedack.jpg" alt="Feedback Illustration">
    </div> -->
  </div>
</section>



</body>
</html>
