<?php
session_start();

if (!isset($_SESSION['username'])) {
    $username = 'User';
} else {
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Generate.css">
    <title>Contact</title>
</head>

<body>
    <div class="container" id="container">
        <button class="go-back" onclick="window.location.href='Home.php';">Go back</button>
        <div class="continut">
           <h1>Contact</h1>
            <h2>Cojocariu Anastasia: @cojocariu.anastasia17@gmail.com</h2>
            <h2>Mazare Bianca Nicole: @biancanicole20003@gmail.com</h2>
        </div>

        
    </div>

    <script src="JS/GenerateScript.js"></script>
</body>
</html>
