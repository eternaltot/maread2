<?php
	include 'header.php';
?>
<div class="maincontent container" style="">
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="form-add">
				<form id="add_story" action="methods/addstory.php" method="post">
					<div class="form-group">
						<label>Story Title</label>
						<input name="title" placeholder="Title Here" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input name="author" placeholder="Author Name" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Story Image</label>
						<input name="image" type="file" class="btn btn-info" accept="image/*"></input>
					</div>
					<div class="form-group">
						<label>Story Detail</label>
						<textarea name="detail" class="form-control"  placeholder="Detail" rows="8"></textarea>
					</div>
					<div class="form-group" style="text-align: center;">
						<button name="btn-save" type="submit" class="btn btn-info">Submit</button>
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
	  $('#add_story').ajaxForm(function(){
	  	$('#add_story').clearForm();
	  });
	});
</script>