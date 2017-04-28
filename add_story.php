<?php
	include 'header.php';
?>
<div class="maincontent container" style="">
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="form-add">
				<form id="add_story" action="methods/addstory.php" method="post">
					<div class="form-group pmd-textfield ">
					<label>หมวดนิยาย</label>
                        <select id="sort" name="category" class="select-simple form-control pmd-select2">
                        	<?php
		                        $sql = "SELECT * FROM maread_category order by ID";
		                        $result = $conn->query($sql);
		                        if($result->num_rows > 0){
		                            while ($row = $result->fetch_assoc()) {
		                                $title = $row['title'];
		                                $category_id = $row['ID'];
		                    ?>
                            <option value="<?php echo $category_id;?>"><?php echo $title;?></option>
                            <?php
	                            	}
	                            }
                            ?>
                        </select>
                    </div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="title" class="control-label">ชื่อเรื่อง</label>
						<input id="title" name="title" type="text" class="form-control"></input>
					</div>
					<div class="form-group ">
						<label>Cover Image</label>
						<input name="image" type="file" class="btn btn-info" accept="image/*"></input>
					</div>
					
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="detail" class="control-label">คำโปรย</label>
						<textarea id="detail" name="detail" class="form-control"  rows="8"></textarea>
					</div>
					<div class="form-group" style="text-align: center;">
						<button name="btn-save" type="submit" class="btn btn-info">ถัดไป</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>
<script type="text/javascript">
	$(function() {
		var option = {
			dataType : "json",
			  success: function(data) {
			  	if(data.result)
			    	window.location.href ="add_chapter.php?story_id="+data.result;
				else
					console.log(data.error);
			  }
		};
	  $('#add_story').ajaxForm(option);
	});
</script>