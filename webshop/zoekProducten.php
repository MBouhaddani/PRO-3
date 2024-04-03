<?php
// Dit script simuleert een database oproep. Vervang dit met je eigen database logica.
$query = $_GET['q'] ?? '';

// Simuleer een database resultaat
$producten = [
    ['id' => 1, 'naam' => 'Voetbalshirt'],
    ['id' => 2, 'naam' => 'Tennisschoenen'],
    ['id' => 3, 'naam' => 'Zwembroek'],
    ['id' => 4, 'naam' => 'Hardloopbroek']
];

echo "<ul>";
foreach ($producten as $product) {
    if (stripos($product['naam'], $query) !== false) {
        echo "<li><a href='productpagina.php?productId=" . $product['id'] . "'>" . $product['naam'] . "</a></li>";
    }
}
echo "</ul>";
?>
