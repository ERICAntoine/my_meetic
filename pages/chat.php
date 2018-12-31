<?php
    session_start();
    include("../poo/call/connexioncall.php");
    if(empty($_SESSION))
    {
        header("Location: connexion.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LoveStory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/desktop/desktopChat.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800" rel="stylesheet">
</head>
<body>
    <div class="filter">
        <header>
            <div class="header">
                <div class="header_background">
                    <div class="header_content max_width">
                        <img src="../images/logo-header.png"/>
                        <ul>
                            <li><a href="../index.php">Trouver L'amour</a></li>
                            <li>Matcher avec les Profiles</li>
                            <li>Pourquoi nous ?</li>
                            <li>Histoire vrai</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>
   
    <script src="assets/js/index.js"></script>
</body>
</html>