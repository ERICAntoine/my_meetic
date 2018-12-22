<?php

include("connect.php");
session_start();

class User extends Connect
{
    function __construct($post)
    {
        $this -> post = $post;
    }

    public function insert()
    {
        $db = Connect::connect();
        $insert = "INSERT INTO users(lastname, firstname, birthday, sex, city, email, password,id_relation) VALUES ('".$this->post["lastname"]."', '".$this->post["firstname"]."', '".$this->post["birthday"]."', '".$this->post["sex"]."', '".$this->post["city"]."', '".$this->post["email"]."', '".$this->post["password"]."', '".$this->post["relation"]."')";
        $insertUser = $db -> prepare($insert);
        $insertUser -> execute();
    }
}

class Validate
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

    function valideInput($name)
    {
        return isset($this->post[$name]) && $this->post[$name] != "";
    }

    function errors()
    {
        return $this ->errors;
    }
}

if(isset($_POST) && !empty($_POST))
{
    $validate = new Validate($_POST);
    $validate -> check("lastname");
    $validate -> check("firstname");
    $validate -> check("email");
    $validate -> check("birthday", "Birthday", "Tu as moins de 18 ans");
    $validate -> check("sex");
    $validate -> check("city");
    $validate -> check("email");
    $validate -> check("password", "Password", "Ton mot de passe est trop grand ou trop petit");
    $validate -> check("relation");
    $errors = $validate -> errors();

    if(empty($errors))
    {
        $user = new User($_POST);
        $user -> insert();
    }
}

?>