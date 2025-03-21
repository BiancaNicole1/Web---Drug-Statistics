<?php
// Include config file that contains database connection
require_once 'DataProcessing/DB_Connection.php';

// Function to get all table names in the database
function getTableNames($dbConnection) {
    $stmt = $dbConnection->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $tables;
}

// Initialize $dbConnection from the included file
global $dbConnection;

// Check if $dbConnection is set and valid
if (!$dbConnection) {
    die("Database connection failed.");
}

// Get all table names
$tables = getTableNames($dbConnection);

// Handle form submission if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/editData.css">
    <title>Edit Data</title>
</head>
<body>

<div class="container-top-menu">
        <h1>Edit Database Tables</h1>
    </div>
    <div class="container">
    <a href="Home.php" class="go-back">Go back to home</a>

        <h2>Select a Table</h2>
        <form action="" method="post">
            <label for="table_name">Select a table:</label>
            <select id="table_name" name="table_name">
                <?php foreach ($tables as $table) { ?>
                    <option value="<?php echo htmlspecialchars($table); ?>"><?php echo htmlspecialchars($table); ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="View Table">
        </form>

        <?php
        // Display table data if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['table_name'])) {
            $tableName = $_POST['table_name'];

            // Query and display table data
            $stmt = $dbConnection->query("SELECT * FROM $tableName");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
                ?>
                <h3>Table: <?php echo htmlspecialchars($tableName); ?></h3>
                <table>
                    <thead>
                        <tr>
                            <?php foreach (array_keys($rows[0]) as $column) { ?>
                                <th><?php echo htmlspecialchars($column); ?></th>
                            <?php } ?>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <?php foreach ($row as $value) { ?>
                                    <td><?php echo htmlspecialchars($value); ?></td>
                                <?php } ?>
                                <td class="button-group">
                                    <a href="editRow.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo $row['id']; ?>">Edit</a>
                                    <a href="deleteRow.php?table=<?php echo urlencode($tableName); ?>&id=<?php echo $row['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo "No data available in the selected table.";
            }
        }
        ?>
    </div>

</body>
</html>