<?php
    // functie: formulier en database insert product
    // auteur: Mohamed

    echo "<h1>Insert</h1>";

    require_once 'functions.php';

    // Test of er op de insert-knop is gedrukt 
    if (isset($_POST) && isset($_POST['btn_ins'])) {
        // test of insert gelukt is
        switch (insertproduct($_POST)) {
            case true:
                echo "<script>alert('product is toegevoegd')</script>";
                break;
            default:
                echo '<script>alert("product is NIET toegevoegd")</script>';
                break;
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="type">type:</label>
        <input land="text" id="type" name="type" required><br>

        <label for="adres">adres:</label>
        <input type="text" id="adres" name="adres" required><br>
        <label for="plaats">plaats:</label>
        <input land="text" id="plaats" name="plaats" required><br>
        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='main.php'>Home</a>
    </body>
</html>
