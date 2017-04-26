<?php
include "dbconfig.php";

if(isset($_GET['id']))
{
		$likes = 0;
		$id = $_GET['id'];
		$stmt = $conn->prepare("DELETE FROM maread_chapter WHERE ID = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		/* close statement and connection */
		$stmt->close();
		$result_json = array("result" => "delete success");
		echo json_encode($result_json);
		
}

?>