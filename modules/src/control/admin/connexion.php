<?php
//$host = "91.216.107.219";
$host = "localhost";
$username = "jecci1157367";
$pass = "tagi6bfz9e";
$db = "jecci1157367";

$connexion = mysqli_connect($host, $username, $pass);
$database = mysqli_select_db($connexion, $db);
header('content-type: text/html, charset=utf-8');
mysqli_set_charset( $connexion , "utf8" );
?>