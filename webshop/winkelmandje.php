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
            <li style="float: right;"><a href="login.php">Inloggen</a></li>
            <li style="float: right;"><a href="register.php">Registreren</a></li>
            <li class="winkelmandje">
                <a href="winkelmandje.php">
                    <img src="image/shoppingcart.jpg" alt="Winkelmandje" style="height: 20px;">
                </a>
            </li>
        </ul>
    </nav>

    <section id="cart">
        <h2>Winkelmandje</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
            </tr>
            <!-- Voorbeeld producten -->
            <tr>
                <td>Product 1</td>
                <td>€10.00</td>
            </tr>
            <tr>
                <td>Product 2</td>
                <td>€15.00</td>
            </tr>
            <!-- Voeg meer producten toe zoals nodig -->
        </table>
        <p>Totaal: €25.00</p>
        <a href="bestellen.php" id="orderButton" role="button">Bestellen</a>

    </section>

    <div id="zoekResultaten" style="position: absolute; background-color: white; width: 100%;"></div>

    <footer>
        <p>Contact: 9021703@student.zadkine.nl</p>
        <p>&copy; 2023 Je Website. Alle rechten voorbehouden.</p>
    </footer>

    <script>
        function zoekProducten(query) {
            if (query.length == 0) { 
                document.getElementById("zoekResultaten").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("zoekResult



