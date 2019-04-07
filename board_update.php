<?php
session_start();
require '../include/db_conn.php';

$num = $_GET['num'];
$subject = $_POST['subject'];
$contents=$_POST['contents'];

$contents=addcslashes($contents);

$id = $_SESSION[id];

if($id =='admin'){
    $sql2 = "update board set subject='$subject', contents='$contents' where num='$num' ";
    $reslut = mysql_query($sql2,$conn);
}else {
    $sql = "update board set subject='$subject', contents='$contents' where id='$id' and num='$num' ";
    $reslut = mysql_query($sql,$conn);
}
    
if($reslut){
    echo "<script>alert('수정완료'); location.href='board_view.php?num=$num'; </script>";
}else
    echo "<script>alert('수정못함'); history.back(); </script>";
?>