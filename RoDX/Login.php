<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\Login.css">
    <title>Login Page</title>
</head>

<body>

    <div class="container" id="container">

        <div class="form-container sign-up">
            <form action="DataProcessing/RegisterDataProcessing.php" method="post">
                <h1>Create Account</h1>
                
                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                <input type="text" id="username" name="username" placeholder="Username">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="password" id="password" name="password" placeholder="Password">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                
                <label>
                    <input type="checkbox" id="admin" name="admin"> I want to be an admin
                </label>
                
                <button>Sign In</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="DataProcessing/LoginDataProcessing.php" method="post">
                <h1>Login</h1>
                
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
               
                <button>Sign Up</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Already have an account?</h1>
                    <p class="larger-text">Log in by entering your personal details</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Don't have an account?</h1>
                    <p class="larger-text">Register with your personal <br>
                    details to use all of our features</p>
                    <button class="hidden" id="register">Register</button>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/LoginScript.js"></script>
</body>

</html>