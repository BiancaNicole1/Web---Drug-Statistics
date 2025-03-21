<?php
// Include config file that contains database connection
require_once 'DataProcessing/DB_Connection.php';

// Check if table name and id are provided via GET request
if (isset($_GET['table']) && isset($_GET['id'])) {
    $tableName = $_GET['table'];
    $id = $_GET['id'];

    // Fetch the specific row from the table based on id
    $stmt = $dbConnection->prepare("SELECT * FROM `$tableName` WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        die("Row not found.");
    }

    // Fetch column names from the table
    $stmt = $dbConnection->prepare("SHOW COLUMNS FROM `$tableName`");
    $stmt->execute();
    $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Handle form submission for updating row
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cols = [];
        $vals = [];

        foreach ($columns as $column) {
            if ($column !== 'id') {
                $cols[] = "`$column` = ?";
                $vals[] = isset($_POST[$column]) ? $_POST[$column] : $row[$column];
            }
        }

        // Construct the update query dynamically
        $updateQuery = "UPDATE `$tableName` SET " . implode(", ", $cols) . " WHERE `id` = ?";
        $vals[] = $id; // Append the id to the values array

        // Prepare and execute SQL query
        $updateStmt = $dbConnection->prepare($updateQuery);
        if ($updateStmt->execute($vals)) {
            echo "Row updated successfully.";
        } else {
            echo "Error: " . $updateStmt->errorInfo()[2];
        }

        // Debugging information
        //echo "<pre>";
        //print_r($vals);
        //echo "Query: $updateQuery";
        //echo "</pre>";
    }
} else {
    die("Table name or id not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/editData.css">
    <title>Edit Row</title>
</head>
<body>
<div class="container">
    <a href="editData.php" class="go-back">Go back</a>
    <h2>Edit Row in <?php echo htmlspecialchars($tableName); ?></h2>
    <form action="" method="post">
        <?php foreach ($columns as $column): ?>
            <?php if ($column != 'id'): ?>
                <label for="<?php echo htmlspecialchars($column); ?>"><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $column))); ?>:</label>
                <input type="text" id="<?php echo htmlspecialchars($column); ?>" name="<?php echo htmlspecialchars($column); ?>" value="<?php echo isset($row[$column]) ? htmlspecialchars($row[$column]) : ''; ?>">
            <?php endif; ?>
        <?php endforeach; ?>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
