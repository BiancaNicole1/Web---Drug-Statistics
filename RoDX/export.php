<?php
require_once 'DataProcessing/DB_Connection.php';
global $dbConnection;

// Function to get all table names in the database
function getTableNames($dbConnection) {
    $stmt = $dbConnection->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $tables;
}

// Function to export data to CSV
function exportToCSV($tableName, $db) {
    $filePath = "uploads/" . $tableName . ".csv";
    $file = fopen($filePath, 'w');

    $stmt = $db->query("SELECT * FROM $tableName");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($rows)) {
        // Output column headers
        fputcsv($file, array_keys($rows[0]));

        // Output data rows
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }
    }
    fclose($file);
    echo '<div class="message success">CSV file exported successfully to ' . $filePath . '.</div>';
}

// Function to export data to JSON
function exportToJSON($tableName, $db) {
    $filePath = "uploads/" . $tableName . ".json";
    $file = fopen($filePath, 'w');

    $stmt = $db->query("SELECT * FROM $tableName");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($rows)) {
        fwrite($file, json_encode($rows));
    }
    fclose($file);
    echo '<div class="message success">JSON file exported successfully to ' . $filePath . '.</div>';
}

// Handle form submission for exporting data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['source_table'])) {
    $tableName = $_POST['source_table'];
    $fileType = $_POST['file_type'];

    if ($fileType == 'csv') {
        exportToCSV($tableName, $dbConnection);
    } elseif ($fileType == 'json') {
        exportToJSON($tableName, $dbConnection);
    } else {
        echo '<div class="message error">Invalid file type selected.</div>';
    }
}

// Get all table names
$tables = getTableNames($dbConnection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Import-export.css">
    <title>Export Data</title>
    <style>
        :root {
            --dl-color-custom-accent1: #C9E8FF;
            --dl-color-custom-primary1: #147487;
            --dl-color-custom-primary2: #0A3A44;
            --dl-color-custom-secondary1: #A9D5DD;
            --dl-color-custom-neutral-dark: #222222;
            --dl-color-custom-neutral-light: #F5F4F4;
        }

        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #A9D5DD;
            font-family: Inter Tight;
        }

        .container-top-menu {
            background-color: white;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 97%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            margin-bottom: 20px;
        }

        .container-top-menu h1 {
            font-size: 24px;
            font-weight: 500;
            text-transform: uppercase;
            color: var(--dl-color-custom-primary2);
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid var(--dl-color-custom-neutral-dark);
            padding: 8px;
        }

        th {
            background-color: var(--dl-color-custom-accent1);
            text-align: left;
        }

        td {
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: var(--dl-color-custom-neutral-light);
        }

        form {
            margin-bottom: 10px;
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            padding: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
            width: 94%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--dl-color-custom-neutral-dark);
            background-color: var(--dl-color-custom-neutral-light);
        }

        input[type="file"], input[type="submit"], select {
            display: block;
            margin: 10px auto;
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--dl-color-custom-neutral-dark);
        }

        input[type="submit"] {
            background-color: var(--dl-color-custom-primary1);
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: var(--dl-color-custom-primary2);
        }

        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .message.success {
            background-color: #DFF2BF;
            border: 1px solid #4F8A10;
            color: #4F8A10;
        }

        .message.error {
            background-color: #FEEFB3;
            border: 1px solid #9F6000;
            color: #9F6000;
        }
    </style>
</head>
<body>

    <div class="container">
    <a href="Home.php" class="go-back">Go back to home</a>

    <div class="container-top-menu">
        <h1>Select Table to Export</h1>
    </div>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="source_table">Select a table:</label>
            <select id="source_table" name="source_table">
                <?php foreach ($tables as $table) { ?>
                    <option value="<?php echo htmlspecialchars($table); ?>"><?php echo htmlspecialchars($table); ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="file_type">Select file type:</label>
            <select id="file_type" name="file_type">
                <option value="csv">CSV</option>
                <option value="json">JSON</option>
            </select>
            <br><br>
            <input type="submit" value="Export">
        </form>
    </div>
</body>
</html>

