<?php session_start();
unset($_SESSION[id]);
echo "<script>alert('로그아웃되었습니다'); location.href='main.php';</script>";

?>