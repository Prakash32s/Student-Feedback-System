<?php
require 'db_config.php';

// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect if already logged in
if (isset($_SESSION['student_id'])) {
    header("Location: feedback_form.php");
    exit;
}

// Handle login POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $mysqli->prepare("SELECT id, full_name, password FROM students WHERE email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $hash);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['student_id'] = $id;
            $_SESSION['student_name'] = $name;
            $_SESSION['student_email'] = $email;
            header("Location: feedback_form.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Email not found.";
    }
}

include 'header.php'; 
?>

<style>
body {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: 'Poppins', sans-serif;
}

.login-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
}

.login-card {
    background: linear-gradient(145deg, #ffffffcc, #e6f0ffcc);
    padding: 45px 35px;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    max-width: 500px;
    width: 100%;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.login-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 45px rgba(0,0,0,0.25);
}

.login-card h3 {
    color: #003366;
    font-weight: 700;
    margin-bottom: 25px;
    font-size: 28px;
}

.login-card label {
    font-weight: 500;
    color: #003366;
}

.login-card .btn-primary {
    background: linear-gradient(90deg, #ffc107, #ff9800);
    color: #003366;
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 50px;
    transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}

.login-card .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    background: linear-gradient(90deg, #ffb300, #ff7f00);
    color: #003366;
}

.login-card a {
    color: #003366;
    font-weight: 500;
    text-decoration: none;
}

.login-card a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .login-card {
        padding: 35px 25px;
    }
    .login-card h3 {
        font-size: 24px;
    }
}
</style>

<section class="login-container">
    <div class="login-card">
        <h3>Student Login</h3>
        <?php if (!empty($error)) echo '<div class="alert alert-danger text-center">'.$error.'</div>'; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
            <p class="mt-3">Don’t have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
