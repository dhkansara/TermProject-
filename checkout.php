<?php 
include 'includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = "Checkout";

// Calculate cart total
$cartTotal = 0;
?>
<div class="container mt-5 mb-5">

    <h1 class="text-center mb-5">Checkout</h1>

    <div class="row">

        <!-- LEFT SIDE: BILLING + CARD INFORMATION -->
        <div class="col-md-7">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    Billing Information
                </div>

                <div class="card-body">

                    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
                        <div class="alert alert-info text-center">
                            Your cart is empty.  
                        </div>
                    <?php else: ?>

                    <form action="place_order.php" method="POST">

                        <!-- PERSONAL INFO -->
                        <h5 class="mt-2 mb-3">Personal Information</h5>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Shipping Address</label>
                            <textarea name="address" rows="3" class="form-control" required></textarea>
                        </div>

                        <hr class="my-4">

                        <!-- CARD INFORMATION -->
                        <h5 class="mb-3">Card Payment Information</h5>

                        <div class="mb-3">
                            <label class="form-label">Cardholder Name</label>
                            <input type="text" name="card_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Number (Only last 4 digits will be saved)</label>
                            <input type="text" name="card_number" class="form-control" maxlength="16" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiry Date (MM/YY)</label>
                                <input type="text" name="expiry" class="form-control" maxlength="5" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">CVV</label>
                                <input type="password" name="cvv" class="form-control" maxlength="4" required>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg mt-3 w-100">Place Order</button>

                    </form>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- RIGHT SIDE: ORDER SUMMARY -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    Order Summary
                </div>

                <div class="card-body">

                    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
                        <p>Your cart is empty.</p>

                    <?php else: ?>

                        <?php foreach ($_SESSION['cart'] as $item): 
                            $lineTotal = $item['price'] * $item['quantity'];
                            $cartTotal += $lineTotal;
                        ?>
                            <div class="d-flex justify-content-between mb-2">
                                <strong><?= htmlspecialchars($item['name']); ?> (x<?= $item['quantity']; ?>)</strong>
                                <span>$<?= number_format($lineTotal, 2); ?></span>
                            </div>
                            <hr>
                        <?php endforeach; ?>

                        <div class="d-flex justify-content-between fs-5">
                            <strong>Total:</strong>
                            <strong>$<?= number_format($cartTotal, 2); ?></strong>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
