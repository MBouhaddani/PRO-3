<?php
// Dit script simuleert een database oproep. Vervang dit met je eigen database logica.
$query = $_GET['q'] ?? '';

// Simuleer een database resultaat
$producten = [
    ['id' => 1, 'type' => 'Voetbalshirt'],
    ['id' => 2, 'type' => 'Tennisschoenen'],
    ['id' => 3, 'type' => 'Zwembroek'],
    ['id' => 4, 'type' => 'Hardloopbroek']
];

echo "<ul>";
foreach ($producten as $product) {
    if (stripos($product['type'], $query) !== false) {
        echo "<li><a href='productpagina.php?productId=" . $product['id'] . "'>" . $product['type'] . "</a></li>";
    }
}
echo "</ul>";
?>
