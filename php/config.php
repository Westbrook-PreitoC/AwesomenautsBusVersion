<?php

require_once(__DIR__ . "/database.php");
session_start();
session_regenerate_id(true);

$path = "/CameronPAwesomenauts/php/";

$host = "localhost";
$username = "root";
$password = "root";
$database = "awesomenauts_db";

//this code tells us that the isset's connection is working 
if (!isset($_SESSION["connection"])) {
    $connection = new Database($host, $username, $password, $database);
    $_SESSION["connection"] = $connection;
}
     
    