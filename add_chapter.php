<?php
	include 'header.php';
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
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div class="maincontent container" style="">
	<form id="add_chapter" action="methods/addchapter.php" method="post">
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="form-add">
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="title" class="control-label">ชื่อตอน</label>
						<input id="title" name="title" type="text" class="form-control"></input>
					</div>
					<div class="form-group pmd-textfield">
						<label for="detail" class="control-label">เนื้อเรื่อง</label>
						<textarea id="detail" name="detail" class="form-control" rows="8"></textarea>
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
					<div class="form-group pmd-textfield ">
						<label class="control-label">คำพูดจากนักเขียน</label>
						<textarea id="detail_author" name="detail_author" class="form-control" rows="8"></textarea>
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
<script type="text/javascript" >
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'detail' );
    CKEDITOR.replace( 'detail_author' );
</script>
<style type="text/css">
	#cke_28,#cke_36,#cke_41,#cke_60,#cke_124,#cke_132,#cke_137,#cke_156{
		display: none;
	}
</style>
<script type="text/javascript">
	$(function() {
		var option = {
			beforeSerialize:function(){
				for (instance in CKEDITOR.instances) {
				    CKEDITOR.instances[instance].updateElement();
				}
			},
			  success: function(data) {
			    window.location.replace("read_chapter.php?slug="+data);
			  }
		};
	  $('#add_chapter').ajaxForm(option);
	});
</script>
