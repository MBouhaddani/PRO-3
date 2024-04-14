<?php
// auteur: Mohamed
// functie: algemene functies tbv hergebruik

include_once "config.php";

function connectDb() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "webshop_p"; // Database naam is nu specifiek voor 'webshop_p'

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function getData($table) {
    $conn = connectDb();
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function getproduct($productcode) {
    $conn = connectDb();
    $sql = "SELECT * FROM product WHERE productcode = :productcode";
    $query = $conn->prepare($sql);
    $query->execute([':productcode' => $productcode]);
    return $query->fetch();
}

function ovzproduct() {
    $result = getData("product");
    printTable($result);
}

function printTable($result) {
    if(empty($result)) {
        echo "<p>No data found</p>";
        return;
    }
    $table = "<table>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= "<th>{$header}</th>";
    }
    $table .= "</tr>";
    foreach ($result as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>{$cell}</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}

function crudproduct() {
    echo "<h1>Crud product</h1><nav><a href='crudproduct/insert.php'>Toevoegen nieuwe product</a></nav><br>";
    $result = getData("product");
    printCrudproduct($result);
}

function printCrudproduct($result) {
    if(empty($result)) {
        echo "<p>No data found</p>";
        return;
    }
    $table = "<table>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header) {
        $table .= "<th>{$header}</th>";
    }
    $table .= "<th colspan='2'>Actie</th></tr>";
    foreach($result as $row) {
        $table .= "<tr>";
        foreach($row as $cell) {
            $table .= "<td>{$cell}</td>";
        }
        $table .= "<td><form method='post' action='crudproduct/update.php?productcode={$row['productcode']}'><button>Wzg</button></form></td>";
        $table .= "<td><form method='post' action='crudproduct/delete.php?productcode={$row['productcode']}'><button>Verwijder</button></form></td>";
        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}

function updateproduct($row) {
    $conn = connectDb();
    $sql = "UPDATE product SET type = :type, voor = :voor, club = :club, merk = :merk, prijs = :prijs WHERE productcode = :productcode";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':type' => $row['type'],
        ':voor' => $row['voor'],
        ':club' => $row['club'],
        ':merk' => $row['merk'],
        ':prijs' => $row['prijs'],
        ':productcode' => $row['productcode'],
    ]);
    return ($stmt->rowCount() == 1);
}

function insertproduct($post) {
    $conn = connectDb();
    $sql = "INSERT INTO product (type, voor, club, merk, prijs) VALUES (:type, :voor, :club, :merk, :prijs)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':type' => $post['type'],
        ':voor' => $post['voor'],
        ':club' => $post['club'],
        ':merk' => $post['merk'],
        ':prijs' => $post['prijs'],
    ]);
    return ($stmt->rowCount() == 1);
}

function deleteproduct($productcode) {
    $conn = connectDb();
    $sql = "DELETE FROM product WHERE productcode = :productcode";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':productcode' => $productcode]);
    return ($stmt->rowCount() == 1);
}
?>
