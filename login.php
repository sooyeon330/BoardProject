<?php 
session_start();
 if($_SESSION[id]){
     echo "<script>alert('이미 로그인 되셨습니다.'); location.href='welcome.php?'; </script>";
 }
 else{
$id = $_COOKIE[id];
    if(!isset($_COOKIE[saveid])){
    
        echo "<center><form action='welcome.php' method='POST'>
                ID : <input type='text' name='id' ><p>
                PW : <input type='text' name='pw'><p>
                 <input type='checkbox' name='saveid' >ID 저장<p>
                <input type='submit' value='로그인' class='btn_log' onclick="."location.href='welcome.php'>
                </form></center>";
        
             
    }else {
        echo "<center><form action='welcome.php' method='POST'>
                ID : <input type='text' name='id' value='$_COOKIE[id]'><p>
                PW : <input type='text' name='pw'><p>
                 <input type='checkbox' name='saveid' >ID 저장<p>
                <input type='submit' value='로그인' class='btn_log' onclick="."location.href='welcome.php'></form></center>";
    }
   echo "<center><a href='findid.php' class='button'>아이디찾기</a>";
   echo "<center><a href='join.html' class='button'>메인으로</a><p>";
 }
   
?>
<html>
<body>
<style>
body{ 
    margin-top:50px;
    background-color: #ffffcc;
    font-family: "나눔스퀘어";
}
.btn_log{
    background-color: #ffc34d;
    border-radius: 30px;   
    width:100;
    height:50;
    font-family: "나눔스퀘어";
}

</style>
</body>
</html>
