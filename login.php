<?php
session_start();
require_once "db/conn.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["customer_id"] = $user["id"];
        $_SESSION["customer_name"] = $user["full_name"];

        header("Location: index.php");
        exit;

    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - TechZone</title>
    <link rel="stylesheet" href="css/auth-style.css">
</head>

<body>

<div class="auth-wrapper">

<div class="glass-box">
    <h2>Login</h2>

    <?php if ($error): ?>
        <div style="color:#ff7070; margin-bottom:10px;">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

        <p style="margin-top:15px;">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </p>
    </form>
</div>

</div>

</body>
</html>
