<?php
	include 'header.php';
?>
<div class="maincontent container" style="">
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="form-add">
				<form>
					<div class="form-group">
						<label>Title</label>
						<input placeholder="Title Here" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input placeholder="Author Name" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Detail</label>
						<textarea class="form-control"  placeholder="Detail" rows="8"></textarea>
					</div>
					<div class="form-group" style="text-align: center;">
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>