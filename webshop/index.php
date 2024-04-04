<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Guest';
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website.css">
    <title>Je Website</title>
    
    <style>
        .navbar {
            display: flex;
            justify-content: center;
        }
        
        .navbar li {
            display: inline-block;
            margin: 0 10px;
        }
        
        .navbar li a {
            display: block;
            padding: 10px;
            background-color: #ccc;
            text-decoration: none;
            color: #000;
        }
        
        .logout-form {
            display: inline-block;
            margin-left: 10px;
        }
        
        .logout-form input[type="submit"] {
            background-color: #ccc;
            border: none;
            padding: 5px 10px;
            color: #000;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            float: right;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="home.html">Home</a></li>
            <li><a href="home.html">Heren</a></li>
            <li><a href="home.html">Dames</a></li>
            <li><a href="home.html">Kinderen</a></li>
            <li><a href="home.html">Nieuw</a></li>
            <li><a href="home.html">About us</a></li>
            <li><a href="home.html">Bestellen</a></li>
            <li><a href="home.html">Zoeken</a></li>
            <?php if ($username === 'Guest'): ?>
                <li style="float: right;"><a href="login.php">Inloggen</a></li>
                <li style="float: right;"><a href="register.php">Registreren</a></li>
            <?php else: ?>
                <li style="float: right;">
                    <div class="dropdown">
                        <a href="#" class="dropbtn"> Account</a>
                        <div class="dropdown-content">
                            <p><?php echo $username; ?></p>
                            <form class="logout-form" method="post" action="">
                                <input type="submit" name="logout" value="Logout">
                            </form>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <section>
        <div class="text-block">
            <h2>Best seller</h2>
            <p></p>
        </div>

        <div class="text-block">
            <h2>Nieuw in collectie</h2>
            <p></p>
        </div>
    </section>

    <footer>
        <p>Contact: 9021703@student.zadkine.nl</p>
        <p>&copy; <?php echo date("Y"); ?> All rights reserved.</p>
    </footer>

</body>
</html>