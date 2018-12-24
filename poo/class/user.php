<?php

include_once("connect.php");
class User extends Connect
{
    function __construct($post)
    {
        $this -> post = $post;
    }

    public function insert()
    {
        $db = Connect::connect();
        $password = password_hash($this ->post["password"] , PASSWORD_DEFAULT);
        $insert = "INSERT INTO users(lastname, firstname, birthday, sex, city, email, password,id_relation) VALUES ('".$this->post["lastname"]."', '".$this->post["firstname"]."', '".$this->post["birthday"]."', '".$this->post["sex"]."', '".$this->post["city"]."', '".$this->post["email"]."', '".$password."', '".$this->post["relation"]."')";
        $insertUser = $db -> prepare($insert);
        $insertUser -> execute();
    }
}

class Validate extends Connect
{
    public $errors = array();

    function __construct($post)
    {
        $this->post = $post;
    }

    function check($name, $opt = NULL, $message = NULL)
    {
        $validate = ($opt == NULL) ? "valideInput" : "valide$opt";

        if(!$this->$validate($name) && $message != NULL)
        {
            $this-> errors[$name] = $message;
        }
        elseif(!$this -> $validate($name))
        {
            $this -> errors[$name] = "Le champs $name n'a pas ete rempli correctement";
        }
    }

    function valideBirthday($name)
    {
        if(isset($this ->post[$name]) && $this ->post[$name] != "")
        {
            $date = $this ->post[$name];
            $birthday = strtotime($date);
        
            if(time() - $birthday < 18 * 31536000)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        else
        {
            return false;
        }    
    }

    function valideEmail($name)
    {
        $db = Connect::connect();
        $email = $this ->post[$name];
        $count = $db -> query("SELECT email FROM users WHERE email = '$email'");
        $row = $count -> rowCount();

        if($row == 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function validePassword($name)
    {
        if(isset($this ->post[$name]) && $this->post[$name] != "")
        {
            $pass = $this->post["password"];
            $length = strlen($pass);
            
            if($length < 6 || $length > 255)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        else
        {
            return false;
        }
    }

    function valideEmailPassword($name)
    {
        $db = Connect::connect();
        $email = $this ->post["email"];
        $password = $this -> post["password"];
        $checkUser = $db -> prepare("SELECT id, lastname, firstname, email, password FROM users WHERE email = '$email'");
        $checkUser -> execute();

        while($check = $checkUser -> fetch(PDO::FETCH_ASSOC))
        {
            if(password_verify($password, $check["password"]))
            {
                session_start();
                $_SESSION["id"] = $check["id"];
                $_SESSION["lastname"] = $check["lastname"];
                $_SESSION["firstname"] = $check["firstname"];
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    function valideInput($name)
    {
        return isset($this->post[$name]) && $this->post[$name] != "";
    }

    function errors()
    {
        return $this ->errors;
    }
}
?>