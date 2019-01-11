<?php

include("../class/connect.php");

$db_connect = new Connect();
$db = $db_connect -> connect();

$city = $_GET["term"];

if(isset($city) && !empty($city))
{
    $users = "SELECT MIN(id) as 'id', city FROM users WHERE city LIKE '". $city ."%' GROUP BY city";
    $usersResquest = $db -> prepare($users);
    $usersResquest -> execute();
    $cityData = array();

    while($donnes = $usersResquest -> fetch(PDO::FETCH_ASSOC))
    {
        array_push($cityData, $donnes["city"]);
    }

    echo json_encode($cityData);
}
?>