<?php
   include("../class/user.php");

    if(isset($_POST) && !empty($_POST))
    {
        $validate = new Validate($_POST);
        $validate -> check("email");
        $validate -> check("password", "EmailPassword", "Email ou Mot de passe errone");

        $errors = $validate -> errors();

        if(empty($errors))
        {
            $c = array("Success");
            $json = json_encode($c);
            echo $json;
            //header("Location: ../../pages/personal.php");
        }
        else
        {
            $e = json_encode($errors);
            echo $e;
        }
    }
?>