<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'db/conn.php';
include 'includes/header.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    $p = null;
} else {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $p = $stmt->fetch();
}

if (!$p) {
    ?>
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-light">Product not found</h2>
        <p class="text-muted">The product you are looking for does not exist.</p>
        <a href="products.php" class="btn btn-primary mt-3">Back to Products</a>
    </div>
    <?php
    include 'includes/footer.php';
    exit;
}

// Decode JSON fields
$features = $p['features'] ? json_decode($p['features'], true) : [];
$specs    = $p['specs']    ? json_decode($p['specs'], true)    : [];
?>

<style>
.single-product-wrapper {
    max-width: 1100px;
    margin: 40px auto 60px;
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(0, 1.2fr);
    gap: 40px;
}
.single-product-image {
    width: 100%;
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.45);
    object-fit: cover;
}
.single-product-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--tech-blue);
}
.single-product-price {
    font-size: 1.7rem;
    font-weight: 700;
    margin-top: 10px;
    color: #1b5a77ff;
}
.single-product-short {
    margin-top: 12px;
    font-size: 1.05rem;
    color: #142671ff;
}
.single-product-section-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 25px;
    margin-bottom: 8px;
    color: #ffffff;
}
.add-cart-btn {
    display: inline-block;
    margin-top: 25px;
    padding: 10px 26px;
    border-radius: 30px;
    border: none;
    background: var(--tech-blue);
    color: white;
    font-size: 1.05rem;
    font-weight: 600;
    text-decoration: none;
    transition: 0.25s;
    box-shadow: 0 0 15px rgba(0,180,255,0.6);
}
.add-cart-btn:hover {
    background: var(--tech-blue-dark);
    transform: translateY(-2px);
    box-shadow: 0 0 22px rgba(0,180,255,0.85);
}
.single-product-features li {
    color: #1a2d7aff;
}
.single-product-specs {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    font-size: 0.95rem;
    color: #143473ff;
}
.single-product-specs th,
.single-product-specs td {
    padding: 6px 8px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}
.single-product-specs th {
    width: 35%;
    color: #0e2876ff;
}
@media (max-width: 768px) {
    .single-product-wrapper {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="container">
    <div class="single-product-wrapper">

        <!-- LEFT: IMAGE -->
        <div>
            <img src="<?php echo htmlspecialchars($p['image']); ?>" 
                 alt="<?php echo htmlspecialchars($p['name']); ?>" 
                 class="single-product-image">
        </div>

        <!-- RIGHT: INFO -->
        <div>
            <h1 class="single-product-title"><?php echo htmlspecialchars($p['name']); ?></h1>

            <div class="single-product-price">
                $<?php echo number_format($p['price'], 2); ?>
            </div>

            <p class="single-product-short">
                <?php echo htmlspecialchars($p['description']); ?>
            </p>

            <a href="add_to_cart.php?action=add&id=<?php echo $id; ?>" 
               class="add-cart-btn">Add to Cart</a>

            <!-- FEATURES SECTION -->
            <?php if (!empty($features)): ?>
                <h3 class="single-product-section-title">Key Features</h3>
                <ul class="single-product-features">
                    <?php foreach ($features as $feat): ?>
                        <li><?php echo htmlspecialchars($feat); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- SPECS SECTION -->
            <?php if (!empty($specs)): ?>
                <h3 class="single-product-section-title">Specifications</h3>
                <table class="single-product-specs">
                    <tbody>
                        <?php foreach ($specs as $label => $value): ?>
                            <tr>
                                <th><?php echo htmlspecialchars($label); ?></th>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
