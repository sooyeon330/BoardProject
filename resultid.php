<?php
    require '../include/con_db.php'; 

    $ckmail= $_POST["ckmail"];

        $selmail = "select id from member where email='$ckmail' ";
        $remail = mysql_query($selmail,$connect);
        $mailcnt = mysql_num_rows($remail);
        
        if($mailcnt ==1){     
            $fid = mysql_result($remail,0,id);
             echo "아이디는  $fid 입니다<br>"; 
        }
        else 
             echo"아이디가 없습니다<br>";
        
?>
<html>
<body>
	<input type='button' value='로그인' onclick="location.href='login.php'">  
	<input type='button' value='회원가입' onclick="location.href='join.html'">
</body>
</html>