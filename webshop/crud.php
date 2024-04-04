<?php
// crud.php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Page</title>
</head>
<body>
    <h1>Welcome to the CRUD page!</h1>
    <!-- Your CRUD operations go here -->
</body>
</html>
