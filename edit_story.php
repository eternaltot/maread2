<?php
	include 'header.php';

	$slug = $_GET['slug'];

	$sql = "SELECT * FROM maread_story WHERE slug like '".$slug."' limit 1";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$story_ID = $row['ID'];
		$title = $row['title'];
		$author = $row['author'];
		$detail = $row['detail'];
		$img_path = $row['img_path'];
		$likes = $row['likes'];
		$views = $row['views'];
		$bookmarks = $row['bookmarks'];
		$category_ID = $row['category_ID'];
	}
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div class="maincontent container">
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="form-add">
				<form id="edit_story" action="methods/editstory.php" method="post">
					<input type="hidden" name="slug" value="<?php echo $slug;?>">
					<div class="form-group pmd-textfield">
					<label>หมวดนิยาย</label>
                        <select id="sort" name="category" class="select-simple form-control pmd-select2">
                        	<?php
		                        $sql = "SELECT * FROM maread_category order by ID";
		                        $result = $conn->query($sql);
		                        if($result->num_rows > 0){
		                            while ($row = $result->fetch_assoc()) {
		                                $category_title = $row['title'];
		                                $category_id = $row['ID'];
		                    ?>
                            <option value="<?php echo $category_id;?>" <?php echo $category_ID == $category_id ? "selected" : "" ?>><?php echo $category_title;?></option>
                            <?php
	                            	}
	                            }
                            ?>
                        </select>
                    </div>
					<div class="form-group pmd-textfield">
						<label>ชื่อเรื่อง</label>
						<input name="title" placeholder="Title Here" type="text" class="form-control" value="<?php echo $title;?>"></input>
					</div>
					<div class="form-group ">
						<label>Cover Image</label>
						<input name="image" type="file" class="btn btn-info" accept="image/*"></input>
					</div>
					<div class="form-group pmd-textfield">
						<label>คำโปรย</label>
						<textarea name="detail" class="form-control"  placeholder="Detail" rows="8"><?php echo $detail; ?></textarea>
					</div>
					<div class="form-group" style="text-align: center;">
						<button name="btn-save" type="submit" class="btn btn-info" style="border-radius:20px;">บันทึก</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>
<script type="text/javascript" >
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'detail' );
</script>
<style type="text/css">
	#cke_24,#cke_37,#cke_56{
		display: none;
	}
</style>
<script type="text/javascript">
	$(function() {
		var option = {
			dataType : "json",
			beforeSerialize:function(){
				for (instance in CKEDITOR.instances) {
				    CKEDITOR.instances[instance].updateElement();
				}
			},
			beforeSubmit:function(){
			    // console.log(CKEDITOR.instances.detail.getData());
			},
			  success: function(data) {
			  	if(data.result)
			    	window.location.href ="chapter_list.php?slug="+data.result;
			    // console.log("ok");
				else
					console.log(data.error);
			  },
			  error : function(data){
			  	console.log(data);
			  }
		};
	  $('#edit_story').ajaxForm(option);
	});
</script>