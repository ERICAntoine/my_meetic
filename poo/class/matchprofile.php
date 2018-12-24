<?php
    include_once("connect.php");

    class MatchProfile extends Connect
    {
        public function selectUsers()
        {
            $db = Connect::connect();
            $id = $_SESSION['id'];
            $users = "SELECT id, lastname, firstname FROM users WHERE id != $id";
            $usersResquest = $db -> prepare($users);
            $usersResquest -> execute();
            return $usersResquest;
        }
    }
?>