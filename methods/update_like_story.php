<?php
include "dbconfig.php";

if(isset($_GET['id']))
{
		$likes = 0;
		$id = $_GET['id'];
		$stmt = $conn->prepare("UPDATE maread_story set likes = likes+1 WHERE ID = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		$result = $conn->query("SELECT likes FROM maread_story WHERE ID =".$id);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$likes = $row['likes'];
		}
		/* close statement and connection */
		$stmt->close();
		$result_json = array("result" => $likes);
		echo json_encode($result_json);
		
}

?>