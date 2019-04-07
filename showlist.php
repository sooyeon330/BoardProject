<?php
echo "★ $_SESSION[id] 님 로그인 중입니다★<p>";
require '../include/con_db.php';

    $id = $_GET['id'];
    
    echo "$id 님의 정보<p>";
    
    $sellist = "select * from member where id='$id' ";
    $relist = mysql_query($sellist,$connect);    
    $list = mysql_fetch_row($relist);
        
     echo "ID : $list[0] <p> PW : $list[1] <p> NAME : $list[2] <p>  BIRTHDAY : $list[3] <p> 
          IDNUM : $list[4] <p>  E-MAIL : $list[5] <p>  TEL : $list[6] <p>  ADRESS : $list[7] <p>  ";
    
//     for($i=0; i<8; $i++){
//         echo "$list[i] <p>";
//     }
        


?>