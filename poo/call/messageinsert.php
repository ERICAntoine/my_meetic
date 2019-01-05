<?php
    session_start();

$server = "localhost";
$dbname= "lovestory";
$username = "eric";
$password= "159100";
$db = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);

function postMessage($post)
{
    global $db;

    $receiver = $_GET["chatWith"];
    $author = $_SESSION["id"];
    $resquest = "INSERT INTO messages (author, receiver, content, create_at) VALUES ($author, $receiver, '$post', NOW())";
    $insertMessage = $db -> prepare($resquest);
    $bool = $insertMessage -> execute();

    if($bool)
    {
        echo "sucess";
    }
    else
    {
        echo "bof";
    }
}

    postMessage($_GET["message"]);


?>