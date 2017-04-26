<?php
include "dbconfig.php";

if(isset($_POST['btn-save']))
{

	$title = $_POST['title'];
	$chapter_id = $_POST['chapter_id'];
	$detail = $_POST['detail'];
	$detail_author = $_POST['detail_author'];

	$stmt = $conn->prepare("UPDATE maread_chapter SET title=?,detail=?,detail_author=?,category_ID=? WHERE ID = ?");
	$category_ID = 0;
	$stmt->bind_param("sssii", $title,$detail,$detail_author,$category_ID,$chapter_id);
	$stmt->execute();
	/* close statement and connection */
	$stmt->close();
	$result = array('result' => "ok" );
	echo json_encode($result);
}

?>