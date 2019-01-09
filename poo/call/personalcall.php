<?php
    include("/var/www/html/my_meetic/poo/class/infopersonal.php");

    $occ = new Personals($_POST);
    $occ -> updateInfo();
    $occ -> refresh();
?>