<?php
session_start();
require_once "db/conn.php";   // ✔ contains $pdo (PDO connection)

// Redirect if cart empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header("Location: cart.php");
    exit;
}

// =======================
// GET CHECKOUT FORM FIELDS
// =======================
$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$address = $_POST['address'];

$card_name   = $_POST['card_name'];
$card_number = $_POST['card_number'];
$expiry      = $_POST['expiry'];
$cvv         = $_POST['cvv'];

$card_last4 = substr($card_number, -4);

// =======================
// 1. INSERT CUSTOMER (PDO)
// =======================

$sql = "INSERT INTO customers (full_name, email, phone, address)
        VALUES (:name, :email, :phone, :address)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name'    => $name,
    ':email'   => $email,
    ':phone'   => $phone,
    ':address' => $address
]);

$customer_id = $pdo->lastInsertId();


// =======================
// 2. CALCULATE ORDER TOTAL
// =======================
$totalAmount = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}


// =======================
// 3. INSERT ORDER
// =======================

$sql = "INSERT INTO orders (customer_id, total_amount)
        VALUES (:customer_id, :total)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':customer_id' => $customer_id,
    ':total'       => $totalAmount
]);

$order_id = $pdo->lastInsertId();


// =======================
// 4. INSERT ORDER ITEMS
// =======================

$sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
        VALUES (:order_id, :product_id, :qty, :price)";
$stmt = $pdo->prepare($sql);

foreach ($_SESSION['cart'] as $item) {

    $stmt->execute([
        ':order_id'   => $order_id,
        ':product_id' => $item['id'],
        ':qty'        => $item['quantity'],
        ':price'      => $item['price']
    ]);
}


// =======================
// 5. SAVE CARD (ONLY LAST 4)
// =======================

$sql = "INSERT INTO payments (order_id, card_name, card_last4, expiry)
        VALUES (:order_id, :cname, :last4, :expiry)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':order_id' => $order_id,
    ':cname'    => $card_name,
    ':last4'    => $card_last4,
    ':expiry'   => $expiry
]);


// =======================
// 6. CLEAR CART
// =======================
$_SESSION['cart'] = [];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5 text-center">

    <h2 class="text-success">🎉 Order Placed Successfully!</h2>
    <p>Thank you <strong><?= htmlspecialchars($name); ?></strong> for your purchase.</p>

    <p>Your items will be shipped to:</p>
    <p><strong><?= nl2br(htmlspecialchars($address)); ?></strong></p>

    <div class="mt-3">
        <h5>Order Number:</h5>
        <p><strong>#<?= $order_id; ?></strong></p>
    </div>

    <a href="products.php" class="btn btn-primary mt-3">Continue Shopping</a>

</div>

</body>
</html>
