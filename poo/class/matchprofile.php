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
            $db = Connect::connect();
            $id = $_SESSION["id"];
            $lowDate = MatchProfile::convertAgeToDate($this ->get["age_min"]) . "\n";
            $upDate = MatchProfile::convertAgeToDate($this ->get["age_max"]);
            $sex = $this ->get["choose"];
            $city = $this ->get["city"];
            if($sex == 1)
            {
                $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate') AND (sex = 1 OR sex = 3) AND (city = '$city')";
            }
            else
            {
                $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate') AND (sex = 2 OR sex = 4) AND (city = '$city')";
            }
            $usersResquest = $db -> prepare($users);
            $usersResquest -> execute();
            return $usersResquest;
        }

        private function check($val)
        {
            if(isset($val) && !empty($val))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function filter()
        {
            $db = Connect::connect();
            $id = $_SESSION['id'];
            $lowDate = MatchProfile::convertAgeToDate($this ->get["age_min"]);
            $upDate = MatchProfile::convertAgeToDate($this ->get["age_max"]);
            $city = $this->get["city"];
            $sex = $this ->get["choose"];
            $ageMin = MatchProfile::check($this->get["age_min"]);
            $ageMax = MatchProfile::check($this->get["age_max"]);
            $cityCheck = MatchProfile::check($this->get["city"]); 

            if($sex && $ageMin && $ageMax)
            {
                if($sex == 1)
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate') AND (sex = 1 OR sex = 3)";
                }
                else
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate') AND (sex = 2 OR sex = 4)";
                }   
            }
            elseif($sex && $city)
            {
                if($sex == 1)
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (sex = 1 OR sex = 3) AND (city = '$city')";
                }
                else
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (sex = 2 OR sex = 4) AND (city = '$city')";
                }
            }
            elseif($sex)
            {
                if($sex == 1)
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (sex = 1 OR sex = 3)";
                }
                else
                {
                    $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (sex = 2 OR sex = 4)";
                }
            }
            elseif($ageMin && $ageMax && $city)
            {
                $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate') AND (city = '$city')";
            }
            elseif($ageMin && $ageMax)
            {
                $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (birthday >= '$upDate' AND birthday <= '$lowDate')";
            }
            elseif($city)
            {
                $users = "SELECT id, lastname, firstname, city FROM users WHERE id != $id AND (city = '$city')";
            }
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
            return date('Y-m-d', strtotime('today -'. $age .'years')); 
        }
    }
?>