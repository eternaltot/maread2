<?php
include "dbconfig.php";

if(!empty($_POST["username"])) {
$result = $conn->query("SELECT COUNT(*) as count FROM maread_user WHERE username like '".$_POST["username"]."'");
if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	$user_count = $row['count'];
}
if($user_count>0) echo "<span class='status-not-available '><i class='material-icons md-dark pmd-sm'>clear</i> Username Not Available.</span>";
else echo "<span class='status-available'><i class='material-icons md-dark pmd-sm'>done</i> Username Available.</span>";
}

?>