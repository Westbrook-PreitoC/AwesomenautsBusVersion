<?php

require_once(__DIR__ . "/../model/config.php");

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

//this part of code explains where you select salt for the username
$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");

if ($query->num_rows == 1) {
    $row = $query->fetch_array();

    if ($row["password"] === crypt($password, $row["salt"])) {
        $_SESSION["authenticated"] = true;
        echo "<p>Login Successful!</p>";
    } else {
        echo "<p>Invalid username and password1</p>";
    }
} else {
    echo "<p>Invalid username and password2</p>";
}