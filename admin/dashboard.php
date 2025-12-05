<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Check admin login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Database
require_once "../db/conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - TechZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark p-3">
    <span class="navbar-brand">TechZone Admin</span>

    <span class="text-white">
        Logged in as: <?= $_SESSION['admin_name'] ?>
    </span>

    <a href="logout.php" class="btn btn-danger ms-3">Logout</a>
</nav>

<div class="container mt-5">

    <h2>Admin Dashboard</h2>
    <hr>

    <div class="row">

        <div class="col-md-4">
            <a href="products.php" class="btn btn-primary w-100 p-3">
                Manage Products
            </a>
        </div>

        <div class="col-md-4">
            <a href="orders.php" class="btn btn-success w-100 p-3">
                View Customer Orders
            </a>
        </div>

        <div class="col-md-4">
            <a href="users.php" class="btn btn-warning w-100 p-3">
                Manage User Accounts
            </a>
        </div>

    </div>

</div>

</body>
</html>
