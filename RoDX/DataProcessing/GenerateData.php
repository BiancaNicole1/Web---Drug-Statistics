<?php
// Start session
session_start();

// Include database connection
require_once 'db_connection.php';
global $dbConnection;

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "Please log in to view this page.";
    exit;
}

// Get the year from the URL parameters
$year = isset($_GET['year']) ? intval($_GET['year']) : 0;
if ($year == 0) {
    echo "Invalid year.";
    exit;
}

// Fetch data for the specified year
$sql = "SELECT * FROM drug_data WHERE year = ?";
$statement = $dbConnection->prepare($sql);
$statement->execute([$year]);

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($data)) {
    echo "No data found for the year $year.";
    exit;
}
?>
