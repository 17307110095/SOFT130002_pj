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
    <title>搜索</title>

    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="js/page.js"></script>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/search.css">



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


<nav class="navbar navbar-default " style="font-size: large">
    <div class="container">
        <div></div>
        <form id="search_1" class="navbar-form navbar-right" role="search" action="search.php">
            <div class="form-group">
                <label>
                    <input id="title" type="checkbox" name="condition" value="title" checked> &nbsp名称  &nbsp
                    <input id="description" type="checkbox" name="condition" value="description">&nbsp简介  &nbsp
                    <input id="artist" type="checkbox" name="condition" value="artist">&nbsp作者 &nbsp
                </label>
                <input id="key" type="text" class="form-control" placeholder="Search">
            </div>
            <button id="btSearch" type="button" class="btn">Submit</button>
        </form>
    </div>
</nav>

<br>
<h1 style="text-align: center"> 搜索结果：</h1>
<form id="search_2" style="padding-left: 1160px; font-size: large">
    <br>
    <label>
        排序方式 :
        价格 &nbsp<input type="radio" name="label" id="price" checked="checked">&nbsp
        热度 &nbsp<input type="radio" name="label" id="heat">&nbsp
    </label>
</form>


<div class="container" id="item">
</div>


<script src="js/foot.js"></script>
</body>

</html>