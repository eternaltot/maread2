<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "maread";

$conn = new mysqli($host,$username,$passowrd,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>