<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website.css">
    <title>Je Website</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="homepagina.php">Home</a></li>
            <li><a href="heren.php">Heren</a></li>
            <li><a href="dames.php">Dames</a></li>
            <li><a href="kinderen.php">Kinderen</a></li>
            <li><a href="nieuw.php">Nieuw</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="bestellen.php">Bestellen</a></li>
            <li><a href="zoeken.php">Zoeken</a></li>
            
            <?php
                session_start();
                if(isset($_SESSION['username'])) {
                    
                    echo '<ul>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '</ul>';
                    echo '</li>';
                } else {
                    echo '<li style="float: right;"><a href="login.php">Inloggen</a></li>';
                    echo '<li style="float: right;"><a href="register.php">Registreren</a></li>';
                }
            ?>
            <li class="winkelmandje">
                <a href="winkelmandje.php">
                    <img src="image/shoppingcart.jpg" alt="Winkelmandje" style="height: 20px;">
                </a>
            </li>
        </ul>
    </nav>

    <section class="clearfix">
        <div class="info-box">
            <img src="image/mohammed.jpg" alt="Headshot 1">
            <p>Information about person 1</p>
        </div>

        <div class="info-box">
            <img src="image/ivo.jpg" alt="Headshot 2">
            <p>Information about person 2</p>
        </div>

        <div class="info-box">
            <img src="image/sander.jpg" alt="Headshot 3">
            <p>Ik ben Sander Klaasen, 17 jaar en student Software Development aan het Techniek College Rotterdam. Mijn rol in ons project was het ontwikkelen van de front-end van de website.</p>
        </div>
    </section>

    <footer>
        <p>Contact: 9021703@student.zadkine.nl</p>
        <p>&copy; 2023 Je Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
