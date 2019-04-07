<?php $cid = $_GET["cid"]; ?>
<html>
<body>	
<form action="idchk.php" method="GET">
	ID : <input type="text" name="cid" id="ckid" value=<?=$cid?>><p>
<!-- 	 <input type="hidden" name="first" value="1"> -->
	<input type="submit" value="확인">	
</form>

	
<?php
    require '../include/con_db.php';
    $cid = $_GET["cid"];
//    $first = $_GET["first"];
    $selid = "select id from member where id='$cid' ";
    $reslutid = mysql_query($selid,$connect);
    $idcnt = mysql_num_rows($reslutid);
    
    if($idcnt==1)
        echo "<script>alert(\"이미 있는 아이디 입니다.\");</script>";
    else {
        echo "<script>var ok;
             ok =confirm(\"사용가능한 아이디입니다. 사용하시겠습니까?\");
            if(ok){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            opener.document.getElementById('cid').value ='$cid';
            window.close();
             }
            else history.go(-1);
            </script>";
        }


    
?>
	
</body>
</html>


 <?php
   
?>


