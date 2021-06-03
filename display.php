<?php
include_once 'php/head.php';
?>

<?php
if (!isset($_GET['id'])) {
    echo "<script>window.location.href = 'homepage.php'</script>";
} else {
    $artworkID = $_GET['id'];
}
$art_work = $art_store->query("SELECT * FROM `artworks` WHERE `artworkID` = '" . $artworkID . "'");
$row = $art_work->fetch_assoc();
$newView = $row['view'] + 1;
$art_store->query("UPDATE `artworks` SET `view` = $newView WHERE `artworkID` = $artworkID");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>详情</title>


    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/homepage.css">

    <style>
        .information p{
            font-size: 20px;
            line-height: 70px;
        }
        .in_sub{
            width: 250px;
            height: 100px;
            color: white;
            background-color: black;
            border: 1px solid black ;
            text-decoration:none;
        }
        .in_sub:hover{
            background-color: orangered;
            border: 1px solid orangered ;
        }
    </style>

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
<br><hr style="background-color: white; height: 1px"><br>

<table width="100%" align="center" >


    <tr align="center">
        <td>
            <p class="name">
                <?php
                echo $row['title'];
                ?>
            </p>
            <span class="jump"><a href="search.php" >
                    <?php
                    echo $row['artist'];
                    ?>
                </a></span>
            <hr>
        </td>
    </tr>

    <tr>
        <td>
            <table class="information" width="100%" >

                <tr align="center" >

                    <td >

                                    <img  src="resources/img/<?php
                                    echo $row['imageFileName'];
                                    ?>"/>
                    </td>


                    <td align="center">
                        <table width="100%" align="center" >
                            <tr>
                                <td>
                                    <p><b>YearOfWork</b>:
                                        <?php
                                        echo $row['yearOfWork'];
                                        ?> A.D.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p><b>Dimensions</b>: <?php
                                        echo $row['width'];
                                        ?> ft * <?php
                                        echo $row['height'];
                                        ?> ft </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p><b>Genre</b>: <?php
                                        echo $row['genre'];
                                        ?></p>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <p><b>Heat</b>: <?php
                                        echo $row['view'];
                                        ?></p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p><b>Price</b>: <?php
                                        echo $row['price'];
                                        ?> USD</p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>
                                        <p>Description:</p>

                                        <p style="font-size: small;text-indent: 2em; width: 650px"> <?php
                                            echo $row['description'];
                                            ?></p></b>
                                    <hr>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <?php
                                    $userID = 1;
                                    $sql_test = "SELECT * FROM `carts` WHERE `userID` =  '$userID' AND `artworkID` =  '$artworkID'";
                                    $result = $art_store->query($sql_test);
                                    if($result->num_rows > 0)
                                    {
                                        echo '<a  href="php/deleteInCollection.php?id=' . $row['artworkID'] . '" class="in_sub" id="collect"><span>DELETE IT IN COLLECTION LIST</span></a>';
                                        echo "(已收藏)";
                                    }
                                    else
                                        echo '<a  href="php/addToCollection.php?id=' . $row['artworkID'] . '" class="in_sub" id="collect"><span>ADD TO COLLECTION LIST</span></a>';
                                    ?>

                                    <p></p>
                                </td>

                            </tr>

                        </table>
                    </td>

                </tr>
            </table>
        </td>

    </tr>
</table>









<script src="js/foot.js"></script>
<script src="js/Description_big.js"></script>
</body>
</html>