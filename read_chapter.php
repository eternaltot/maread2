<?php
	include "header.php";
	include "methods/dbconfig.php";
	$slug = $_GET['slug'];
	$ID = "";
	$title = "";
	$author = "";
	$detail = "";
	$detail_author = "";
	$chapter = 0;
	$slug_next = "";
	$slug_previous = "";
	$sql = "SELECT * FROM maread_chapter WHERE slug like '".$slug."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$ID = $row['ID'];
		$title = $row['title'];
		$author = $row['author_ID'];
		$story_ID = $row['story_ID'];
		$detail = $row['detail'];
		$detail_author = $row['detail_author'];
		$chapter = $row['chapter'];
		$likes = $row['likes'];

		$sql_next = "SELECT slug FROM maread_chapter WHERE story_ID = $story_ID AND chapter = ".($chapter+1). " LIMIT 1";
		$result_next = $conn->query($sql_next);
		if($result_next->num_rows > 0){
			$row_next = $result_next->fetch_assoc();
			$slug_next = $row_next['slug'];
		}

		$sql_previous = "SELECT slug FROM maread_chapter WHERE story_ID = $story_ID AND chapter = ".($chapter-1). " LIMIT 1";
		$result_previous = $conn->query($sql_previous);
		if($result_previous->num_rows > 0){
			$row_previous = $result_previous->fetch_assoc();
			$slug_previous = $row_previous['slug'];
		}
	}else{
		$title = "Not Found";
		$detail = "Not Found";
		$detail_author = "Not Found";
	}
?>
<div class="title-numberep">
    <i class="material-icons md-light icon-navigate-before">navigate_before</i>
    <h2><?php echo $title;?></h2>
    <span>
<a href="javascript:void(0);" class="pmd-ripple-effect"><i class="material-icons md-light icon-bookmark">bookmark</i></a>
<a href="javascript:void(0);" class="pmd-ripple-effect"><i class="material-icons md-light icon-share">share</i></a>
</span>
</div>
<!-- Main Content -->
<div class="maincontent">
    <div class="section-row">
        <div class="ep-number"><?php echo $chapter;?></div>
        <div class="story-content">
            <?php echo $detail;?>
        </div>
        <div class="author-box">
            <div class="media-left pmd-ripple-effect pic-profile">
                <img src="images/kla.jpg" width="40" height="40" alt="avatar">
            </div>
            <div class="name-author">
                By<span>Klanarong</span>
            </div>
            <div class="description">
                <p><?php echo $detail_author;?></p>
            </div>
        </div>
    </div>
    <div class="section-row comment-row">
        <div class="comment-box">Comment</div>
        <div class="footer-ep">
            <div class="col-md-4 like-count ">
			<button class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-link likes" type="button"><i class="material-icons pmd-lg md-light pmd-ripple-effect">favorite_border</i> </button><span class="count"><?php echo $likes > 1000 ? floor_dec($likes/1000,1) . "K" : $likes;?></span>
            </div>
            <div class="col-md-4 navigator-ep"><a href="read_chapter.php?slug=<?php echo $slug_previous;?>" class="pmd-ripple-effect <?php echo $slug_previous <> '' ? '' : 'hide'; ?>"><i class="material-icons md-light">navigate_before</i></a><span class="number-ep">EP. <?php echo $chapter;?></span><a href="read_chapter.php?slug=<?php echo $slug_next;?>" class="pmd-ripple-effect <?php echo $slug_next <> '' ? '' : 'hide'; ?>"><i class="material-icons md-light">navigate_next</i></a></div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<?php
	include "footer.php";
?>
<script type="text/javascript">
	function round(value, precision) {
	    var multiplier = Math.pow(10, precision || 0);
	    return Math.round(value * multiplier) / multiplier;
	}
	$(function() {
		$.ajax({
			url: "methods/update_view_chapter.php?id=<?php echo $ID;?>",
	        data: null,
	        dataType : "json",
	        success: function( data ) {
	        }
		});
		$(".likes").on('click',function(){
			$.ajax({
				url: "methods/update_like_chapter.php?id=<?php echo $ID;?>",
		        data: null,
		        dataType : "json",
		        success: function( data ) {
		        	console.log(data);
		        	var like = data.result;
		        	$(".like-count span").html(like > 1000 ? round((like/1000),1) + "K" : like);
		        	$(".likes i").html("favorite");
		        }
			});
		});
	});

</script>