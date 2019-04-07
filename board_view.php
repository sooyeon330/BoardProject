<?php
    session_start();
$num = $_GET['num'];
// echo "$num";
require '../include/db_conn.php';

$sql1 = "select * from board where num=$num ";
$result1 = mysql_query($sql1,$conn);
$row1 = mysql_fetch_array($result1);
$contents=nl2br(stripslashes($row1[contents]));

 $sql2="select * from file_board where s_num=$num";
 $result2 = mysql_query($sql2,$conn);
 $row2 = mysql_fetch_array($result2);
 
 $file = "<a href='/upload/$row2[nfile]'>$row2[ofile]</a>";


?>
<html>
<body>
<input type='button' value='목록' onclick="location.href='board_list.php'">
<p align=center>글 내용 보기</p>
<table border=1 width=700 align=center cellspacing=0 cellpadding=0>

    <tr align=center>	
    	<td width=50>작성자</td>
    	<td width=100><?=$row1[id]?></td>
    	<td width=50>작성일자</td>
    	<td width=200><?=$row1[w_date]?></td>
    	<td width=50>조회수</td>
    	<td width=50><?=$row1[count]?></td>    	
    </tr>
    
    <form action='board_modify.php?num=<?=$num?>' method='POST'>
    <tr align=center>	
    	<td width=50>제목</td>
    	<td width=450 colspan=3><input type='hidden' name='subject' value='<?=$row1[subject]?>' ><?=$row1[subject]?></td>
    	<td width=60 height=30>첨부파일</td>
    	<td width=150><?=$file?></td>	
    </tr>
    <tr align=center>	
    	<td width=50>내용</td>
    	<td width=500 height=300 colspan=5><input type='hidden' name='contents' value='<?=$row1[contents]?>'><?=$contents?></td>	
    </tr>
    <?php $id=$_SESSION[id];
    if($row1[id] == $id || $id== 'admin')
            echo "<input type='submit' value='수정'>
                <input type='button' value='삭제' onclick=location.href='board_delete.php?num=$num'>";
        
    ?>
    </form>
    
<?php 
    $sql3 = "select * from sub_board  where s_num=$num"; 
    $result3=mysql_query($sql3,$conn);
   
    while( $row3=mysql_fetch_array($result3)){
        echo "<tr><td>$row3[id]</td> <td colspan=4>$row3[contents]</td><td>$row3[w_date]<br>";
        if($row3[id] == $id || $id== 'admin'){
                 echo "<input type='submit' value='수정'onclick=location.href='subboard_modify.php'>
                       <input type='button' value='삭제' onclick=location.href='subboard_delete.php?snum=$row3[num]&num=$num'>";
            }
        echo " </td></tr>";
    }
//조회수 증가
    $row1[count]++;
    $result3=mysql_query("update board set count=$row1[count] where num=$num",$conn);
?>
<!-- 댓글 -->
    <tr align=center>	
    	<td width=600 colspan=6>
    	<form action="subboard_insert.php" method=POST> 
        	<input type="text" name="sub_content" size=70> 
        	<input type="hidden" name=num value=<?=$num?>>
        	<input type="submit" value='댓글달기'>
    	</form> 
		</td>	
    </tr>

</table>
</body>
</html>

