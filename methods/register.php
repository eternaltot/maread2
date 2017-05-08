<?php
session_start();
include "dbconfig.php";

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if(isset($_POST['btn-save']))
{
	if(isset($_SESSION["fb_id_register"])){
		$result = $conn->query("SELECT COUNT(*) as count FROM maread_user WHERE username like '".$_POST["username"]."' OR facebook_ID like '".$_SESSION['fb_id_register']."'");
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$user_count = $row['count'];
		}
		if($user_count>0){
			$result_json = array("already have account");
			echo json_encode($result_json);
		}else{
			$email = $_SESSION['email'];
			$fb_id = $_SESSION['fb_id_register'];
			$role = $_SESSION['role'];
			$username = explode("@", $email);
			$password = randomPassword();
			$password = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $conn->prepare("INSERT INTO maread_user (username,password,facebook_ID,role) VALUES (?,?,?,?)");
			$stmt->bind_param("ssss", $username[0],$password,$fb_id,$role);
			$stmt->execute();
			/* close statement and connection */
			$stmt->close();
			$result_json = array("OK");
			echo json_encode($result_json);
		}
	}else{
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$role = $_POST["role"];
		$password = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $conn->prepare("INSERT INTO maread_user (username,password,role) VALUES (?,?,?)");
		$stmt->bind_param("sss", $username,$password,$role);
		$stmt->execute();
		/* close statement and connection */
		$stmt->close();
		$result_json = array("result" => "OK");
		echo json_encode($result_json);
	}
}

?>