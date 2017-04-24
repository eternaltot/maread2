<?php
	include 'header.php';
	include 'methods/dbconfig.php';
	$story_id = $_GET["story_id"];
	$title = "";

	$sql = "SELECT * FROM maread_story WHERE ID=".$story_id;
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$title = $row['title'];
	}else{
		$title = "Not Found";
	}
	/* close statement and connection */
	$conn->close();
?>
<div class="maincontent container" style="">
	<form id="add_chapter" action="methods/addchapter.php" method="post">
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="form-add">
					<div class="form-group">
						<label>ชื่อตอน</label>
						<input name="title" placeholder="Chapter Title Here" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>เนื้อเรื่อง</label>
						<textarea name="detail" class="form-control"  placeholder="Chapter Detail" rows="8"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="story_id" value="<?php echo $story_id; ?>"></input>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="form-add">
					<div class="form-group">
						<label>คำพูดจากนักเขียน</label>
						<textarea name="detail_author" class="form-control" rows="8"></textarea>
					</div>
					<div class="form-group" style="text-align: center;">
						<button name="btn-save" type="submit" class="btn btn-info" style="border-radius:20px;">บันทึก</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
	include 'footer.php';
?>
<script type="text/javascript">
	$(function() {
		var option = {
			  success: function(data) {
			    window.location.replace("story_read.php?slug="+data);
			  }
		};
	  $('#add_chapter').ajaxForm(option);
	});
</script>