<?php
include "dbconfig.php";

if(isset($_POST['btn-login'])) {
$result = $conn->query("SELECT * FROM maread_user WHERE username like '".$_POST["username"]."'");
$password = $_POST['password'];
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$password_hash = $row['password'];
	if(password_verify($password,$password_hash)){
		$arrayName = array('result' => "OK",'userID' => $row['ID'] );
		echo json_encode($arrayName);
	}else{
		$arrayName = array('result' => "ERROR");
		echo json_encode($arrayName);
	}
}

?>