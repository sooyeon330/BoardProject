<?php
require '../include/db_conn.php';
    
    $num=$_GET[num];
    
    $del_quary = "delete from board where num='$num'";
    $result = mysql_query($del_quary,$conn);
    
    $sub_del_quary = "delete from sub_board where s_num='$num'";
    $result2 = mysql_query($sub_del_quary,$conn);
   
    if($result)
        echo "<script>alert('삭제를 완료하였습니다.'); location.href='board_list.php';</script>";
    else
        echo "<script>history.back()</script>";
        

?>