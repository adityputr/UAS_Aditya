<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "db_uas";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Oops! Terjadi kesalahan");
}

?>