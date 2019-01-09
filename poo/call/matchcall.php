<?php
    include("../poo/class/matchprofile.php");

    $match = new MatchProfile($_GET);

    if(empty($_GET))
    {
      $users = $match -> selectUsers();
      $nbrPage = $match -> selectUsers(false);
    }
    elseif($_GET["choose"] == "All" && $_GET["age_min"] == "" && $_GET["age_max"] == "" && $_GET["city"] == "")
    {
      $users = $match -> selectUsers();
      $nbrPage = $match -> selectUsers(false);

    }
    elseif($_GET["choose"] != "All" && $_GET["age_min"] != "" && $_GET["age_max"] != "" && $_GET["city"] != "")
    {
      $users = $match -> allFilter();
      $nbrPage = $match -> allFilter(false);

    }
    else
    {
      $users = $match -> filter();
      $nbrPage = $match -> filter(false);

    }
?>