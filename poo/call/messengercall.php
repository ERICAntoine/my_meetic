<?php

include ("../class/messenger.php");
session_start();
$messenger = new Messenger($_SESSION, $_GET);
$message = $messenger ->getMessage();


while($messages = $message -> fetch(PDO::FETCH_ASSOC))
{
    $m[] = $messages;

}

$jsonMessage = json_encode($m);
echo $jsonMessage;
?>