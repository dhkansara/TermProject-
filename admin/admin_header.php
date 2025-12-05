<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../db/conn.php";

// Only protect some pages (not login)
$currentFile = basename($_SERVER['PHP_SELF']);
$publicPages = ['login.php'];

if (!in_array($currentFile, $publicPages)) {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechZone Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #0f172a;
            color: #e2e8f0;
        }
        .admin-nav {
            background: linear-gradient(90deg, #020617, #0f172a, #1e293b);
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .admin-nav .navbar-brand {
            color: #38bdf8 !important;
            font-weight: 700;
            letter-spacing: .5px;
        }
        .admin-nav .nav-link {
            color: #cbd5f5 !important;
            font-weight: 500;
        }
        .admin-nav .nav-link:hover {
            color: #38bdf8 !important;
        }
        .admin-container {
            padding: 25px;
        }
        .admin-card {
            background: #020617;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 25px rgba(15,23,42,0.9);
            border: 1px solid rgba(148,163,184,0.25);
        }
        .admin-page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #38bdf8;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg admin-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">TechZone Admin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="fa-solid fa-box"></i> Products</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php"><i class="fa-solid fa-receipt"></i> Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php"><i class="fa-solid fa-users"></i> Users</a></li>
            </ul>

            <?php if (isset($_SESSION['admin_id'])): ?>
                <span class="me-3 text-light">
                    <i class="fa-solid fa-user-shield"></i>
                    <?= htmlspecialchars($_SESSION['admin_name']); ?>
                </span>
                <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container-fluid admin-container">
