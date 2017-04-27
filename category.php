<?php
	include 'header.php';
    $category_id = $_GET['category'];
?>
<!-- Main Content -->
        <div class="maincontent">
            <div class="section-head-page">
                <div class="head-titlebar">
                <?php
                    $sql = "SELECT * FROM maread_category WHERE ID = $category_id ";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $title = $row['title'];
                        $img_logo = $row['img_logo'];
                ?>
                    <div class="title-head-pic"><img src="<?php echo $img_logo;?>"></div>
                    <div class="category-name">
                        <h3><?php echo $title;?></h3>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
            <div class="section-row home-section-1">
                <div class="bookmark head-title">
                    <h3 class="text-title">ใหม่</h3>
                </div>
                <div class="bookmark-list-row">
                    <div class="block-row">
                    <?php
                        $sql = "SELECT * FROM maread_story WHERE category_ID = $category_id order by ID desc limit 6 ";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $likes = $row['likes'];
                                $img_path = $row['img_path'];
                                $slug = $row['slug'];
                    ?>
                        <div class="col-3">
                            <a href="chapter_list.php?slug=<?php echo $slug;?>">
                                <div class="feature-thumbnail new">
                                    <img src="<?php echo $img_path;?>">
                                </div>
                            </a>
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
                            <div class="feature-thumbnail new">
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
                            <div class="feature-thumbnail new">
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
                            <div class="feature-thumbnail new">
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
                            <div class="feature-thumbnail new">
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
                            <div class="feature-thumbnail new">
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
            <div class="section-row home-section-2">
                <div class="latest head-title">
                    <h3 class="text-title">แสดงผลตาม</h3>
                    <!-- Begin Sort by -->
                    <div class="form-group sort-by">
                        <select id="sort" class="form-control">
                            <option value="0" selected="selected">ความนิยม</option>
                            <option value="1">ล่าสุด</option>
                        </select>
                    </div>
                    <!-- End Sort by -->
                </div>
                <div class="latest-list-row">
                    <div class="block-row row-popular">
                    <?php
                        $sql = "SELECT * FROM maread_story order by views desc limit 12 ";
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
                        </div> -->
                    </div>
                    <div class="block-row row-update">
                        <?php
                            $sql = "SELECT * FROM maread_story order by updatedate desc limit 12 ";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    $title = $row['title'];
                                    $likes = $row['likes'];
                                    $img_path = $row['img_path'];
                                    $slug = $row['slug'];
                        ?>
                            <div class="col-3">
                                <a href="chapter_list.php?slug=<?php echo $slug;?>"><div class="feature-thumbnail update">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
<?php
	include 'footer.php';
?>
<script type="text/javascript">
    $(function(){
        $(".row-update").hide();
        $("#sort").on("change",function(){
            if(this.value == 0){
                $(".row-popular").show();
                $(".row-update").hide();
            }else if(this.value ==1){
                $(".row-popular").hide();
                $(".row-update").show();
            }
        });
    });
</script>