<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        $username = 'User';
        $admin = 0;
    } else {
        $username = $_SESSION['username'];
        $admin = $_SESSION['admin'];
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Home.css">
    <title>Home Page</title>
</head>

<body>
    <div class="container-top-menu">
        <h1>Romanian Drug Explorer</h1>
        <?php if ($username != 'User') { ?>
            <?php if ($admin == 1) {?>
                <div class="dropdown">
                    <button class="dropbtn">Import/Export/Edit data</button>
                    <div class="dropdown-content">
                        <a href="import.php">Import</a>
                        <a href="export.php">Export</a>
                        <a href="editData.php">Edit</a>
                    </div>
                </div>
            <?php } ?>
            <div class="loginedit">
                <a href="EditProfile.php">Log Out/Edit profile</a>
            </div>
        <?php } else { ?>
            <div class="loginedit">
                <a href="Login.php">Login/Register</a>
            </div>
        <?php } ?>
    </div>

    <div class="continut">
        <div class="heroContainer home-hero1">
            <div class="home-container01">
                <h1 class="home-hero-heading heading1">Analysis of drug consumption in Romania</h1>
                <span class="home-hero-sub-heading bodyLarge">Web Tool for statistics visualisation</span>
                <div class="home-btn-group">
                <?php if ($username != 'User') { ?>
                    <button class="buttonFilled" onclick="window.location.href='Generate.php';">View Statistics</button>
                    <?php } else { ?>
                    <button class="buttonFilled" onclick="window.location.href='Login.php';">Log in to view statistics</button>
                    
                    <?php } ?>
                <button class="buttonFlat" onclick="window.location.href='Prevention.php';">Learn More</button>
                </div>
            </div>
        </div>

        <div class="home-features">
            <div class="featuresContainer">
                <div class="home-features1">
                    <div class="home-container02">
                        <span class="overline"><span>features</span><br /></span>
                        <h2 class="home-features-heading heading2">Key Features of the Drug Consumption Analysis Tool</h2>
                        <span class="home-features-sub-heading bodyLarge">
                            <span>Explore the functionalities that provide insights into drug consumption trends and related factors.</span>
                        </span>
                    </div>
                    <div class="home-container03">
                        <div class="featuresCard feature-card-feature-card">
                            <div class="feature-card-container">
                                <h3 class="feature-card-text heading3"><span>Consumption Trends Analysis</span></h3>
                                <span class="bodySmall"><span>Track and analyze drug consumption trends over the past 3 years to identify patterns and changes.</span></span>
                            </div>
                        </div>
                        <div class="featuresCard feature-card-feature-card">
                            <div class="feature-card-container">
                                <h3 class="feature-card-text heading3"><span>Crime Correlation</span></h3>
                                <span class="bodySmall"><span>Explore the relationship between drug consumption and related crimes through statistical data visualization.</span></span>
                            </div>
                        </div>
                        <div class="featuresCard feature-card-feature-card">
                            <div class="feature-card-container">
                                <h3 class="feature-card-text heading3"><span>Medical Emergencies Monitoring</span></h3>
                                <span class="bodySmall"><span>Monitor and visualize emergency medical incidents related to drug use for better understanding and prevention strategies.</span></span>
                            </div>
                        </div>
                        <div class="featuresCard feature-card-feature-card">
                            <div class="feature-card-container">
                                <h3 class="feature-card-text heading3"><span>Prevention Campaign Impact</span></h3>
                                <span class="bodySmall"><span>Assess the effectiveness of drug prevention campaigns by analyzing their impact on consumption rates and behaviors.</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-faq">
            <div class="faqContainer">
                <div class="home-faq1">
                    <div class="home-container28">
                        <span class="overline"><span>FAQ</span><br /></span>
                        <h2 class="home-text84 heading2">Common questions</h2>
                        <span class="home-text85 bodyLarge">
                            <span>Here are some of the most common questions that we get.</span><br />
                        </span>
                    </div>
                <div class="home-container29">
                <div class="question1-container">
                    <span class="question1-text heading3"><span>What are the most commonly abused drugs in Romania?</span></span>
                    <span class="bodySmall">
                        <span>The most commonly abused drugs in Romania include marijuana, synthetic cannabinoids, heroin, and methamphetamine.</span>
                    </span>
                </div>
                <div class="question1-container">
                    <span class="question1-text heading3"><span>What is the current trend of drug abuse among Romanian youth?</span></span>
                    <span class="bodySmall">
                        <span>There is a concerning trend of increasing drug abuse among Romanian youth, with a rise in the use of synthetic drugs and party drugs.</span>
                    </span>
                </div>
                <div class="question1-container">
                    <span class="question1-text heading3"><span>How does the government address drug abuse issues in Romania?</span></span>
                    <span class="bodySmall">
                        <span>The Romanian government addresses drug abuse through prevention programs, treatment centers, and law enforcement efforts to combat drug trafficking.</span>
                    </span>
                </div>
                <div class="question1-container">
                    <span class="question1-text heading3"><span>Are there any specific regions in Romania with higher drug abuse rates?</span></span>
                    <span class="bodySmall">
                        <span>Certain urban areas in Romania, such as Bucharest and Constanta, have higher drug abuse rates compared to rural regions.</span>
                    </span>
                </div>
                <div class="question1-container">
                    <span class="question1-text heading3"><span>What resources are available for individuals seeking help for drug addiction in Romania?</span></span>
                    <span class="bodySmall">
                        <span>There are various rehabilitation centers, support groups, and hotlines available for individuals seeking help for drug addiction in Romania.</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="home-footer">
        <div class="footerContainer home-footer1">
            <div class="home-container30">
                <span class="logo">DRUGSTATS</span>
                <div class="home-btn-group">
                    <button class="buttonFilled" onclick="window.location.href='documentatie.html';">About</button>
                    <button class="buttonFilled" onclick="window.location.href='Contact.php';">Contact</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="JS/GenerateScript.js"></script>

</html>
