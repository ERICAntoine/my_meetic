<?php

include("connect.php");

class User extends Connect
{
    function __construct($lastname, $firstname, $birthday, $sex, $city, $email, $password)
    {
        $this -> lastname = $lastname;
        $this -> firstname = $firstname;
        $this -> birthday = $birthday;
        $this -> sex = $sex;
        $this -> city = $city;
        $this -> email = $email;
        $this -> password = $password;
    }

    public function insert()
    {
        $insert = "INSERT INTO users (lastname, firstname, birthday, sex, city, email, password) VALUES ('".$this->lastname."', '".$this->firstname."', '".$this -> birthday."', '".$this -> sex."', '".$this -> city."', '".$this -> email."', '".$this -> password."')";
        echo connect::$db_connect;
    }
}

?>