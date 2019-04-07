<?php
    session_start();
    require '../include/db_conn.php';
    
    $content = $_POST['sub_content'];
    $snum = $_POST['num'];
    $id = $_SESSION[id];
    
    if(!$_SESSION[id]) echo "<script>alert('로그인이 필요합니다.'); history.go(-1);</script>";
    else{
    $select = "insert into sub_board(s_num,id,contents,w_date)";
    $select .="value('$snum', '$id','$content',now()) ";
    $reslut = mysql_query($select,$conn);
    
    $result2=mysql_query("update board set sub_count = sub_count + 1");
    
    echo "<script>alert('댓글을 달았습니다'); location.href='board_view.php?num=$snum';</script>";
    }
    
?>