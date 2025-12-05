<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/db/conn.php";  // FORCE correct conn.php

// Create cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get product ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header("Location: products.php");
    exit;
}

// Fetch product from DB using PDO
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// If product missing, redirect
if (!$product) {
    header("Location: products.php");
    exit;
}

// Add or update cart item
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += 1;
} else {
    $_SESSION['cart'][$id] = [
        "id"       => $product['id'],
        "name"     => $product['name'],
        "price"    => $product['price'],
        "image"    => $product['image'],
        "quantity" => 1
    ];
}

header("Location: cart.php");
exit;
?>
