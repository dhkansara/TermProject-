<?php
session_start();
require_once "../db/conn.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email    = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {

        $_SESSION['admin_id']   = $admin['id'];
        $_SESSION['admin_name'] = $admin['full_name'];

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Invalid admin credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - TechZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top, #1e293b, #020617);
            color: #e2e8f0;
            font-family: "Poppins", sans-serif;
        }
        .admin-login-box {
            background: rgba(15,23,42,0.95);
            padding: 30px;
            border-radius: 14px;
            width: 360px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.6);
            border: 1px solid rgba(148,163,184,0.4);
        }
        .admin-login-box h2 {
            font-size: 1.6rem;
            margin-bottom: 15px;
            color: #38bdf8;
            text-align: center;
        }
        .admin-login-box input {
            background: #020617;
            border: 1px solid #334155;
            color: #e2e8f0;
        }
        .admin-login-box input:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 0.15rem rgba(56,189,248,0.35);
        }
        .admin-login-box button {
            width: 100%;
            margin-top: 10px;
            background: linear-gradient(90deg,#0ea5e9,#2563eb);
            border:none;
        }
        .admin-login-box button:hover {
            background: linear-gradient(90deg,#22c55e,#16a34a);
        }
        .error-text {
            color: #f97373;
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

<div class="admin-login-box">
    <h2><i class="fa-solid fa-user-shield"></i> Admin Login</h2>

    <?php if ($error): ?>
        <div class="error-text"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Admin Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary">
            Login
        </button>
    </form>
</div>

</body>
</html>
