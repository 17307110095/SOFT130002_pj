<?php
session_start();
$art_store = new mysqli("localhost", "root", "", "zzy_art_store");
if ($art_store->connect_errno) {
echo "Failed to connect to MySQL: " . $art_store->connect_error;
}
$art_store->query("set names utf8");
?>