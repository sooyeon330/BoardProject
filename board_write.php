<?php 
session_start();
$id = $_SESSION[id];
    if(!$id){
        echo "<script>alert('로그인이 필요합니다');
                 history.go(-1);</script>";
//             echo "$_SESSION[id]";
//             echo "$id";
    }else{
        echo "<input type='button' class=main value='이전으로' onclick="."location.href='board_list.php'><p>
    <form action='board_insert.php' method='post' align=center ENCTYPE='multipart/form-data'>
	제목 : <input type='text' size='90' name='subject' autofocus><p>
	<textarea rows='20' cols='100' name='contents'></textarea><br>
    파일첨부 : <input type='file' name='upfile' value='파일첨부'><p>
	<input type='submit' class=btn value='등록하기'>
	</form>";
    }
?>
<html>
<style>
.main{
    background-color: #ffc34d;
    border-radius: 30px;   
    width:100;
    height:50;
    font-family: "나눔스퀘어";
}
.btn{
    background-color: #ffc34d;
    border-radius: 20px;   
    width:100;
    height:30;
    font-family: "나눔스퀘어";
}
</style>
</html>