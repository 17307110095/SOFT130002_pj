<?php
include_once 'head.php';
$userID = 1;
$artworkID = $_GET['id'];

$sql_test = "SELECT * FROM `carts` WHERE `userID` =  '$userID' AND `artworkID` =  '$artworkID'";
$result = $art_store->query($sql_test);

$sql = "DELETE FROM carts WHERE `userID` =  '$userID' AND `artworkID` =  '$artworkID'";


if($result->num_rows > 0) {
    $art_store->query($sql);
    echo "<script> alert('艺术品取消收藏成功!');location.href = '../collect.php'</script>";
}else{
    echo "<script> alert('艺术品尚未收藏，取消失败！');location.href = '../collect.php' </script>";
}

?>





