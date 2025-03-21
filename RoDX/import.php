<?php
require_once 'DataProcessing/DB_Connection.php'; 
// Function to get all table names in the database
function getTableNames($dbConnection) {
    $stmt = $dbConnection->query("SHOW TABLES");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Function to get the column definitions from a table
function getTableColumns($tableName, $dbConnection) {
    $stmt = $dbConnection->query("SHOW COLUMNS FROM $tableName");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Function to add backticks around column names
function addBackticks($columnName) {
    return "`$columnName`";
}

// Handle form submission for importing data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['destination_table']) && isset($_FILES['fileToUpload'])) {
    $destinationTable = $_POST['destination_table'];

    // Check if selected destination table exists
    if (!in_array($destinationTable, getTableNames($dbConnection))) {
        die("Destination table does not exist.");
    }

    // Check if a file was uploaded successfully
    if ($_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $filePath = $_FILES['fileToUpload']['tmp_name'];
        $fileType = strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));

        // Handle CSV file import
        if ($fileType === 'csv') {
            importCSV($filePath, $destinationTable, $dbConnection);
        } else {
            echo "<div class='message error'>Only CSV files are allowed.</div>";
        }
    } else {
        echo "<div class='message error'>Error uploading file.</div>";
    }
}

// Function to import data from CSV file and replace existing data
function importCSV($filePath, $tableName, $dbConnection) {
    try {
        $dbConnection->beginTransaction();

        // Delete existing data from the destination table
        $deleteSql = "DELETE FROM `$tableName`";
        $deleteStmt = $dbConnection->prepare($deleteSql);
        $deleteStmt->execute();

        // Prepare SQL statement for inserting data
        $insertSql = "INSERT INTO `$tableName` VALUES ";
        $values = [];
        $rowCount = 0;

        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Skip the first row which contains headers
                if ($rowCount > 0) {
                    $placeholders = array_fill(0, count($data), "?");
                    $insertSql .= "(" . implode(",", $placeholders) . "),";
                    $values = array_merge($values, $data);
                }
                $rowCount++;
            }

            // Check if any rows were processed
            if ($rowCount > 1) { // Note: $rowCount > 1 because $rowCount includes the header row
                $insertSql = rtrim($insertSql, ",");

                $insertStmt = $dbConnection->prepare($insertSql);
                if ($insertStmt->execute($values)) {
                    $dbConnection->commit();
                    echo "<div class='message success'>CSV file imported and replaced existing data in $tableName.</div>";
                    return true;
                } else {
                    $dbConnection->rollBack();
                    echo "<div class='message error'>Error inserting data into $tableName.</div>";
                    return false;
                }
            } else {
                $dbConnection->rollBack();
                echo "<div class='message error'>No valid data found in the CSV file.</div>";
                return false;
            }

            fclose($handle);
        } else {
            $dbConnection->rollBack();
            echo "<div class='message error'>Error opening CSV file.</div>";
            return false;
        }
    } catch (PDOException $e) {
        $dbConnection->rollBack();
        echo "<div class='message error'>PDOException: " . $e->getMessage() . "</div>";
        return false;
    }
}


// Function to create table if not exists
function createTableIfNotExists($tableName, $columns, $dbConnection) {
    // Assume all columns as VARCHAR(255)
    $columnDefinitions = implode(",", array_map(function($col) {
        return "`$col` VARCHAR(255)";
    }, $columns));

    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS `$tableName` ($columnDefinitions)";
    if (!$dbConnection->query($sql)) {
        echo "<div class='message error'>Error creating table: " . $dbConnection->errorInfo()[2] . "</div>";
        return false;
    }
    return true;
}

// Function to generate options for select input
function generateSelectOptions($options, $selected = null) {
    $html = "";
    foreach ($options as $option) {
        $html .= "<option value='$option'";
        if ($selected !== null && $option === $selected) {
            $html .= " selected";
        }
        $html .= ">$option</option>";
    }
    return $html;
}

// Get all table names
$tables = getTableNames($dbConnection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data</title>
    <link rel="stylesheet" href="CSS/import-export.css">
</head>
<body>
    
<div class="container">
    <a href="Home.php" class="go-back">Go back to home</a>

    <div class="container-top-menu">
        <h1>Import Data into Database Table</h1>
    </div>

    
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="destination_table">Select destination table:</label>
        <select id="destination_table" name="destination_table">
            <?php echo generateSelectOptions($tables); ?>
        </select>
        <br><br>
        <label for="fileToUpload">Select CSV file to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Import Data">
    </form>
</div>
</body>
</html>
