<?php
    include("../poo/call/upload.php");
    include("../poo/call/personalcall.php");
    if(empty($_SESSION))
    {
        header("Location: connexion.php");
    }
    $_POST["id"] = $_SESSION["id"];
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
                <div class="card">
                    <?php if(file_exists("../userImages/" . $_SESSION['id'] . '_' . $_SESSION['lastname'] . '_' . $_SESSION['firstname'] . '/profil.jpg')):?>
                        <label for="image_upload">
                            <div class="image_card">
                                <img class="card-img" src="../userImages/<?= $_SESSION["id"] . "_" . $_SESSION["lastname"] . "_" . $_SESSION["firstname"] . "/profil.jpg"?>">
                            </div>
                        </label>
                        <form id="upload" method="post" enctype="multipart/form-data" >
                            <input id="image_upload" name="image" type="file" style= "display: none">
                        </form>
                    <?php endif ?>
                    <?php if(!file_exists("../userImages/" . $_SESSION['id'] . '_' . $_SESSION['lastname'] . '_' . $_SESSION['firstname'] . '/profil.jpg')):?>
                        <label for="image_upload">
                            <img class="card-img" src="../images/user.png" alt="caca">
                        </label>
                        <form id="upload" method="post"  enctype="multipart/form-data" >
                            <input id="image_upload" name="image" type="file" style= "display: none">
                        </form>
                    <?php endif ?>
                    <div class="info_card">
                        <h2><?=$_SESSION["lastname"] ." ".  $_SESSION["firstname"]?></h2>
                        <form>
                            <textarea></textarea>
                            <button class="btn-chat">Ajoutez Presentation</button>
                        </form>
                            <!--<a class="btn-chat" href="chat.php/?id=<?=$_SESSION["id"]?>">Chatter</a>-->
                    </div>
                </div>
                <div class="card">
                    <form method="post" class="form_change" >
                        <label>Change LastName</label>
                        <input type="text" name="lastname" value=<?= $_SESSION["lastname"]?>>
                        <label>Change Firstname</label>
                        <input type="text" name="firstname" value=<?= $_SESSION["firstname"]?>>
                        <label>Change Email</label>
                        <input type="email"  name="email" value=<?= $_SESSION["email"]?>>
                        <label>Change Date</label>
                        <input type="date" name="date" value=<?= $_SESSION["birthday"]?>>
                        <label>Change City</label>
                        <input type="text" name="city" value=<?= $_SESSION["city"]?>>
                        <label>Change Password</label>
                        <input type="password" name="password">
                        <input type="submit" class="btn-chat">
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="max_width">
                <span>© Copyright 2018 Ericleplusbeau Corporation</span>
            </div>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/js/UpImage.js"></script>
</body>
</html>