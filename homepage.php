<?php
include_once 'php/head.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>首页</title>

    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!---->
    <link rel="stylesheet" href="css/homepage.css">

    <style>
        .paddtop{
            padding-top: 10px;
        }
        .paddtop_big{
            padding-top: 40px;
        }
    </style>
</head>

<body>

<?php
$view = $art_store->query("SELECT * FROM `artworks` WHERE `orderID` IS NULL ORDER BY `view` DESC");
$time = $art_store->query("SELECT * FROM `artworks` WHERE `orderID` IS NULL ORDER BY `timeReleased` DESC ");
?>



<div class="title">

    <div class="logo">
        <div id="word1">Art Store</div>
        <div id="word2">Where you find GENIUS and EXTROORDINARY</div>
    </div>

    <div class="navigation">
        <a href='homepage.php'><span>首页</span></a>
        <a href='search.php'><span>搜索</span></a>
        <a href='register.html'><span>注册</span></a>
        <a href='sign.html'><span>登录</span></a>
        <a href='collect.php'><span>收藏</span></a>
    </div>
</div>


<br>
<div id="trace"> </div>
<br>


<div class="row">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <div class="item active" style="text-align: center;">
                <?php
                    $row = $view->fetch_assoc();
                    echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" style="display: inline-block"></a>' .
                        '<div class="description"><p>Theme: ' . $row['title'] . '</p><p>Genre: ' . $row["genre"]  . '</p><p>Artist: ' . $row["artist"] . '</p><p>Year: ' . $row["yearOfWork"] . '</p></div>';
                ?>
            </div>

            <div class="item" style="text-align: center">
                <?php
                $row = $view->fetch_assoc();
                echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" style="display: inline-block"></a>' .
                    '<div class="description"><p>Theme: ' . $row['title'] . '</p><p>Genre: ' . $row["genre"]  . '</p><p>Artist: ' . $row["artist"] . '</p><p>Year: ' . $row["yearOfWork"] . '</p></div>';
                ?>
            </div>

            <div class="item" style="text-align: center">
                <?php
                $row = $view->fetch_assoc();
                echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" style="display: inline-block";"></a>' .
                    '<div class="description"><p>Theme: ' . $row['title'] . '</p><p>Genre: ' . $row["genre"]  . '</p><p>Artist: ' . $row["artist"] . '</p><p>Year: ' . $row["yearOfWork"] . '</p></div>';
                ?>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>





<div class="container-fluid">
    <div class="row paddtop_big">
        <div class="col-md-4" style="text-align: center">

            <?php
                $row = $time->fetch_assoc();
                echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" alt="" height="400px" width="400px" class="img-circle"></a>
                <p class="name">' . $row['title'] . '</p>
                <p class="author">' . $row['artist'] . '</p>
    
                <div class="row paddtop" >
                    <p class="text col-md-8 col-md-offset-2" >' . $row['description'] . '</p>
                </div>
    
                <div class="row paddtop" >
                    <span class="jump"><a href="display.php?id=' . $row['artworkID'] . '" >View Details</a></span>
                </div>'
            ?>

        </div>

        <div class="col-md-4" style="text-align: center">
            <?php
            $row = $time->fetch_assoc();
            echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" alt="" height="400px" width="400px" class="img-circle"></a>
                <p class="name">' . $row['title'] . '</p>
                <p class="author">' . $row['artist'] . '</p>
    
                <div class="row paddtop" >
                    <p class="text col-md-8 col-md-offset-2" >' . $row['description'] . '</p>
                </div>
    
                <div class="row paddtop" >
                    <span class="jump"><a href="display.php?id=' . $row['artworkID'] . '" >View Details</a></span>
                </div>'
            ?>
        </div>

        <div class="col-md-4" style="text-align: center">
            <?php
            $row = $time->fetch_assoc();
            echo '<a href="display.php?id=' . $row['artworkID'] . '"><img src="resources/img/' . $row['imageFileName'] . '" alt="" height="400px" width="400px" class="img-circle"></a>
                <p class="name">' . $row['title'] . '</p>
                <p class="author">' . $row['artist'] . '</p>
    
                <div class="row paddtop" >
                    <p class="text col-md-8 col-md-offset-2" >' . $row['description'] . '</p>
                </div>
    
                <div class="row paddtop" >
                    <span class="jump"><a href="display.php?id=' . $row['artworkID'] . '" >View Details</a></span>
                </div>'
            ?>
        </div>
    </div>

</div>




<br>
<br>
<div class="foot">

    <span id="word3">
        &copy;ArtStore Produced and maintained by Achillessanger at 2018.4.1. All Rights Reserved
    </span>
</div>

<script src="js/foot.js"></script>
</body>
</html>




















