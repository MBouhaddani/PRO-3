<?php
// auteur: Mohamed
// functie: algemene functies tbv hergebruik

include_once "config.php";

 function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 // selecteer de data uit de opgeven table
 function getData($table){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // selecteer de rij van de opgeven productcode uit de table product
 function getproduct($productcode){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE productcode = :productcode";
    $query = $conn->prepare($sql);
    $query->execute([':productcode'=>$productcode]);
    $result = $query->fetch();

    return $result;
 }


 function ovzproduct(){

    // Haal alle product record uit de tabel 
    $result = getData(CRUD_TABLE);
    
    //print table
    printTable($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
function printTable($result){
    // Zet de hele table in een variable $table en print hem 1 keer 
    $table = "<table>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
                $table .= "<th>{$header}</th>";   
            }

            // print elke rij van de tabel
            foreach ($result as $row) {
                
                $table .= "<tr>";
                // print elke kolom
                foreach ($row as $cell) {
                    $table .= "<td>{$cell}</td>";
                }
                $table .= "</tr>";
            }
            $table .= "</table>";

            echo $table;
        }


        function crudproduct(){

            // Menu-item   insert
            $txt = "
            <h1>Crud product</h1>
            <nav>
        		<a href='insert.php'>Toevoegen nieuwe product</a>
            </nav><br>";
            echo $txt;

            // Haal alle product record uit de tabel 
            $result = getData(CRUD_TABLE);

            //print table
            printCrudproduct($result);
            
         }

        // Function 'printCrudproduct' print een HTML-table met data uit $result 
        // en een wzg- en -verwijder-knop.
        function printCrudproduct($result){
            // Zet de hele table in een variable en print hem 1 keer 
            $table = "<table>";

            // Print header table

            // haal de kolommen uit de eerste rij [0] van het array $result mbv array_keys
            $headers = array_keys($result[0]);
            $table .= "<tr>";
            foreach($headers as $header){
                $table .= "<th>{$header}</th>";   
            }
            // Voeg actie kopregel toe
            $table .= "<th colspan=2>Actie</th>";
            $table .= "</th>";

            // print elke rij
            foreach ($result as $row) {
                
                $table .= "<tr>";
                // print elke kolom
                foreach ($row as $cell) {
                    $table .= "<td>{$cell}</td>";  
                }
                
                // Wijzig knopje
                $table .= "<td>
                    <form method='post' action='update.php?productcode={$row['productcode']}' >       
                        <button>Wzg</button>	 
                    </form></td>";

                // Delete knopje
                $table .= "<td>
                    <form method='post' action='delete.php?productcode={$row['productcode']}' >       
                        <button>Verwijder</button>	 
                    </form></td>";

                $table .= "</tr>";
            }
            $table .= "</table>";

            echo $table;
        }


        function updateproduct($row){

            // Maak database connectie
            $conn = connectDb();

            // Maak een query 
            $sql = "UPDATE " . CRUD_TABLE .
            " SET 
                type = :type,
                voor = :voor,
                club = :club,
                merk = :merk,
                prijs = :prijs
            WHERE productcode = :productcode
            ";

            // Prepare query
            $stmt = $conn->prepare($sql);
            // Uitvoeren
            $stmt->execute([
                ':type'=>$row['type'],
                ':voor'=>$row['voor'],
                ':club'=>$row['club'],
                ':merk'=>$row['merk'],
                ':prijs'=>$row['prijs'],
                ':productcode'=>$row['productcode'],
            ]);

            // test of database actie is gelukt
            $retVal = ($stmt->rowCount() == 1) ? true : false ;
            return $retVal;
        }

        function insertproduct($post){
            // Maak database connectie
            $conn = connectDb();

            // Maak een query 
            $sql = "
                INSERT INTO " . CRUD_TABLE . " (type, voor, club, merk, prijs)
                VALUES (:type, :voor, :club, :merk, :prijs) 
            ";

            // Prepare query
            $stmt = $conn->prepare($sql);
            // Uitvoeren
            $stmt->execute([
                ':type'=>$_POST['type'],
                ':voor'=>$_POST['voor'],
                ':club'=>$_POST['club'],
                ':merk'=>$_POST['merk'],
                ':prijs'=>$_POST['prijs'],
            ]);

            
            // test of database actie is gelukt
            $retVal = ($stmt->rowCount() == 1) ? true : false ;
            return $retVal;  
        }

        function deleteproduct($productcode){

            // Connect database
            $conn = connectDb();
            
            // Maak een query 
            $sql = "
            DELETE FROM " . CRUD_TABLE . 
            " WHERE productcode = :productcode";

            // Prepare query
            $stmt = $conn->prepare($sql);

            // Uitvoeren
            $stmt->execute([
            ':productcode'=>$productcode,
            ]);

            // test of database actie is gelukt
            $retVal = ($stmt->rowCount() == 1) ? true : false ;
            return $retVal;
        }

