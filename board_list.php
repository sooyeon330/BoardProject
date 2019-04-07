<html>
<style>
.main{
    background-color: #ffc34d;
    border-radius: 30px;   
    width:100;
    height:50;
    font-family: "나눔스퀘어";
}
.write{
    margin-left:330px;
    background-color: #ffc34d;
    border-radius: 20px;   
    width:70;
    height:30;
    font-family: "나눔스퀘어";
}
.serch{
    background-color: #ffc34d;
    border-radius: 20px;   
    width:50;
    height:30;
    font-family: "나눔스퀘어";
}
</style>
</html>
<?php
require '../include/db_conn.php';
 echo "<link rel=stylesheet type=text/css href=../include/my.css>";

//     $sellist = "select * from board order by w_date desc";
//     $relist = mysql_query($sellist,$conn);
   
    $page = $_GET[page];//사용자가 요청한 페이지 번호
    if($page =='') $page=1;
    $list_num=5;//한 페이지당 게시판 글 건수
    $page_num=3; //한 블록당 페이지 건수
    $offset = $list_num*($page)-1;// 한 페이지의 시작 글 번호
    
    $cnt_query = "select count(*) from board";
    $recnt = mysql_query($cnt_query);
    $row = mysql_fetch_row($recnt);
    $total_no = $row[0]; //?
    $total_page = ceil($total_no/$list_num); //전체 페이지수
    
    $qurey="select * from board order by num desc limit $offset, $list_num";
    $relist = mysql_query($qurey) or die (mysql_error());
    
    echo "<input type='button' value='메인으로' class=main onclick=location.href='main.php'>";
    echo "<center><form action='board_serch.php' method=post>
                  <input type='text' name='txt_serch'>
                  <input type='submit' class=serch name='btn_serch' value='검색' >
                  </form> ";
    echo "<input type='button' class=write value='글쓰기'  onclick="."location.href='board_write.php'><p>";
    echo "<table border=1 width=600 height=350> ";
    
    
    echo "<tr align=center bgcolor=#ffaa99><td>번호 </td> <td>작성자</td> <td width=250 >제목</td><td>조회수</td><td>작성일자</td></tr>";
    
    while($relist){        
        $list = mysql_fetch_array($relist);
        if(!$list) break;
        else{
            echo "<tr align=center>";
            echo "<td> $list[num]</td>
                  <td> $list[id]</td>
                  <td width=250><a href='board_view.php?num=$list[num]'> $list[subject] ($list[sub_count])</a></td> ";
            echo "<td> $list[count]</td><td> $list[w_date]</td>";            
            echo "</tr>";
        }
        
    }//while
    
    echo "<tr align=center ><td width=100% colspan=5>";
   
    $total_block= ceil($total_page/$page_num); //전체 블록 수
    $block = ceil($page/$page_num); //현재블록?
    $first=($block-1) * $page_num; //각블록의 첫페이지
    $last= $block * $page_num; //각블록의 마지막 페이지
    
    if($block > 1){
        $prev=$first;
        echo "<a href='board_list.php?page=1'>[처음]</a>&nbsp; ";
        echo "<a href='board_list.php?page=$prev'>[◀]</a>";
    }
     
    if($page > 1) {
        $go_page=$page-1;
        echo " <a href='board_list.php?page=$go_page'>[이전]</a>&nbsp; ";
    }

     for($page_link=$first+1; $page_link<=$last; $page_link++){
         if($page_link==$page)
             echo "<font color=green><b>$page_link</b></font>&nbsp; ";
         else 
             echo "<a href='board_list.php?page=$page_link'>[$page_link]</a>&nbsp; ";
     }

     if($page < $total_page)
         $go_page=$page+1;
         echo "<a href='board_list.php?page=$go_page'>[다음]</a>&nbsp;";
     }
     
     if($block < $total_block){
         $next=$last;
         echo"<a href='board_list.php?page=$next'>[▶]</a> &nbsp;";
         echo "<a href='board_list.php?page=$total_page'>[마지막]</a>";
     }
    
    echo "</td></tr>";    
    echo "</table></center>";    

?>