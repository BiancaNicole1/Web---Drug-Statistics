<?php
// Include config file that contains database connection
require_once 'DataProcessing/DB_Connection.php';

// Check if table name and row ID are provided via GET request
if (isset($_GET['table']) && isset($_GET['id'])) {
    $tableName = $_GET['table'];
    $rowId = $_GET['id'];

    // Delete the row from the table
    $deleteStmt = $dbConnection->prepare("DELETE FROM $tableName WHERE id = ?");
    $deleteStmt->execute([$rowId]);

    echo "Row deleted successfully.";
} else {
    die("Table name or ID not provided.");
}
?>
