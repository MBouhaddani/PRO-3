<?php
// auteur: Mohamed
// functie: verwijder een bier op basis van de bestellingcode
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['bestellingcode'])){

    // test of insert gelukt is
    if(deletebestelling($_GET['bestellingcode']) == true){
        echo '<script>alert("bestellingcode: ' . $_GET['bestellingcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('main.php'); </script>";
    } else {
        echo '<script>alert("bestelling is NIET verwijderd")</script>';
    }
}
?>
