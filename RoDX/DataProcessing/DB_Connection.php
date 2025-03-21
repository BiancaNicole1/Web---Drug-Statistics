<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbName = "test";

try {
    $dbConnection = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exeption) {
    echo "Connection failed: " . $exeption->getMessage();
    exit;
}
