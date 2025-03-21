<?php

require_once 'db_connection.php';
session_start();
global $dbConnection;

$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;

$sql = "UPDATE users SET username = ? WHERE email = ?";
$statement = $dbConnection->prepare($sql);
try {
    $statement->execute([$username, $email]);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$_SESSION["username"] = $username;
header("Location: ../Home.php");

