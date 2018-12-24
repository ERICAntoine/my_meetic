<?php
    include("../poo/class/user.php");

    if(isset($_POST) && !empty($_POST))
    {
        $validate = new Validate($_POST);
        $validate -> check("email");
        $validate -> check("password", "EmailPassword", "Email ou Mot de passe errone");

        $errors = $validate -> errors();

        if(empty($errors))
        {
            header("Location: personal.php");
        }
    }
?>