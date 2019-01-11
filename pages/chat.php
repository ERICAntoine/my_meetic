<?php
    session_start();
    include("../poo/call/insertProfilesChat.php");
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
                        <ul id="menu">
                            <li><a href="match.php">Matcher avec les Profiles</a></li>
                            <li id="menu_profil"><a href="personal.php">Mon profil</a></li>
                            <li><a href="logout.php">Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="max_width content_message">
                <div class="chat">
                  <!--  <div class="chatwith">
                        <?php while($donnes = $allProfil->fetch(PDO::FETCH_ASSOC)):?>
                            <div class="talk">
                                <?php if(file_exists("../userImages/ ". $donnes["receiver"] ."/profil.jpg")):?>
                                    <img src=<?= "../userImages/ ". $donnes["receiver"] ."/profil.jpg"?>
                                <?php endif ?>
                                <?php if(!file_exists("../userImages/ ". $donnes["receiver"] ."/profil.jpg")):?>
                                    <img class="profil_image" src=<?= "../images/user.png" ?>>
                                <?php endif ?>
                                <div class="info">
                                    <h5><?= $donnes["lastname"]. " " .$donnes["firstname"]?></h5>
                                    <p><?= $donnes["content"]?></p>
                                </div>
                            </div>
                            <hr/>
                        <?php endwhile?>
                    </div>-->
                    <div class="messages">
                        <div class="recent">
                            
                        </div>
                        <form id="messager" method="post">
                            <input id="message" type="text">
                            <input type="submit"> 
                            <input id="receiver" type="hidden" value=<?= $_GET["chatWith"]?>>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../assets/js/chat.js"></script>
    <script src="../assets/js/index.js"></script>
</body>
</html>