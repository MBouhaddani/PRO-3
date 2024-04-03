<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website.css">
    <title>Bestelpagina</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="homepagina.php">Home</a></li>
            <li><a href="heren.php">Heren</a></li>
            <li><a href="dames.php">Dames</a></li>
            <li><a href="kinderen.php">Kinderen</a></li>
            <li><a href="nieuw.php">Nieuw</a></li>
            <li><a href="aboutus.php">Over Ons</a></li>
            <li><a href="bestellen.php">Bestellen</a></li>
            <li><a href="zoeken.php">Zoeken</a></li>
            <li style="float: right;"><a href="login.php">Inloggen</a></li>
            <li style="float: right;"><a href="register.php">Registreren</a></li>
        </ul>
    </nav>

    <section class="container">
        <div class="winkelmandje-items">
            <h2>Winkelmandje</h2>
            <div class="product-item">Product 1 - €20</div>
            <div class="product-item">Product 2 - €15</div>
            <div class="product-item">Product 3 - €25</div>
            <!-- Voeg hier dynamisch producten toe -->
        </div>

        <div class="bestelformulier">
            <h1>Bestelformulier</h1>
            <form action="verwerk_bestelling.php" method="POST">
                <div class="form-group">
                    <label for="gender">Geslacht:</label>
                    <select name="gender" id="gender">
                        <option value="man">Man</option>
                        <option value="vrouw">Vrouw</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="size">Maat:</label>
                    <select name="size" id="size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dorp">Dorp/Stad:</label>
                    <input type="text" id="dorp" name="dorp" required>
                </div>

                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" required>
                </div>
                
                <div class="form-group">
                    <label for="address">Adres:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="tel">Telefoonnummer:</label>
                    <input type="tel" id="tel" name="tel" pattern="[0-9]{10}" title="Tien cijfers zonder spaties of streepjes" required>
                </div>
                
                <button type="submit">Bestellen</button>
            </form>
        </div>
    </section>

    <footer>
        <p>Contact: info@jewebsite.nl</p>
        <p>&copy; 2023 Je Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
