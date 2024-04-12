<?php
    // functie: update product
    // auteur: Mohamed

    require_once 'functions.php';

    // Test of er op de wijzig-knop is gedrukt 
    if (isset($_POST['btn_wzg'])) {

      // test of update gelukt is
      switch (updateproduct($_POST)) {
        case true:
          echo "<script>alert('product is gewijzigd')</script>";
          break;
        default:
          echo '<script>alert("product is NIET gewijzigd")</script>';
          break;
      }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['productcode'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['productcode'];
        $row = getproduct($id);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig product</title>
</head>
<body>
  <h2>Wijzig product</h2>
  <form method="post">

    <input type="hidden" id="productcode" name="productcode" required value="<?php echo $row['productcode']; ?>"><br>
    <label for="type">type:</label>
    <input type="text" id="type" name="type" required value="<?php echo $row['type']; ?>"><br>

    <label for="voor">voor:</label>
    <input type="text" id="voor" name="voor" required value="<?php echo $row['voor']; ?>"><br>

    <label for="club">club:</label>
    <input type="text" id="club" name="club" required value="<?php echo $row['club']; ?>"><br>

    <label for="merk">merk:</label>
    <input type="text" id="merk" name="merk" required value="<?php echo $row['merk']; ?>"><br>

    <label for="prijs">prijs:</label>
    <input type="text" id="prijs" name="prijs" required value="<?php echo $row['prijs']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='main.php'>Home</a>
  </body>
  </html>

<?php
    } else {
        echo "Geen id opgegeven<br>";
    }
?>