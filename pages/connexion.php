<?php
    include("../poo/call/connexioncall.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LoveStory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/desktop/desktopConnexion.css" />
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
        <aside class="content_login max_width">
            <div class="login">
                <form name="register" method="post" class="form_login">
                    <div class="inputs">
                            <div class="title_login log">
                                <h2>Meet <span class="rose">Big & Cute</span> Love here.<span class="star">*</span></h2>
                                <?php if (isset($_POST) && !empty($_POST)): ?>
                                    <?php if ($errors): ?>
                                        <?php foreach ($errors as $value): ?>
                                            <span class="errors"><?=$value?></span> <br/>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <input name = "email" type="email" class="log" placeholder="Email">
                            <input name= "password" type="password" class="log" placeholder="Mot de Passe">
                            <div class="submit">
                                <input id="submit" name= "submit" type="submit" class="log sub" value="Connecte toi">
                            </div>

                        </div>
                    </form>
                </div>
            </aside>
    </div>
   
    <script src="assets/js/index.js"></script>
</body>
</html>