<?php
    // functie: update klant
    // auteur: Mohamed

    require_once 'functions.php';

    // Test of er op de wijzig-knop is gedrukt 
    if (isset($_POST['btn_wzg'])) {

      // test of update gelukt is
      switch (updateklant($_POST)) {
        case true:
          echo "<script>alert('klant is gewijzigd')</script>";
          break;
        default:
          echo '<script>alert("klant is NIET gewijzigd")</script>';
          break;
      }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['klantcode'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['klantcode'];
        $row = getklant($id);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig klant</title>
</head>
<body>
  <h2>Wijzig klant</h2>
  <form method="post">

    <input type="hidden" id="klantcode" name="klantcode" required value="<?php echo $row['klantcode']; ?>"><br>
    <label for="naam">naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="adres">adres:</label>
    <input type="text" id="adres" name="adres" required value="<?php echo $row['adres']; ?>"><br>

    <label for="plaats">plaats:</label>
    <input type="text" id="plaats" name="plaats" required value="<?php echo $row['plaats']; ?>"><br>

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