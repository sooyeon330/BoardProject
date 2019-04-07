<?php 
session_start();
echo "★$_SESSION[id] 님 로그인 중입니다★<p>";
require '../include/con_db.php';

$id = $_POST["id"];
echo " 정보변경<p>";         

    $selinfo = "select * from member where id='$id'";
    $qryinfo = mysql_query($selinfo,$connect);
    
    $name = mysql_result($qryinfo,0,name);
    $mail = mysql_result($qryinfo,0,email);
//    $pw = mysql_result($qryinfo,0,pw);
    $idnum = mysql_result($qryinfo,0,idnum);
    $idnum1 = substr($idnum,0,6);
    $idnum2 = substr($idnum,6,1);
    $tel = mysql_result($qryinfo,0,tel);
    $adress = mysql_result($qryinfo,0,adress);

echo "<form name=f1 action='change2.php' method='POST'>
	이름 : <input type='text' name='name' value='$name' ><p>
		
	ID : $id<p>
    <input type='hidden' name='id' value='$id'>

    e-mail : <input type='email' name='mail' value='$mail'> <p>
	PW : <input type='password' name='pw1'><p>
	PW확인 : <input type='password' name='pw2'><p>
			
	주민번호 : <input type='text' name='numid1' size='6'  pattern='\d{6}' value='$idnum1' > 
	- <input type='text' name='numid2' size='1' pattern='\d{1}' maxlength='1' value='$idnum2'> ******<p>
	전화번호 : 	<select name='tel1' >
			<option> 010 <option> 011 <option> 070
			</select>
			<input type='tel' name='tel' value='$tel'><p>
	주소 : <input type='text' name='adress' value='$adress'><p>
    쿠키유지시간 : <input type='radio' checked name='time' value='60'> 1분 <input type='radio' name='time' value='30'> 30분<p>			
	<input type=submit value='변경하기'>
	</form>";
?>