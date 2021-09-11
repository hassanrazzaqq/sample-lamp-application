<?php
$servername = "127.0.0.1";
$username = "mysql_user";
$password = "mysql_user";
$dbname = "moviedb";

$conn = mysqli_connect($servername, $username, $password,$dbname );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
