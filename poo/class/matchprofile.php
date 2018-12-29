<?php
    include_once("connect.php");

    class MatchProfile extends Connect
    {
        public function __construct($get)
        {
            $this -> get = $get;
        }

        public function selectUsers()
        {
            $db = Connect::connect();
            $id = $_SESSION['id'];
            $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id";
            $usersResquest = $db -> prepare($users);
            $usersResquest -> execute();
            return $usersResquest;
        }

        public function allFilter()
        {
            $db_connect = Connect::connect();
            $id = $_SESSION["id"];
            $users = "SELECT id, lastname, firstname FROM users WHERE id != $id";
            $usersResquest = $db -> prepare($users);
            $usersResquest -> execute();
            return $usersResquest;
        }

        public function cookieCity()
        {
            if(isset($this ->get) && !empty($this ->get))
            {
                foreach($_COOKIE as $key => $value)
                {
                    if($key != $this ->get["city"])
                    {
                        setcookie($this ->get["city"], time()+3600);
                    }
                    else
                    {
                        echo "Deja selectionner";
                        return 0;
                    }
                }
            }
        }

        public function convertAgeToDate($age)
        {
            $db_connect = Connect::connect();

        }
    }
?>