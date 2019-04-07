<?php
require '../include/db_conn.php';

$snum=$_GET[snum];
$num=$_GET[num];
echo "$snum $num";

$sub_del_quary = "delete from sub_board where num='$snum'";
$result = mysql_query($sub_del_quary,$conn);

$result2 = mysql_query("update board set sub_count = sub_count - 1");

if($result)
   echo "<script>alert('삭제를 완료하였습니다.'); location.href='board_view.php?num=$num'; </script>";
else
   echo "<script>alert('삭제를 실패하였습니다.');history.back()</script>";
        
?>