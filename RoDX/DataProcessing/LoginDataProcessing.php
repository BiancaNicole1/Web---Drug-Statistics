<?php

require_once 'db_connection.php';
session_start();
global $dbConnection;

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($email && $password) {
    $sql = "SELECT username, isAdmin FROM users WHERE email = ? AND password = MD5(?)";
    $statement = $dbConnection->prepare($sql);
    $statement->execute([$email, $password]);

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $username = $row['username'];
        $admin = $row['isAdmin']; 

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['admin'] = $admin;

        header("Location: ../Home.php");
        exit(); // Ensure no further output is sent after redirection
    } else {
        echo "<script> alert('Cont incorect'); window.location.href = '../login.php'; </script>";
        exit(); // Ensure no further output is sent after redirection
    }
} else {
    echo "Email and password are required."; // Handle case where email or password is missing
    exit();
}

echo "<script>console.log('Username: " . $username . "');</script>";
echo "<script>console.log('Admin: " . $admin . "');</script>";

?>
