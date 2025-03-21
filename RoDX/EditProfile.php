<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\EditProfile.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="container">
        <div class="form-container edit">
            <form action="DataProcessing/EditProfileDataProcessing.php" method="post">
                <h1>Edit your Profile</h1>
                <?php
                session_start();
                $username = $_SESSION["username"];
                $email = $_SESSION["email"];
                ?>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>">
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" readonly>
                    <button class="buttonFilled">Save Changes</button>
                    <a href="LogOut.php">Log Out</a>
                    <button class="buttonFilled" href="Home.php">Go back to Home Page</button>
            </form>
        </div>
    </div>
</body>

</html>