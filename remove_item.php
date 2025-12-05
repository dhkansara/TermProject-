<?php
session_start();

// Make sure cart exists
if (!isset($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$id = $_GET['id'] ?? null;

// Remove only if valid & exists in cart
if ($id && isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

// Redirect back to cart
header("Location: cart.php");
exit;
