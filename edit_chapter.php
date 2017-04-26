<?php
	include 'header.php';
	include 'methods/dbconfig.php';
	$chapter_slug = $_GET["slug"];
	$sql = "SELECT * FROM maread_chapter WHERE slug like '".$chapter_slug."' limit 1";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$chapter_ID = $row['ID'];
		$title = $row['title'];
		$detail = $row['detail'];
		$detail_author = $row['detail_author'];
	}
?>
<div class="maincontent container" style="">
	<!-- Display alert at the top-center position of the window -->
	<button id="alert" type="button" data-positionX="center" data-positionY="top" data-effect="fadeInUp" data-type="success" data-message="บันทึกเสร็จสิ้น" data-duration="4000" class="btn pmd-ripple-effect btn-default pmd-btn-raised pmd-alert-toggle" style="display: none;">Top Center</button>
	<form id="edit_chapter" action="methods/editchapter.php" method="post">
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="form-add">
					<div class="form-group">
						<label>ชื่อตอน</label>
						<input name="title" placeholder="Chapter Title Here" type="text" class="form-control" value="<?php echo $title;?>"></input>
					</div>
					<div class="form-group">
						<label>เนื้อเรื่อง</label>
						<textarea name="detail" class="form-control"  placeholder="Chapter Detail" rows="8"><?php echo $detail;?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="chapter_id" value="<?php echo $chapter_ID; ?>"></input>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="form-add">
					<div class="form-group">
						<label>คำพูดจากนักเขียน</label>
						<textarea name="detail_author" class="form-control" rows="8"><?php echo $detail_author;?></textarea>
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
			dataType : "json",
			  success: function(data) {
			  	console.log(data);
			  	if(data.result == "ok"){
			  		$("#alert").click();
			  	}
			    
			    
			  }
		};
	  $('#edit_chapter').ajaxForm(option);
	});
</script>