<?php
    session_start();
    if(!empty($_FILES) && !empty($_FILES["image"]["name"]))
    {
        $verif = getimagesize($_FILES["image"]["tmp_name"]);
        $path = "../../userImages/" . $_SESSION["id"] . "_" . $_SESSION["lastname"] . "_" . $_SESSION["firstname"];
        $tmp = $_FILES["image"]["tmp_name"];
        if($verif !== false)
        {
            //mkdir($path);
            move_uploaded_file($tmp, $path. $_FILES["image"]["name"]);
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