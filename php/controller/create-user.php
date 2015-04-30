<?php

    require_once(__DIR__ . "/../model/config.php");

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    $salt = "$5$" . "round=5000$" . uniqid(mt_rand(), true) . "$";

    $hashedPassword = crypt($password, $salt);

    //this part of code makes sure your email, username, and password works
    $query = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt',"
            . "exp = 0, "
            . "exp1 = 0, "
            . "exp2 = 0, "
            . "exp3 = 0, "
            . "exp4 = 0");

    $_SESSION["name"] = $username;

    //this is statement tells us that the users were Successfully created
    if ($query) {
         //Need this for Ajax on index.php
         echo "true";
    } else {
         echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }
   