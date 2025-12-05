<?php include "admin_header.php"; ?>

<?php
$stmt = $pdo->query("SELECT * FROM products ORDER BY id ASC");
$products = $stmt->fetchAll();
?>

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="admin-page-title mb-0">Products</h1>
        <a href="product_add.php" class="btn btn-sm btn-success">
            <i class="fa-solid fa-plus"></i> Add Product
        </a>
    </div>

    <table class="table table-dark table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $p['id']; ?></td>
                <td><img src="../<?= htmlspecialchars($p['image']); ?>" width="70"></td>
                <td><?= htmlspecialchars($p['name']); ?></td>
                <td><?= number_format($p['price'],2); ?></td>
                <td>
                    <a href="product_edit.php?id=<?= $p['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="product_delete.php?id=<?= $p['id']; ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Delete this product?');">
                       Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "admin_footer.php"; ?>
