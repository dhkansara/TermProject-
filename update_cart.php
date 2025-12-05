<?php
session_start();

// Validate cart and input
if (!isset($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$id = $_POST['id'] ?? null;
$qty = intval($_POST['quantity'] ?? 0);

// Ensure item exists in cart
if ($id && isset($_SESSION['cart'][$id])) {

    // Quantity must be at least 1
    if ($qty > 0) {
        $_SESSION['cart'][$id]['quantity'] = $qty;
    } else {
        // If qty is 0 or negative → remove item
        unset($_SESSION['cart'][$id]);
    }
}

header("Location: cart.php");
exit;
?>
