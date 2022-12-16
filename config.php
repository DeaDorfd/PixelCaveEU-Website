<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "login";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Fehlgeschlagen12.')</script>");
}

function mySha256($str) {
        $str = hash('sha256', $str);
    return $str;
}


?>
