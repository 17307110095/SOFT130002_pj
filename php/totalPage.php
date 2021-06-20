<?php
include_once 'head.php';
$key = $_POST["key"];
$title = $_POST["title"];
$description = $_POST["description"];
$artist = $_POST["artist"];
$order = $_POST['order'];


$sql = "SELECT * FROM `artworks` ";
if ($title == 1) {
    $sql .= "WHERE (`title` LIKE '%" . $key . "%'";
    if ($description == 1) {
        $sql .= " OR `description` LIKE '%" . $key . "%'";
    }
    if ($artist == 1) {
        $sql .= " OR `artist` LIKE '%" . $key . "%'";
    }
} else {
    if ($description == 1) {
        $sql .= "WHERE (`description` LIKE '%" . $key . "%'";
        if ($artist == 1) {
            $sql .= " OR `artist` LIKE '%" . $key . "%'";
        }
    } else {
        if ($artist == 1) {
            $sql .= "WHERE (`artist` LIKE '%" . $key . "%'";
        } else {
            $sql .= "WHERE (`title` LIKE '%" . $key . "%' OR `description` LIKE '%" . $key . "%' OR `artist` LIKE '%" . $key . "%'";
        }
    }
}
if ($order == 1) {
    $sql .= ") AND `orderID` IS NULL ORDER BY `view` ASC";
} else {
    $sql .= ") AND `orderID` IS NULL ORDER BY `price` ASC";
}

$total = $art_store->query($sql);
echo $total->num_rows;

?>