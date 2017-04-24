<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "maread";
// $username = "maread_root";
// $password = "v,ibomiN";
// $db_name = "maread_db";

$conn = new mysqli($host,$username,$password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>