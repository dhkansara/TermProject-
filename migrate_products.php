<?php
// migrate_products.php
require_once 'db/conn.php';
require_once 'product-data.php';   // your big $products array

if (!isset($products) || !is_array($products)) {
    die('No products array found.');
}

$sql = "
INSERT INTO products
(id, name, price, image, description, short_description, features, specs, category)
VALUES
(:id, :name, :price, :image, :description, :short_description, :features, :specs, :category)
ON DUPLICATE KEY UPDATE
  name = VALUES(name),
  price = VALUES(price),
  image = VALUES(image),
  description = VALUES(description),
  short_description = VALUES(short_description),
  features = VALUES(features),
  specs = VALUES(specs),
  category = VALUES(category)
";

$stmt = $pdo->prepare($sql);

foreach ($products as $id => $p) {

    $name  = $p['name'] ?? '';
    $price = $p['price'] ?? 0;
    $image = $p['image'] ?? '';
    $desc  = $p['description'] ?? '';
    $short = $p['short_description'] ?? '';
    $cat   = $p['category'] ?? '';

    // features & specs might be arrays – convert to JSON
    $features = isset($p['features']) ? json_encode($p['features'], JSON_UNESCAPED_UNICODE) : null;
    $specs    = isset($p['specs'])    ? json_encode($p['specs'], JSON_UNESCAPED_UNICODE)    : null;

    $stmt->execute([
        ':id'               => $id,
        ':name'             => $name,
        ':price'            => $price,
        ':image'            => $image,
        ':description'      => $desc,
        ':short_description'=> $short,
        ':features'         => $features,
        ':specs'            => $specs,
        ':category'         => $cat,
    ]);

    echo "Product $id - $name migrated/updated.<br>";
}

echo "<br><strong>Done!</strong>";
