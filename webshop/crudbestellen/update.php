<?php
    // functie: update bestelling
    // auteur: Mohamed

    require_once 'functions.php';

    // Test of er op de wijzig-knop is gedrukt 
    if (isset($_POST['btn_wzg'])) {

      // test of update gelukt is
      switch (updatebestelling($_POST)) {
        case true:
          echo "<script>alert('bestelling is gewijzigd')</script>";
          break;
        default:
          echo '<script>alert("bestelling is NIET gewijzigd")</script>';
          break;
      }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['bestellingcode'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['bestellingcode'];
        $row = getbestelling($id);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig bestelling</title>
</head>
<body>
  <h2>Wijzig bestelling</h2>
  <form method="post">

    <input type="hidden" id="bestellingcode" name="bestellingcode" required value="<?php echo $row['bestellingcode']; ?>"><br>
    <label for="klantcode">klantcode:</label>
    <input type="text" id="klantcode" name="klantcode" required value="<?php echo $row['klantcode']; ?>"><br>

    <label for="productcode">productcode:</label>
    <input type="text" id="productcode" name="productcode" required value="<?php echo $row['productcode']; ?>"><br>

    <label for="aantal">aantal:</label>
    <input type="text" id="aantal" name="aantal" required value="<?php echo $row['aantal']; ?>"><br>

    <label for="besteldatum">besteldatum:</label>
    <input type="text" id="besteldatum" name="besteldatum" required value="<?php echo $row['besteldatum']; ?>"><br>

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