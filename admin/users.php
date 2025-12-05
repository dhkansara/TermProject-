<?php include "admin_header.php"; ?>

<?php
$stmt = $pdo->query("SELECT * FROM customers ORDER BY id DESC");
$users = $stmt->fetchAll();
?>

<div class="admin-card">
    <h1 class="admin-page-title">Users</h1>

    <table class="table table-dark table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id']; ?></td>
                <td><?= htmlspecialchars($u['full_name']); ?></td>
                <td><?= htmlspecialchars($u['email']); ?></td>
                <td><?= $u['created_at'] ?? ''; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "admin_footer.php"; ?>
