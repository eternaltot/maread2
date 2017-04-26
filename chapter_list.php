<?php
	include 'header.php';

	$slug = $_GET['slug'];

	$title = "";
	$author = "";
	$detail = "";
	$detail_author = "";
	$chapter = 0;
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
		$views = $row['views']+1;
		$bookmarks = $row['bookmarks'];
	}else{
		$title = "Not Found";
		$detail = "Not Found";
		$detail_author = "Not Found";
	};
?>
<div class="maincontent">
    <div class="section-row home-section-1 story-feature">
        <div class="hilight-homepage">
            <img src="<?php echo $img_path;?>">
        </div>
        <div class="detail-count-box">
            <span class="favorite"><a href="javascript:void(0);" class="likes"><i class="material-icons md-light">favorite</i></a><span class="num-like"><?php echo $likes > 1000 ? ($likes/1000)."K" : $likes; ?></span></span>
            <span class="watched"><i class="material-icons md-light">visibility</i><?php echo $views > 1000 ? ($views/1000)."K" : $views; ?></span>
            <span class="bookmark"><i class="material-icons md-light">bookmark</i><?php echo $bookmarks > 1000 ? ($bookmarks/1000)." K" : $bookmarks; ?></span>
            <br><span class="name-author">By Klanarong</span>
            <div class="excerpt">
            <?php echo $detail;?>
            </div>
        </div>
        
        <div class="edit-box"><a href="edit_story.php?slug=<?php echo $slug;?>" class="pmd-ripple-effect"><i class="material-icons md-light icon-edit">edit</i></a></div>
    </div>
    <div class="section-row home-section-3 story-section storyedit-section">
        <div class="popular head-title">
            <h3 class="text-title"><?php echo $title;?></h3>
        </div>
        <div class="popular-list">
            <ul class="list-group pmd-list pmd-card-list">
            <li class="list-group-item add-new-chapter">
                <div class="media-left number"><a class="add_chapter" href="add_chapter.php?story_id=<?php echo $story_ID;?>"><i class="material-icons pmd-lg add pmd-ripple-effect icon-add">add</i></a></div>
                <div class="media-body">
                    <h3 class="list-group-item-heading">เขียนตอนใหม่</h3>
                </div>
                <div class="media-right">
                </div>
            </li>
            <?php
                $sql = "SELECT * FROM maread_chapter WHERE story_ID = $story_ID";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                            $chapter_id = $row['ID'];
                            $chapter_title = $row['title'];
                            $chapter_likes = $row['likes'];
                            $chapter_slug = $row['slug'];
                            $chapter_chapter = $row['chapter'];
                            $chapter_date = $row['createdate'];
            ?>
                <li class="list-group-item top-first">
                    <div class="media-left number"><span><?php echo $chapter_chapter;?></span></div>
                    <div class="media-body">
                        <a href="read_chapter.php?slug=<?php echo $chapter_slug;?>"><h3 class="list-group-item-heading"><?php echo $chapter_title;?></h3></a>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span><?php echo $chapter_likes > 1000 ? ($chapter_likes/1000)."K" : $chapter_likes; ?></span></div>
                        <div class="media-right">
                            <div class="edit-delete-box">
                                    <span class="dropdown pmd-dropdown clearfix edit">
                                    <a href="javascript:void(0);" class="pmd-ripple-effect dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true"><i class="material-icons md-light icon-edit">edit</i></a>
                                    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
        <li role="presentation"><a href="edit_chapter.php?slug=<?php echo $chapter_slug;?>" tabindex="-1" role="menuitem">แก้ไขเรื่องนี้</a></li>
    </ul>
    </span>
                                    <span class="dropdown pmd-dropdown clearfix delete">
                                    <a href="javascript:void(0);" class="pmd-ripple-effect dropdown-toggle pmd-dropdown-hover" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true"><i class="material-icons md-light icon-delete">delete</i></a>
                                    <ul aria-labelledby="dropdownMenu2" role="menu" class="dropdown-menu">
        <li role="presentation"><a href="javascript:void(0);" class="btn-delete" data-value="<?php echo $chapter_id;?>" tabindex="-1" role="menuitem">ลบเรื่องนี้</a></li>
    </ul>
    </span>
                                </div>
                            </div>
                        <div class="post-date-data edit-mode"><span><?php echo $chapter_date;?></span></div>
                    </div>
                </li>
                <?php
                        }
                    }
                ?>
                <!-- <li class="list-group-item">
                    <div class="media-left number"><span>2</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>3</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>4</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>5</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li> -->
            </ul>
            <!-- <ul class="list-group pmd-list pmd-card-list">
                <li class="list-group-item">
                    <div class="media-left number"><span>6</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>7</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>8</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>9</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="media-left number"><span>10</span></div>
                    <div class="media-body">
                        <h3 class="list-group-item-heading">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data"><i class="material-icons md-light favorite">favorite</i><span>1234567 </span></div>
                        <div class="post-date-data"><span>02/12/17</span></div>
                    </div>
                    <div class="media-right">
                    </div>
                </li>
            </ul> -->
        </div>
    </div>
    <div class="section-row author-relate-section">
        <div class="bookmark head-title">
            <h3 class="text-title">รวมเรื่องนักเขียน</h3>
            <a href="javascript:void(0);"><i class="material-icons md-light all-next">chevron_right</i><i class="material-icons md-light all-next">chevron_right</i></a>
        </div>
        <div class="bookmark-list-row">
            <div class="block-row">
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="feature-thumbnail">
                        <img src="images/hilight.jpg">
                    </div>
                    <div class="title-content">
                        <h3 class="title-article">ขอบฟ้า ขอบฝั่ง สายน้ำและทะเล</h3>
                        <div class="favorite-data">
                            <i class="material-icons md-light favorite">favorite</i><span>1234567 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	include 'footer.php';
?>
<script type="text/javascript">
    $(function() {
        $.ajax({
            url: "methods/update_view_story.php?id=<?php echo $story_ID;?>",
            data: null,
            dataType : "json",
            success: function( data ) {
            }
        });
        $(".likes").on('click',function(){
            $.ajax({
                url: "methods/update_like_story.php?id=<?php echo $story_ID;?>",
                data: null,
                dataType : "json",
                success: function( data ) {
                    console.log(data);
                    $(".num-like").html(data.result);
                }
            });
        });
        $(".btn-delete").on('click',function(){
            var id = $(this).data("value");
            var url_delete = "methods/delete_chapter.php?id="+id;
            $.ajax({
                url: url_delete,
                data: null,
                dataType : "json",
                success: function( data ) {
                    if(data.result == "delete success")
                    location.reload();
                }
            });
        });
    });
</script>