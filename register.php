<?php
require 'db_config.php';
session_start();

// Redirect if already logged in
if (isset($_SESSION['student_id'])) {
    header("Location: feedback_form.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $dept = trim($_POST['department']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO students (full_name, email, password, department) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $pass, $dept);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now login.');window.location='login.php';</script>";
    } else {
        echo "<script>alert('Email already registered.');window.location='register.php';</script>";
    }
}
?>

<?php include 'header.php'; ?>

<style>
body {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: 'Poppins', sans-serif;
}

.register-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
}

.register-card {
    background: linear-gradient(145deg, #ffffffcc, #e6f0ffcc);
    padding: 45px 35px;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    max-width: 500px;
    width: 100%;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.register-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 45px rgba(0,0,0,0.25);
}

.register-card h3 {
    color: #003366;
    font-weight: 700;
    margin-bottom: 25px;
    font-size: 28px;
}

.register-card label {
    font-weight: 500;
    color: #003366;
}

.register-card .btn-primary {
    background: linear-gradient(90deg, #ffc107, #ff9800);
    color: #003366;
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 50px;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}

.register-card .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    background: linear-gradient(90deg, #ffb300, #ff7f00);
    color: #003366;
}

.register-card a {
    color: #003366;
    font-weight: 500;
    text-decoration: none;
}

.register-card a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .register-card {
        padding: 35px 25px;
    }
    .register-card h3 {
        font-size: 24px;
    }
}
</style>

<section class="register-container">
    <div class="register-card">
        <h3>Student Registration</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Department</label>
                <select name="department" class="form-select" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="B.Tech.Ed.IT">B.Tech.Ed.IT</option>
                    <option value="B.Tech.Ed.Civil">B.Tech.Ed.Civil</option>
                    <option value="Diploma in Civil Engineering">Diploma in Civil Engineering</option>
                    <option value="Diploma in Veterinary">Diploma in Veterinary</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <p class="mt-3"><a href="login.php">Back to Login</a></p>
        </form>
    </div>
</section>


