<?php session_start();
unset($_SESSION['userName']);
unset($_SESSION['userEmail']);
unset($_SESSION['userTel']);
unset($_SESSION['userAddress']);
unset($_SESSION['userID']);
$_SESSION['admin'] = 'false';
echo "<script>alert('η»εΊζε');location.href='../homepage.php';</script>";
?>
