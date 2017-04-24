<?php
include "dbconfig.php";

if(isset($_POST['btn-save']))
{

	$title = $_POST['title'];
	$story_id = $_POST['story_id'];
	$detail = $_POST['detail'];
	$detail_author = $_POST['detail_author'];

	$last_chapter = 0;
	$result = $conn->query("SELECT chapter FROM maread_chapter WHERE story_ID = $story_id ORDER BY chapter DESC Limit 1");
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$last_chapter = $row["chapter"];
	}

	$stmt = $conn->prepare("INSERT INTO maread_chapter (chapter,title,slug,author_ID,detail,detail_author,category_ID,story_ID,likes) VALUES (?,?,?,?,?,?,?,?,?)");
	$chapter = $last_chapter+1;
	$slug = uniqid();
	$author = 0;
	$category_ID = 0;
	$likes = 0;
	$stmt->bind_param("ississiii", $chapter,$title,$slug,$author,$detail,$detail_author,$category_ID,$story_id,$likes);
	$stmt->execute();
	/* close statement and connection */
	$stmt->close();
	echo $slug;
			
}

?>