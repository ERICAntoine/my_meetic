<?php
    session_start();
    if(!empty($_FILES) && !empty($_FILES["image"]["name"]))
    {
        $verif = getimagesize($_FILES["image"]["tmp_name"]);
        $path = "../../userImages/" . $_SESSION["id"] . "_" . $_SESSION["lastname"] . "_" . $_SESSION["firstname"] . "/";
        if($verif !== false)
        {
            mkdir($path, 0755);
        }
        else
        {
            echo "error";
            return 0;
        }
    }
    else
    {
        echo "caca";
    }
?>