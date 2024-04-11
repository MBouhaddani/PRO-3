<?php
    // functie: formulier en database insert klant
    // auteur: Mohamed

    echo "<h1>Insert</h1>";

    require_once 'functions.php';

    // Test of er op de insert-knop is gedrukt 
    if (isset($_POST) && isset($_POST['btn_ins'])) {
        // test of insert gelukt is
        switch (insertklant($_POST)) {
            case true:
                echo "<script>alert('klant is toegevoegd')</script>";
                break;
            default:
                echo '<script>alert("klant is NIET toegevoegd")</script>';
                break;
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">Naam:</label>
        <input type="text" klantcode="naam" name="naam" required><br>

        <label for="adres">Adres:</label>
        <input type="text" klantcode="adres" name="adres" required><br>

        <label for="plaats">Plaats:</label>
        <input type="text" klantcode="plaats" name="plaats" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='main.php'>Home</a>
    </body>
</html>
