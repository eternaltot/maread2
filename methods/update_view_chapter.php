<?php
include "dbconfig.php";

if(isset($_GET['id']))
{
		$views = 0;
		$id = $_GET['id'];
		$stmt = $conn->prepare("UPDATE maread_chapter set views = views+1 WHERE ID = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		$result = $conn->query("SELECT views FROM maread_chapter WHERE ID =".$id);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$views = $row['views'];
		}
		/* close statement and connection */
		$stmt->close();
		$result_json = array("result" => $views);
		echo json_encode($result_json);
		
}

?>