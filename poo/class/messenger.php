<?php
    include_once("connect.php");

    class Messenger extends Connect
    {
        public function __construct($session, $get)
        {
            $this -> session = $session;
            $this -> get = $get;
        }

        public function getMessage()
        {
            $db = Connect::connect();
            $idSession = $this ->session["id"];
            $idGet = $this ->get["chatWith"];
            $resquest = "SELECT author, receiver, content, create_at FROM messages WHERE (author, receiver) IN (($idSession ,$idGet), ($idGet ,$idSession))";
            $message = $db -> prepare($resquest);
            $message -> execute();
            return $message;
        }
    }
?>