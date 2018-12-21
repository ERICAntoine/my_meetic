<?php
class Connect
{
    function __construct()
    {
        $server = "localhost";
        $dbname= "lovestory";
        $username = "eric";
        $password= "159100";
        $this -> $db_connect = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);
    }
}

?>