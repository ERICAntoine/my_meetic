<?php
    include("../poo/class/matchprofile.php");

    $match = new MatchProfile($_GET);

    if(empty($_GET))
    {
      $users = $match -> selectUsers();
    }
    elseif($_GET["choose"] == "All" && $_GET["age_min"] == "" && $_GET["age_max"] == "" && $_GET["city"] == "")
    {
      $users = $match -> selectUsers();
    }
    elseif($_GET["choose"] != "All" && $_GET["age_min"] != "" && $_GET["age_max"] != "" && $_GET["city"] != "")
    {
      $users = $match -> allFilter();
    }
    else
    {
      $users = $match -> filter();
    }


  //$match ->cookieCity();
  //var_dump($_COOKIE);
?>