<?php
    // functie: formulier en database insert bestelling
    // auteur: Mohamed

    echo "<h1>Insert</h1>";

    require_once 'functions.php';

    // Test of er op de insert-knop is gedrukt 
    if (isset($_POST) && isset($_POST['btn_ins'])) {
        // test of insert gelukt is
        switch (insertbestelling($_POST)) {
            case true:
                echo "<script>alert('bestelling is toegevoegd')</script>";
                break;
            default:
                echo '<script>alert("bestelling is NIET toegevoegd")</script>';
                break;
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">bestellingcode:</label>
        <input type="text" name="bestellingcode" required><br>

        <label for="adres">klantcode:</label>
        <input type="text" name="klantcode" required><br>

        <label for="plaats">productcode:</label>
        <input type="text" name="productcode" required><br>

        <label for="plaats">Aantal:</label>
        <input type="text" name="aantal" required><br>

        <label for="plaats">Besteldatum:</label>
        <input type="text" name="besteldatum" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='main.php'>Home</a>
    </body>
</html>
