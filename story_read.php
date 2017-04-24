<?php
	include "header.php";
	include "methods/dbconfig.php";
	$slug = $_GET['slug'];

	$title = "";
	$author = "";
	$detail = "";
	$detail_author = "";
	$chapter = 0;
	$sql = "SELECT * FROM maread_chapter WHERE slug like '".$slug."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$title = $row['title'];
		$author = $row['author_ID'];
		$detail = $row['detail'];
		$detail_author = $row['detail_author'];
		$chapter = $row['chapter'];
	}else{
		$title = "Not Found";
		$detail = "Not Found";
		$detail_author = "Not Found";
	}
	/* close statement and connection */
	$conn->close();
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
</div>
<?php
	include "footer.php";
?>