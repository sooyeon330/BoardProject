<?php 
extract($_POST);
$num=$_GET[num];

// echo "$subject ,$contents ,$num";
?>
<html>
<body>
<center>
	<form action='board_update.php?num=<?=$num?>' method='POST'>
	제목 : <input type='text' size='90' name='subject' value='<?=$subject?>' autofocus><p>
	<textarea rows='20' cols='100' name='contents' value='<?=$contents?>'></textarea> <br>
	<input type='submit' value='수정하기'>
	</form>
</center>	
</body>
</html>