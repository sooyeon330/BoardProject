<?php
echo "★ $_SESSION[id] 님 로그인 중입니다★<p>";
 require '../include/con_db.php';
 
    $result = mysql_query("select name,id from member",$connect);
      
    echo "회원리스트<p>";
    echo "<table border=1 > ";

 
     echo "<tr> <td>이름 </td>";
     echo "<td>아이디</td></tr>";
    

     while($result){
         
         $list = mysql_fetch_row($result);
         if(!$list) break;
         else{
         echo "<tr>";
         echo "<td> $list[0] &nbsp;&nbsp; </td>";
         echo "<td> <a href='showlist.php?id=$list[1]'> $list[1] </a> </td>";

         echo "</tr>";
         }
 
     }//while
     
     echo "</table>";
     
?>