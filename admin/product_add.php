<?php include "admin_header.php"; ?>
<?php require_once "../db/conn.php"; ?> 
<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = $_POST['name'];
    $price = (float)$_POST['price'];
    $image = $_POST['image']; // e.g. pics/laptop.jpeg
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO products (name, price, image, description) 
                           VALUES (:name, :price, :image, :description)");
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':image' => $image,
        ':description' => $description
    ]);

    $message = "Product added successfully.";
}
?>

<div class="admin-card">
    <h1 class="admin-page-title">Add Product</h1>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image Path (e.g. pics/laptop.jpeg)</label>
            <input type="text" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Save Product</button>
    </form>
</div>

<?php include "admin_footer.php"; ?>
