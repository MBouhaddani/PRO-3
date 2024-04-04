<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit(); // Add this line to stop further execution
    } else {
        echo "Ongeldige inloggegevens.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["guest"])) {
    $_SESSION['username'] = "Guest";
    header("Location: index.php");
    exit(); // Add this line to stop further execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Pagina</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-container p {
            text-align: center;
        }
        .form-container p a {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="center">
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Login">
            </form>
            <br>
            <form method="GET" action="login.php">
                <input type="hidden" name="guest" value="true">
                <input type="submit" value="Login als gast">
            </form>
            <br>
            <p>Geen account? <a href="register.php">Maak een aan</a></p>
        </div>
    </div>
</body>
</html>