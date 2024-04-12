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
            <li><input type="text" id="zoekveld" placeholder="Zoeken..." onkeyup="zoekProducten(this.value)"></li>
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

    <section>
        <div class="text-block">
            <h2>Shirt</h2>
            <a href="productpagina-best-seller.html"><img src="images/feyenoord.jpg" alt="Best seller product"></a>
            <p>Welk shirt</p>
            <p>Prijs</p>
        </div>

        <div class="text-block">
            <h2>Shirt</h2>
            <a href="productpagina-nieuw-in-collectie.html"><img src="images/feyenoord.jpg" alt="Nieuw in collectie product"></a>
            <p>Welk shirt</p>
            <p>Prijs</p>
        </div>
    </section>

    <div id="zoekResultaten" style="position: absolute; background-color: white; width: 100%;"></div>

<?php include 'footer.php';
?>

    <script>
        function zoekProducten(query) {
            if (query.length == 0) { 
                document.getElementById("zoekResultaten").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("zoekResultaten").innerHTML = this.responseText;
            };
            xhttp.open("GET", "zoekProducten.php?q=" + query, true);
            xhttp.send();
        }
    </script>
</body>
</html>
