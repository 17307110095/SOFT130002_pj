<?php session_start();
unset($_SESSION['userName']);
unset($_SESSION['userEmail']);
unset($_SESSION['userTel']);
unset($_SESSION['userAddress']);
unset($_SESSION['userID']);
$_SESSION['admin'] = 'false';
echo "<script>alert('登出成功');location.href='../homepage.php';</script>";
?>
