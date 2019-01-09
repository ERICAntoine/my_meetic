<?php
    include ("../poo/class/messenger.php");
    $profiles = new Messenger($_SESSION, $_GET);
    $allProfil = $profiles -> getProfiles();
?>