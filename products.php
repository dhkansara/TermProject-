<?php 
include 'includes/header.php'; 
require_once "db/conn.php";   // database connection
?>

<style>
.page-title {
    font-size: 2.8rem;
    font-weight: 700;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 40px;
    color: #0a84ff;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
}

.product-card {
    background: white;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
    text-align: center;
    transition: .3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.product-card img {
    width: 100%;
    height: 180px;
    object-fit: contain;
    margin-bottom: 15px;
}

.product-price {
    font-size: 1.3rem;
    font-weight: bold;
    color: #0a84ff;
    margin-bottom: 10px;
}

.product-view-btn {
    display: inline-block;
    padding: 10px 28px;
    background: linear-gradient(135deg, #009dff, #0066ff);
    color: #ffffff;
    font-weight: 600;
    border-radius: 50px;
    font-size: 1rem;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(0, 150, 255, 0.35);
    transition: all 0.25s ease;
}

.product-view-btn:hover {
    color: #fff;
    transform: translateY(-3px) scale(1.03);
    box-shadow: 0 0 18px rgba(0, 150, 255, 0.75), 0 0 28px rgba(0, 120, 255, 0.5);
    background: linear-gradient(135deg, #00b8ff, #007aff);
}
</style>

<div class="container mt-5 mb-5">

    <h1 class="page-title">Our Products</h1>

    <div class="product-grid">

        <?php
        $query = "SELECT * FROM products ORDER BY id ASC";
        $stmt = $pdo->query($query);   // 🔥 FIXED (PDO)

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" 
                         alt="<?php echo htmlspecialchars($row['name']); ?>">
                    
                    <p class="product-price">$<?php echo number_format($row['price'], 2); ?></p>
                    
                    <a href="singleproduct.php?id=<?php echo $row['id']; ?>" 
                       class="product-view-btn">View</a>
                </div>
        <?php
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>
