<?php
    session_start();

    if(!empty($_FILES) && !empty($_FILES["image"]["name"]))
    {
        $verif = getimagesize($_FILES["image"]["tmp_name"]);
        $path = "../../userImages/" . $_SESSION["id"] . "_" . $_SESSION["lastname"] . "_" . $_SESSION["firstname"] . "/";
        $tmp = $_FILES["image"]["tmp_name"];
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        if($verif !== false)
        {
            if($extension == "jpg")
            {
                if(file_exists($path."profil.jpg"))
                {
                    unlink($path. "profil.jpg");
                    $newName = explode(".", $_FILES["image"]["name"]);
                    $new = "profil". '.' . end($newName);
                    move_uploaded_file($tmp, $path. $new);
                }
                else
                {
                    mkdir($path);
                    $newName = explode(".", $_FILES["image"]["name"]);
                    echo $new = "profil". '.' . end($newName);
                    move_uploaded_file($tmp, $path. $new);
                }
            }
            else
            {
                echo "Le fichier doit etre en JPG.";
                return 0;
            }
        }
        else
        {
            echo "error";
            return 0;
        }
    }
?>