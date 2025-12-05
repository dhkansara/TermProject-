<?php include "admin_header.php"; ?>

<?php
$sql = "SELECT 
            o.id, 
            o.total_amount, 
            o.order_date,
            c.full_name, 
            c.email
        FROM orders o
        JOIN customers c ON o.customer_id = c.id
        ORDER BY o.order_date DESC";

$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll();
?>

<div class="admin-card">
    <h1 class="admin-page-title">Orders</h1>

    <table class="table table-dark table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total ($)</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $o): ?>
            <tr>
                <td><?= $o['id']; ?></td>
                <td><?= htmlspecialchars($o['full_name']); ?></td>
                <td><?= htmlspecialchars($o['email']); ?></td>
                <td><?= number_format($o['total_amount'], 2); ?></td>
                <td>Pending</td>
                <td><?= $o['order_date']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "admin_footer.php"; ?>
