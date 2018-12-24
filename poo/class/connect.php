<?php
class Connect
{
    protected function connect()
    {
        $server = "localhost";
        $dbname= "lovestory";
        $username = "eric";
        $password= "159100";
        $db_connect = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);
        return $db_connect;
    }
}

?>