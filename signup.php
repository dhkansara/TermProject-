<?php
session_start();
require_once "db/conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $full_name = $_POST["full_name"];
    $email     = $_POST["email"];
    $password  = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert into DB
    $sql = "INSERT INTO customers (full_name, email, password)
            VALUES (:full_name, :email, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":full_name" => $full_name,
        ":email"     => $email,
        ":password"  => $password
    ]);

    // Redirect after successful signup
    header("Location: signup_success.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - TechZone</title>
    <link rel="stylesheet" href="css/auth-style.css">
</head>

<body>

<!-- Centering wrapper (NO HEADER HERE) -->
<div class="auth-wrapper">

    <div class="glass-box">
        <h2>Create Account</h2>
        <p style="opacity:0.8; font-size:14px;">Join TechZone today</p>

        <form method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Create Password" required>

            <button type="submit">Sign Up</button>

            <p style="margin-top:15px;">
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </form>
    </div>

</div>

</body>
</html>
