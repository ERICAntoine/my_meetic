<?php
    include("poo/call/indexcall.php");
    /*require_once "Faker/src/autoload.php";
    $faker = Faker\Factory::create();
    $server = "localhost";
    $dbname= "lovestory";
    $username = "eric";
    $password= "159100";
    $db = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);

    foreach(range(1,1000) as $x)
    {
        $firstname =  $faker ->firstname;
        $lastname = $faker ->lastname;
        $date = $faker ->date($format = 'Y-m-d', $max = "1999-12-31");
        $number = $faker ->numberBetween($min =  1, $max = 4);
        $city = $faker ->city;
        $email = $faker ->email;
        $pass = $faker ->password;
        $number2 = $faker ->numberBetween($min =  1, $max = 2);
        $resquest = "INSERT INTO users(lastname, firstname, birthday, sex, city, email, password,id_relation) VALUES ('$firstname', '$lastname', '$date', '$number', '$city', '$email', '$pass', $number2)";
        $db ->query($resquest);
    }
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LoveStory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/desktop/desktopIndex.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header">
            <div class="header_background">
                <div class="header_content max_width">
                    <img src="images/logo-header.png"/>
                    <ul>
                        <li><a href="index.php">Trouver L'amour</a></li>
                        <li><a href="pages/connexion.php">Connexion</a></li>
                    </ul>
                </div>
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
                                    <div class="who">
                                        <label class="log">Je suis un/une</label>
                                        <select name="sex" class="log">
                                            <option value = "1">Une femme qui recherche un homme</option>
                                            <option value = "2">Un homme qui recherche une femme</option>
                                            <option value = "3">Une femme qui recherche une femme</option>
                                            <option value = "4">Un homme qui recherche un homme</option>
                                        </select>
                                    </div>
                                    <div class="with">
                                            <label class="log">Je suis là pour</label>
                                            <select name= "relation" class="log">
                                                <option value="1">Trouver l'amour</option>
                                                <option value="2">Me faire de nouveaux amis</option>
                                            </select>
                                    </div>
                                    <div class="input">
                                        <input name="lastname" class="log" type="text" placeholder="Nom">
                                        <input name="firstname" class="log" type="text" placeholder="Prenom">
                                    </div>
                                    <input name = "email" type="email" class="log" placeholder="Email">
                                    <input name= "birthday" type="date" class="log">
                                    <input name= "city" type="text" class="log" placeholder="Ville">
                                    <input name= "password" type="password" class="log" placeholder="Mot de Passe">
                                    <div class="submit">
                                        <input id="submit" name= "submit" type="submit" class="log sub" value="Trouver l'amour aujourd'hui">
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </aside>
                <div class="heigher"></div>
            </div>
        </div>
    </header>
    <div class="diagonal"></div>
    <div class="image_pres">
        <img src="images/580b585b2edbce24c47b298f.png">
    </div>
    <section class="content_presentation max_width">
        <div class="presentation">
            <div class="how_work">
                <h2>Comment ca marche ?</h2>
                <hr/>
                <span class="violet">Commence ton aventure sur LoveStory.com en 3 etapes:</span>
                <ul>
                    <li>
                        Cree un profil
                        <p>Creer un profil personnaliser, ajouter une photo et une description pour notre partenaire ideal</p>
                    </li>
                    <li>De nombreux profil qui vous correspondent
                        <p>Trouver des membres base sur votre location.</p>
                    </li>
                    <li>Commence de nouvelle relation
                        <p>Trouvez des membres que vous aimez pour commencez votre journee</p>
                    </li>
                </ul>
            </div>
            <div class="picture_how">
                <img src="images/i-1329349_640.jpg"/>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="membre_number max_width">
            <span class="total"><?= $total ?></span>
            <span class="violet">personnes on sautez le pas !</span>
        </div>
    </div>
    <footer>
        <div class="max_width">
            <span>© Copyright 2018 Ericleplusbeau Corporation</span>
        </div>
    </footer>
    <script src="assets/js/index.js"></script>
</body>
</html>
