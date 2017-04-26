<?php
	include 'header.php';
	$author = $_GET['author'];
?>
<!-- Main Content -->
        <div class="maincontent">
            <div class="section-profile-author">
                <div class="head-titlebar">
                    <div class="author-pic"><img src="images/kla.jpg"></div>
                    <div class="author-name">
                        <h3>Klanarong</h3>
                    </div>
                    <div class="botton-login">
                        <button type="button" class="btn pmd-btn-flat pmd-ripple-effect">Log out</button>
                    </div>
                </div>
            </div>
            <div class="section-row profile-section-1">
                <div class="bookmark head-title">
                    <h3 class="text-title">นิยายของคุณ</h3>
                    <a href="javascript:void(0);">
                        <i class="material-icons md-light all-next pmd-ripple-effect">chevron_right</i>
                        <i class="material-icons md-light all-next pmd-ripple-effect">chevron_right</i>
                    </a>
                </div>
                <div class="bookmark-list-row">
                    <div class="block-row">
                        <div class="col-3 add-newstory pmd-ripple-effect">
                            <a href="add_story.php">
                                <div class="feature-thumbnail">
                                    <div class="addbox">
                                        <!-- <i class="material-icons md-light edit">edit</i>
                                        <i class="material-icons md-light add">add</i>
                                        <span>เขียนเรื่องใหม่</span> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                            $sql = "SELECT * FROM maread_story WHERE author=0 order by updatedate desc limit 5 ";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    $title = $row['title'];
                                    $likes = $row['likes'];
                                    $img_path = $row['img_path'];
                                    $slug = $row['slug'];
                        ?>
                        <div class="col-3">
                            <a href="chapter_list.php?slug=<?php echo $slug;?>"><div class="feature-thumbnail">
                                <img src="<?php echo $img_path;?>">
                            </div></a>
                            <div class="title-content">
                                <a href="chapter_list.php?slug=<?php echo $slug;?>"><h3 class="title-article"><?php echo $title;?></h3></a>
                                <div class="favorite-data">
                                    <i class="material-icons md-light favorite">favorite</i><span><?php echo $likes > 1000 ? floor_dec($likes/1000)."K" : $likes;?> </span>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                        <!-- <div class="col-3">
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
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="section-row profile-section-2">
                <div class="latest head-title">
                    <h3 class="text-title">นิยายที่คุณชอบ</h3>
                    <i class="material-icons md-light all-next">chevron_right</i>
                    <i class="material-icons md-light all-next">chevron_right</i>
                </div>
                <div class="latest-list-row">
                    <div class="block-row">
                        <div class="col-3">
                            <div class="feature-thumbnail update">
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
                    </div>
                    <div class="block-row">
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
                            <div class="feature-thumbnail update">
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