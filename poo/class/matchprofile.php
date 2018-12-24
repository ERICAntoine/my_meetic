<?php
    include("connect.php");

    class MatchProfile extends Connect
    {
        public function selectUsers()
        {
            $db = Connect::connect();
            $id = $_SESSION['id'];
            $users = "SELECT lastname, firstname FROM users WHERE id != $id";
            $usersResquest = $db -> prepare($users);
            $usersResquest -> execute();
            return $usersResquest;
        }
    }
?>