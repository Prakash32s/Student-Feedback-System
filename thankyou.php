<?php
// thankyou.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You | Student Feedback System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* Thank You Section */
.thank-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 15px;
}

.thank-card {
    background: linear-gradient(145deg, #ffffffcc, #e6f0ffcc);
    padding: 50px 40px;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    text-align: center;
    max-width: 500px;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.checkmark {
    font-size: 60px;
    color: #28a745;
    margin-bottom: 20px;
    animation: popIn 0.5s ease forwards;
}

.thank-card h2 {
    color: #003366;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 15px;
}

.thank-card p {
    color: #555;
    font-size: 17px;
    margin-bottom: 30px;
}

.btn-back {
    background: linear-gradient(90deg, #ffc107, #ff9800);
    color: #003366;
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 16px;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}

.btn-back:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    background: linear-gradient(90deg, #ffb300, #ff7f00);
    color: #003366;
}

@keyframes popIn {
    0% { transform: scale(0); opacity: 0; }
    60% { transform: scale(1.2); opacity: 1; }
    100% { transform: scale(1); }
}

/* Responsive */
@media (max-width: 768px) {
    .thank-card {
        padding: 35px 25px;
    }
    .thank-card h2 {
        font-size: 24px;
    }
    .thank-card p {
        font-size: 16px;
    }
    .btn-back {
        font-size: 15px;
        padding: 10px 25px;
    }
}
</style>
</head>
<body>

<!-- Header -->
<?php include 'header.php'; ?>

<!-- Thank You Section -->
<section class="thank-container">
    <div class="thank-card">
        <div class="checkmark">&#10004;</div>
        <h2>Thank You!</h2>
        <p>Your feedback has been successfully received. We appreciate your time and valuable input.</p>
        <a href="index.php" class="btn-back">Back to Home</a>
    </div>
</section>

<!-- Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
