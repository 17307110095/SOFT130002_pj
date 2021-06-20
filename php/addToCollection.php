<?php
include_once 'head.php';

$artworkID = $_GET['id'];
$userID = $_SESSION['userID'];

$sql_test = "SELECT * FROM `carts` WHERE `userID` =  '$userID' AND `artworkID` =  '$artworkID'";
$result = $art_store->query($sql_test);

$sql = "INSERT INTO carts (userID , artworkID) VALUE ('$userID','$artworkID')";




if($result->num_rows > 0) {
    echo "<script> alert('该艺术品已收藏，不能重复收藏!');location.href = '../collect.php'</script>";
}else{
    $art_store->query($sql);
    echo "<script> alert('艺术品收藏成功！');location.href = '../collect.php' </script>";
}

?>





