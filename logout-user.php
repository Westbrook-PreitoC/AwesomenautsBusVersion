<?php

require_once(__DIR__ . "/../model/config.php");

unset($_SESSION["authenticated"]);

//this part of code lets us hide or store information when we logout
session_destroy();
header("Location: " . $path . "index.php");

