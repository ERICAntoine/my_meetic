<?php
    include("poo/class/user.php");

    if(isset($_POST) && !empty($_POST))
    {
        $validate = new Validate($_POST);
        $validate -> check("lastname");
        $validate -> check("firstname");
        $validate -> check("email");
        $validate -> check("birthday", "Birthday", "Tu as moins de 18 ans");
        $validate -> check("sex");
        $validate -> check("city");
        $validate -> check("email", "Email", "Email deja utilise");
        $validate -> check("password", "Password", "Ton mot de passe est trop grand ou trop petit");
        $validate -> check("relation");
        $errors = $validate -> errors();

        if(empty($errors))
        {
            $user = new User($_POST);
            $user -> insert();
        }
    }
?>