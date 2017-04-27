<?php
include "dbconfig.php";

if(isset($_POST['btn-save']))
{

$title = $_POST['title'];
$detail = $_POST['detail'];
$category_ID = $_POST['category'];

if(isset($_FILES["image"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png","gif");
		$temporary = explode(".", $_FILES["image"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg")
		) && ($_FILES["image"]["size"] < 10000000)//Approx. 10mb files can be uploaded.
		&& in_array($file_extension, $validextensions)){
			if ($_FILES["image"]["error"] > 0)
			{
				$error = "Return Code: " . $_FILES["image"]["error"];
				$err = array("error" => $error);
				echo json_encode($err);
			}
			else
			{
				$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = "../upload/".date('m')."/".$_FILES['image']['name']; // Target path where file is to be stored
				if(!file_exists("../upload/".date('m'))){
					mkdir("../upload/".date('m'), 0755,true);
				}
				if (file_exists($targetPath)) {
					// echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
					unlink($targetPath);
				}
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				$pathsave = "upload/".date('m')."/".$_FILES['image']['name'];
				$stmt = $conn->prepare("INSERT INTO maread_story (title,slug,author,detail,img_path,category_ID,likes) VALUES (?, ?, ?,?,?,?,?)");
				$slug = uniqid();
				$author = 0;
				$likes = 0;
				$stmt->bind_param("ssissii", $title,$slug,$author,$detail,$pathsave,$category_ID,$likes);
				$stmt->execute();
				$last_id = $stmt->insert_id;
				/* close statement and connection */
				$stmt->close();
				$result = array("result" => $last_id);

				echo json_encode($result);
			}
		}else if($_FILES["image"]["size"]>=10000000){
			$error = "ขนาดไฟล์ใหญ่เกินกำหนด กรุณาย่อขนาดไฟล์รูปภาพ";
			$err = array("error" => $error);
			echo json_encode($err);
		}
	}
}

?>