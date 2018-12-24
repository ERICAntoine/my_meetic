<?php
    session_start();
    include("../poo/call/matchcall.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>LoveStory</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/desktop/desktopPersonal.css" />
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
                            <li><a href="match.php">Matcher avec les Profiles</a></li>
                            <li>Parametre</li>
                            <li>Deconnexion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="content_card max_width">                        
                <?php while($usersMatch = $users -> fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="card">
                        <div class="image_card"></div>
                        <div class="info_card">
                            <h2><?= $usersMatch["lastname"]?></h2>
                            <a class="btn-chat" href="chat.php?chatWith=<?=$usersMatch["id"]?>">Chatter</a>
                        </div>
                    </div>                            
                <?php } ?>
            </div>
        </div>
        <footer>
            <div class="max_width">
                <span>© Copyright 2018 Ericleplusbeau Corporation</span>
            </div>
        </footer>
    </div>
<script src="assets/js/index.js"></script>
</body>
</html>