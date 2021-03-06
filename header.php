<?php
    include 'methods/dbconfig.php';
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>maRead Project</title>
    <!-- Bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Propeller css -->
    <link href="css/propeller.min.css" rel="stylesheet">
    <!-- Maread Style -->
    <link href="css/style.css" rel="stylesheet">
    <!-- TOT Style -->
    <link href="css/style_tot.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <!-- Material Design Select -->
    

</head>

<body>
    <div class="container">
        <!-- Nav menu with side menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar">
            <!-- <nav id="header" class="navbar navbar-inverse header--fixed hide-from-print pmd-navbar" role="banner"> -->
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="search-box col-md-4">
                    <!-- Begin Change Search Box -->
                    <div class="form-group">
                        <input type="text" id="regular1" class="form-control" placeholder="คำค้นหา">
                        <button class="btn">
                            <i class="material-icons md-light">search</i>
                        </button>
                    </div>
                    <!-- End Change Search Box -->
                    <!-- <button class="btn">
                        <i class="material-icons md-light">search</i>
                    </button> -->
                </div>
                <div class="navbar-header col-md-4">
                    <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand navbar-brand-custome"><img class="logo-mobile" src="images/logomareads_mobile.png" /><img class="logo-desktop" src="images/logomareads_desktop.png" /></a>
                </div>
                <div class="user-box col-md-4">
                    <div class="dropdown pmd-dropdown pmd-user-info">
                        <a href="javascript:void(0);" class="btn-user dropdown-toggle media" data-toggle="dropdown" aria-expanded="false">
                            <div class="media-left pmd-ripple-effect">
                                <img src="images/kla.jpg" width="40" height="40" alt="avatar">
                            </div>
                            <!-- <div class="media-body media-middle">
                            User
                        </div>
                        <div class="media-right media-middle">
                            <i class="material-icons md-dark pmd-sm">more_vert</i>
                        </div> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="profile.php?author=0">Edit Profile</a></li>
                            <li><a href="add_story.php">Add Story</a></li>
                            <li><a href="javascript:void(0);">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
                    <div id="box-row-2">
                        <ul class="nav navbar-nav" style="display:none;">
                            <li><a href="index.php"><span class="menu-mobile">หน้าแรก</span><!-- <span class="menu-desktop"><img src="images/menu_romantic.gif"></span> --> <span class="sr-only">(current)</span></a></li>
                            <li><a href="category.php?category=1"><span class="menu-mobile">นิยายรักโรแมนติค</span><!-- <span class="menu-desktop"><img src="images/menu_romantic.gif"></span> --> <span class="sr-only">(current)</span></a></li>
                            <li><a href="category.php?category=2"><span class="menu-mobile">นิยายแปลจีน</span><!-- <span class="menu-desktop"><img src="images/menu_drama.gif"></span> --></a></li>
                            <li><a href="category.php?category=3"><span class="menu-mobile">นิยายอิโรติค</span><!-- <span class="menu-desktop"><img src="images/menu_fantasy.gif"></span> --></a></li>
                            <li><a href="category.php?category=4"><span class="menu-mobile">นิยายวาย/Yaoi/Yuri</span><!-- <span class="menu-desktop"><img src="images/menu_thriller.gif"></span> --></a></li>
                            <li><a href="category.php?category=5"><span class="menu-mobile">นิยาย FanFiction</span><!-- <span class="menu-desktop"><img src="images/menu_comedy.gif"></span> --></a></li>
                            <li><a href="category.php?category=6"><span class="menu-mobile">นิยายสืบสวนสอบสวน</span><!-- <span class="menu-desktop"><img src="images/menu_erotic.gif"></span> --></a></li>
                            <li><a href="category.php?category=7"><span class="menu-mobile">นิยายแฟนตาซี</span><!-- <span class="menu-desktop"><img src="images/menu_scify.gif"></span> --></a></li>
                            <li><a href="category.php?category=8"><span class="menu-mobile">บทความ/เรื่องสั้น/ปกิณกะ</span><!-- <span class="menu-desktop"><img src="images/menu_gay.gif"></span> --></a></li>
                        </ul>
                        <!-- Begin Menu Example 2 -->
                        <ul class="nav navbar-nav">
                            <li class="dropdown pmd-dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" data-sidebar="true" href="javascript:void(0);">หมวดนิยาย <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="pmd-ripple-effect" href="category.php?category=1">นิยายรักโรแมนติค</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=2">นิยายแปลจีน</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=3">นิยายอิโรติค</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=4">นิยายวาย/Yaoi/Yuri</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=5">นิยาย FanFiction</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=6">นิยายสืบสวนสอบสวน</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=7">นิยายแฟนตาซี</a></li>
                                    <li><a class="pmd-ripple-effect" href="category.php?category=8">บทความ/เรื่องสั้น/ปกิณกะ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown pmd-dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" data-sidebar="true" href="javascript:void(0);">วิธีใช้งาน <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="pmd-ripple-effect" href="javascript:void(0);">คำถามที่พบบ่อย</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);">วิธีเติมเหรียญ</a></li>
                            <li><a href="about.php">เกี่ยวกับเรา</a></li>
                            <li class="register-write"><a href="register.php?role=writer">สมัครเขียน</a></li>
                            <li class="register-read"><a href="register.php?role=reader">สมัครอ่าน</a></li>
                        </ul>
                        <!-- Enf Menu Example 2 -->
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
            <div class="pmd-sidebar-overlay"></div>
        </nav>