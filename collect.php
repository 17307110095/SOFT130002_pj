<?php
include_once 'php/head.php';
$userID = 1;
$user = $art_store->query("SELECT * FROM `users` WHERE `userID` = '" . $userID . "'");
$row1 = $user->fetch_assoc();

$art = $art_store->query("SELECT * FROM `carts` WHERE `userID` =  '$userID'");
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>收藏</title>

    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/collect.css">
    <link rel="stylesheet" href="css/search.css">


    <style>
        .in_sub{
            width: 150px;
            height: 40px;
            color: white;
            background-color: black;
            border: 1px solid black ;
        }
        .in_sub:hover{
            background-color: orangered;
            border: 1px solid orangered ;
        }
        .row-vertical-center {
            display: flex;
            align-items: center;
        }
        hr{
            border: none;
            height: 1px;
            background-color: black;
        }

    </style>

    <script>
        window.onload = function () {
                document.getElementById("btn_delete").onclick = function (){


                    if(confirm("是否确认取消收藏")){

                        var id = this.getAttribute("--art_id");
                        location.href = "php/deleteInCollection.php?id=" + id;

                    }

                };
        }
    </script>

</head>

<body>

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


    <br><br>
    <div id="trace"> </div>
    <br><hr style="background-color: white; height: 1px">

    <div class="bottom">
        <div class="innerResult" > User Information </div>



        <div class="container"">
        <div class="row" style="font-size: 30px">
            <div > <b>Name</b>: <?php echo $row1['name'] ?></div>

        </div>

        <div class="row" style="font-size: 30px">
            <div > <b>Email</b>:  <?php echo $row1['email'] ?></div>

        </div>

        <div class="row " style="font-size: 30px">
            <div > <b>Tel</b>: <?php echo $row1['tel'] ?></div>
        </div>

        <div class="row " style="font-size: 30px">
            <div > <b>Address</b>: <?php echo $row1['address'] ?></div>
        </div>


        </div>



    </div>

    <div class="bottom" >
        <div class="innerResult"> Collection </div>
    </div>



    <div class="container" id="item">

        <?php
            while ($row2 = $art->fetch_assoc())
            {
                $artworkID = $row2['artworkID'];
                $art_work = $art_store->query("SELECT * FROM `artworks` WHERE `artworkID` = '" . $artworkID . "'");
                $row3 = $art_work->fetch_assoc();

                echo '  <div class="row row-vertical-center" style="padding-top: 50px" >
            <div class="col-md-6">
                <a href="display.php?id=' . $row3['artworkID'] . '" ><img src="resources/img/' . $row3['imageFileName'] . '" height="400px" width="400px" class="img-circle"></a>
            </div>

            <div class="col-md-6" ">
                <div class="row" style="font-size: 30px">
                    <b>Name</b>: ' . $row3['title'] . '
                    <hr class="hr">
                </div>
                <div class="row" style="font-size: 30px">
                    <b>ReleasedTime</b>: ' . $row3['timeReleased'] . '
                    <hr class="hr">
                </div>
                <div class="row" style="font-size: 30px">
                    <b>View</b>: ' . $row3['view'] . '
                    <hr class="hr">
                </div>
                <div class="row" >
                    <input  type="button" class="in_sub" --art_id="' . $row3['artworkID'] . '"value="DELETE IT" id="btn_delete">
                </div>
            </div>
        </div>';
            }
        ?>

    </div>





    <div>
        <div class="page">
            <span title="First">First</span>
            <span title="Prev"><</span>
            <span class="currentPage">1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>></span>
            <span title="Last">Last</span>
        </div>
    </div>
    <script src="js/foot.js"></script>
</body>

</html>