<?php
    include("connect.php");

    class Personals extends Connect
    {
        public function __construct($post)
        {
            $this ->post = $post;
        }

        public function updateInfo()
        {
            if(isset($_POST) && !empty($_POST))
            {
                $db = Connect::connect();
                $id = $_SESSION["id"];
                $lastname = $this ->post["lastname"];
                $firstname = $this ->post["firstname"];
                $email = $this ->post["email"];
                $date = $this ->post["date"];
                $city = $this ->post["city"];
                $resquest = "UPDATE users SET lastname= '$lastname', firstname = '$firstname', email='$email', birthday='$date', city='$city' WHERE id=$id";
                $update = $db -> prepare($resquest);
                $update -> execute();
            }

        }
    }
?>