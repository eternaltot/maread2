<?php
include "dbconfig.php";

if(isset($_POST['chapter_ID']))
{
		$chapter_ID = $_POST["chapter_ID"];
		$comment = $_POST["comment"];
		$user_ID = 0;
		$user_IP = $_POST["ip"];
		$stmt = $conn->prepare("INSERT INTO maread_comment (comment,chapter_ID,user_ID,user_IP) VALUES (?,?,?,?)");
		$stmt->bind_param("siis", $comment,$chapter_ID,$user_ID,$user_IP);
		$stmt->execute();
		/* close statement and connection */
		$stmt->close();
		$result_json = array("result" => $chapter_ID.":".$comment.":".$user_IP);
		echo json_encode($result_json);
		
}

?>