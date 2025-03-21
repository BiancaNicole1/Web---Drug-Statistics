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
    <title>Generate Data</title>
</head>

<body>
    <div class="container" id="container">
        <button class="go-back" onclick="window.location.href='Home.php';">Go back</button>
        <div class="continut">
            <div class="page-container">
                <h1>Choose a year:</h1>
                <div class="button-group">
                    <div class="row">
                        <div class="dropdown">
                            <button class="buttonFilled">2022</button>
                            <div class="dropdown-content">
                                <a href="Stats/Tables2022.php">See Table</a>
                                <a href="Stats/Charts2022.php">See Charts</a>
                            </div>
                        </div>    
                        <button class="buttonFlat" type="button" onclick="openPopup(2022)">Download 2022 statistics</button>
                    </div>
                    <div class="row">
                        <div class="dropdown">
                            <button class="buttonFilled">2021</button>
                            <div class="dropdown-content">
                                <a href="Stats/Tables2021.php">See Table</a>
                                <a href="Stats/Charts2021.php">See Charts</a>
                            </div>
                        </div>    
                        <button class="buttonFlat" type="button" onclick="openPopup(2021)">Download 2021 statistics</button>
                    </div>
                    <div class="row">
                        <div class="dropdown">
                            <button class="buttonFilled">2020</button>
                            <div class="dropdown-content">
                                <a href="Stats/Tables2020.php">See Table</a>
                                <a href="Stats/Charts2020.php">See Charts</a>
                            </div>
                        </div>    
                        <button class="buttonFlat" type="button" onclick="openPopup(2020)">Download 2020 statistics</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <h2>Choose the format to download the data:</h2>
                <button class="popup-button" type="button" onclick="downloadCSV()">CSV</button>
                <button class="popup-button" type="button" onclick="downloadPNG()">PNG</button>
            </div>
        </div>
    </div>

    <script src="JS/GenerateScript.js"></script>
</body>
</html>
