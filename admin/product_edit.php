<?php include "admin_header.php"; ?>
<?php require_once "../db/conn.php"; ?>   


<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p>Product not found.</p>";
    include "admin_footer.php";
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = $_POST['name'];
    $price = (float)$_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $update = $pdo->prepare("
        UPDATE products 
        SET name = :name, price = :price, image = :image, description = :description
        WHERE id = :id
    ");

    $update->execute([
        ':name' => $name,
        ':price'=> $price,
        ':image'=> $image,
        ':description'=> $description,
        ':id'   => $id
    ]);

    $message = "Product updated successfully!";

    // Reload updated product
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch();
}
?>

<div class="admin-card">
    <h1 class="admin-page-title">Edit Product #<?= $product['id']; ?></h1>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" 
                   value="<?= htmlspecialchars($product['name']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" name="price" step="0.01" class="form-control"
                   value="<?= htmlspecialchars($product['price']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image Path</label>
            <input type="text" name="image" class="form-control"
                   value="<?= htmlspecialchars($product['image']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($product['description']); ?></textarea>
        </div>

        <button class="btn btn-primary">Update Product</button>
    </form>
</div>

<?php include "admin_footer.php"; ?>
