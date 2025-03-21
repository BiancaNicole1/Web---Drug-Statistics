<?php

require_once 'db_connection.php';
session_start();
global $dbConnection;

$firstname = $_POST['firstname'] ?? null;
$lastname = $_POST['lastname'] ?? null;
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$confirmPassword = $_POST['confirmPassword'] ?? null;
$admin = isset($_POST['admin']) ? 1 : 0; // Assuming admin is a boolean or integer field

$credentialsNotNull = !empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password);
$checkPassword = $password == $confirmPassword; 

if (!$checkPassword) {
    echo "<script> alert('Passwords are different!');</script>";
} else if ($credentialsNotNull) {
    // Check if the email is already used
    $sql = "SELECT * FROM users WHERE email = ?";
    $statement = $dbConnection->prepare($sql);
    $statement->execute([$email]);

    if ($statement->rowCount() > 0) {
        echo "<script> alert('Email already in use');</script>";
    } else {
        // Check if the username is already used
        $sql = "SELECT * FROM users WHERE username = ?";
        $statement = $dbConnection->prepare($sql);
        $statement->execute([$username]);

        if ($statement->rowCount() > 0) {
            echo "<script> alert('Username already in use'); </script>";
        } else {
            // Both email and username are unique, proceed with registration
            $sql = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`, `isAdmin`) VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $dbConnection->prepare($sql);
            try {
                $statement->execute([$firstname, $lastname, $username, $email, MD5($password), $admin]);
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $_SESSION["admin"] = $admin;

                echo "<script> alert('Registration successful'); window.location.href = '../Home.php'; </script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
} else {
    echo "<script> alert('Credentials are empty!'); </script>";
}
?>
