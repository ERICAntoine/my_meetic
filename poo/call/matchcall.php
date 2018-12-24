<?php
    include("../poo/class/matchprofile.php");

    $match = new MatchProfile();
    $users = $match -> selectUsers();

?>