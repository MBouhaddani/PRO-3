<?php
// auteur: Mohamed
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['productcode'])){

    // test of insert gelukt is
    if(deleteproduct($_GET['productcode']) == true){
        echo '<script>alert("productcode: ' . $_GET['productcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('main.php'); </script>";
    } else {
        echo '<script>alert("product is NIET verwijderd")</script>';
    }
}
?>
