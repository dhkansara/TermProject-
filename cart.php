<?php
include 'includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$title = "Cart";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background:#f7f7f7;">

<div class="container mt-5">
    <h2 class="mb-4 text-center">🛒 Your Shopping Cart</h2>

    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>

        <div class="alert alert-info text-center">
            Your cart is empty!
        </div>

    <?php else : ?>

        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th width="120">Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $grandTotal = 0;

                foreach ($_SESSION['cart'] as $id => $item) :

                    // Cart already contains full product info
                    $name = $item['name'];
                    $price = $item['price'];
                    $image = $item['image'];
                    $qty   = $item['quantity'];

                    $lineTotal = $price * $qty;
                    $grandTotal += $lineTotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>

                    <td><img src="<?= htmlspecialchars($image) ?>" width="80"></td>

                    <td>$<?= number_format($price) ?></td>

                    <td>
                        <form action="update_cart.php" method="POST" style="display:flex;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="number" name="quantity" 
                                   value="<?= $qty ?>" min="1" class="form-control">
                            <button class="btn btn-success ms-2 btn-sm">✓</button>
                        </form>
                    </td>

                    <td>$<?= number_format($lineTotal) ?></td>

                    <td>
                        <a href="remove_item.php?id=<?= $id ?>" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>

                <?php endforeach; ?>

                <tr class="table-light">
                    <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                    <td colspan="2"><strong>$<?= number_format($grandTotal) ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="text-end">
            <a href="checkout.php" class="btn btn-primary btn-lg">Proceed to Checkout</a>
        </div>

    <?php endif; ?>
</div>

</body>
</html>

<?php include 'includes/footer.php'; ?>
