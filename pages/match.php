<?php
    session_start();
    include("../poo/call/matchcall.php");
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
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/desktop/desktopMatch.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            <div class="container">
                <div class="content_card">
                    <div class="row">
                        <div class="col-2 filter_search">
                            <div class="carousel">
                                <img class="arrow" id="arrowBack" src="../images/back.svg">
                                <?php while($usersMatch = $users -> fetch(PDO::FETCH_ASSOC)){ ?>
                                    <?php $u[] = $usersMatch?>
                                    <div class="cards display">
                                        <div class="card">
                                            <img class="card-img-top">
                                            <div class="info_card">
                                                <h5 class="card_title"><?= $usersMatch["firstname"]?></h5>
                                                <p><?= $usersMatch["city"]?></p>
                                                <a class="btn-chat" href="chat.php?chatWith=<?=$usersMatch["id"]?>">Discuter</a>
                                            </div>
                                        </div>  
                                    </div>                          
                                <?php } ?>
                                <img class="arrow" id="arrowNext" src="../images/next.svg">
                            </div>
                            <form method="get">
                                <div class="search_title">
                                    <h5>Search</h5>
                                    <hr/>
                                </div>
                                <div class="all_filter">
                                    <div class="looking_for">
                                        <label>Je recherche un/une: </label>
                                        <select name="choose">
                                            <option>All</option>
                                            <option value="1">Femme</option>
                                            <option value="2">Homme</option>
                                        </select>
                                    </div>
                                    <div class="age">
                                        <label>Age: </label>
                                        <div class="age_inputs">
                                            <input name = "age_min"type="number" min="18">
                                            <input name = "age_max" type="number" min="18">
                                        </div>         
                                    </div>
                                    <div class="city">
                                        <label>Ville: </label>
                                        <input type="text" id="city" name= "city" placeholder="City">
                                    </div>
                                    <div class="btn_filter">
                                        <input type="submit" class="sub" value="Rechercher">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="profiles">
                            <div class="flex-row row">
                            <?php if(empty($u)):?>
                                    <strong> La recherche n'a trouver personne !</strong>
                                    <?php return 0;?>
                            <?php endif ?>
                                <?php foreach($u as $usersMatch):?>
                                    <div class="grid-element cards">
                                        <div class="card">
                                        <?php $path = "../userImages/" . $usersMatch['id'];?>
                                        <?php if(file_exists($path . '/profil.jpg')):?>
                                            <img class="card-img" src="<?= $path . "/profil.jpg"?>">
                                        <?php endif ?>
                                        <?php if(!file_exists($path . '/profil.jpg')):?>
                                            <img class="card-img-top" src="../images/man-user.png">
                                        <?php endif ?>
                                            <div class="info_card">
                                                <h5 class="card_title"><?= $usersMatch["firstname"]?></h5>
                                                <p><?= $usersMatch["city"]?></p>
                                                <a class="btn-chat" href="chat.php?chatWith=<?=$usersMatch["id"]?>">Discuter</a>
                                            </div>
                                        </div>  
                                    </div>                          
                                <?php endforeach ?>
                                <?php
                                if(count($_GET) > 1)
                                {
                                    $choose = $_GET["choose"];
                                    $age_min = $_GET["age_min"];
                                    $age_max = $_GET["age_max"];
                                    $city = $_GET["city"];
                                }
                                ?>
                            </div>
                            <ul class='pagination pagi'>
                                <?php if(count($_GET) > 1):?>
                                    <?php for($i = 1; $i < $nbrPage + 1; $i++): ?>
                                        <li class='page-item'><a class='page-link' href= <?= 'match.php?choose='.$choose. '&age_min='. $age_min. '&age_max='.$age_max .'&city=' . $city . '&page=' . $i?>><?=$i?></a></li>
                                    <?php endfor ?>
                                <?php endif ?>
                                <?php if(empty($_GET) || isset($_GET["page"])):?>
                                    <?php for($i = 1; $i < $nbrPage + 1; $i++): ?>
                                    <li class='page-item'><a class='page-link' href= <?= 'match.php?page=' . $i?>><?=$i?></a></li>
                                    <?php endfor ?>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>  
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
    <script src="../assets/js/carousel.js""></script>
    <script src="../assets/js/index.js"></script>
</body>
</html>

<script>
    var city = "Marseille";
    $(document).ready(function(){
    $.ajax({
            type: "GET",
            dataType: "json",
            url: "https://transit.api.here.com/v3/coverage/search.json?app_id=eXdLlQLK7Vubow3Aa7q6&app_code=LvCW5PkDhPy48Lc5Qy3AxA&name=" + city,
            success: function(response)
            {
                console.log(response["Res"]["Coverage"]["Cities"]["City"][0]);
            }
        });
});

$(document).ready(function()
{
    $("#city").autocomplete({
        source: "../poo/call/autocomplete.php",
    });

    $("#submit").click(function()
    {
        document.cookie = "city = " + $("#city").val() + "; expires = Fri, 23 Nov 2019 19:00:00 UTC";
    })

    console.log(document.cookie);
});



</script>