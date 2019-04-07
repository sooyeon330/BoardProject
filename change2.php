<?php
ob_start();
session_start();
echo "��$_SESSION[id] 님이 로그인중입니다.<p>";
require '../include/con_db.php';

$id=$_POST["id"];
$pw1=$_POST["pw1"];
$pw2=$_POST["pw2"];
$name=$_POST["name"];
$mail=$_POST["mail"];
$idnum1=$_POST["numid1"];
$idnum2=$_POST["numid2"];
$tel=$_POST["tel"];
$adress=$_POST["adress"];
$time = $_POST["time"];

//    echo "$time";
if($time==60) setcookie("id","$id",time() * 60);
else if($time==30) setcookie("id","$id",time() * 60 * 30);

if(($pw1 != $pw2)or $pw2 ==null) echo "비밀번호가 다릅니다!<br>";
else{
    $year = substr($idnum1, 0,2);
    $mon = substr($idnum1, 2,2);
    $day = substr($idnum1, 4,2);
    $birthday = $year . $mon . $day;
    
    $sql = "update member set id='$id', pw='$pw2', name='$name', birthday='$birthday',
                 idnum='$idnum1$idnum2', tel='$tel', email='$mail' ,adress='$adress' where id='$id'";
    
    $reslut = mysql_query($sql);
    
    
    
    echo "����Ǿ����ϴ� <p>";
    echo "<input type='button' value='메인으로' onclick="."location.href='main.php'>";
    
    mysql_close($connect);
}
?>