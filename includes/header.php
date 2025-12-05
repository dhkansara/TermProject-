<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - Online Computer Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/TERMProject/css/style.css">

    <!-- 🔹 Bootstrap JS for dropdowns & navbar (loaded on EVERY page) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        :root {
            --tech-blue: #00b4ff;
            --tech-blue-dark: #0086c3;
            --tech-dark: #0b0f19;
        }

        /* NAVBAR */
        .navbar-custom {
            background: linear-gradient(to right, #0b0f19, #1a2b4c);
            padding: 0.9rem 0;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.45);
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--tech-blue) !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #d2e8ff !important;
            margin-left: 10px;
            transition: 0.25s;
            font-size: 1.05rem;
        }

        .nav-link:hover {
            color: var(--tech-blue) !important;
            transform: translateY(-2px);
        }

        .btn-login {
            background-color: var(--tech-blue);
            border: none;
            color: white;
            font-weight: 600;
            padding: 7px 18px;
        }

        .btn-login:hover {
            background-color: var(--tech-blue-dark);
        }

        .btn-signup {
            border: 2px solid var(--tech-blue);
            color: var(--tech-blue);
            font-weight: 600;
            padding: 7px 18px;
        }

        .btn-signup:hover {
            background-color: var(--tech-blue);
            color: white;
        }

        /* USER DROPDOWN */
        .user-dropdown-btn {
            color: #d2e8ff !important;
            font-weight: 600;
        }
        .user-dropdown-btn:hover {
            color: var(--tech-blue) !important;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-custom left-2 right-0 w-100">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">TechZone</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
      </ul>

      <!-- RIGHT SIDE -->
      <ul class="navbar-nav ms-auto">

        <?php if(isset($_SESSION['customer_id'])): ?>

            <!-- LOGGED IN USER DROPDOWN -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-dropdown-btn" 
                   href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="fa-solid fa-user"></i>
                    <?= htmlspecialchars($_SESSION['customer_name']); ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="cart.php">My Orders</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                </ul>
            </li>

        <?php else: ?>

            <!-- SHOW SIGNUP + LOGIN IF NOT LOGGED IN -->
            <li class="nav-item me-2">
                <a class="btn btn-signup" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-login" href="login.php">Login</a>
            </li>

        <?php endif; ?>

      </ul>

    </div>
  </div>
</nav>

<!-- Page content starts after this -->
<div class="">
