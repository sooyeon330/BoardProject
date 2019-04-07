<?php
session_start();
//require '../include/con_db.php';
require '../include/db_conn.php';

$subject = $_POST['subject'];
$contents = $_POST['contents'];
$id = $_SESSION[id];

$add_subject = addslashes($subject);
$add_contents = addslashes($contents);

$select = "insert into board(id,subject,contents,w_date)";
$select .="values('$id', '$add_subject','$add_contents',now() ) ";
$result = mysql_query($select,$conn);

    if($result){
         //   echo "<script>alert('글이 등록되었습니다.'); location.href='board_list.php'; </script>";
        }  
    else echo "글 실패";
    
    if($result){
        $query="select num from board where id='$id' and subject='$add_subject'";
        
        $result=mysql_query($query) or die (mysql_error());
        $row=mysql_fetch_row($result);
        $num=$row[0];
        //echo $num;
    }
    else echo "ERROR";

    $file_name = $_FILES['upfile']['name'];
    
    echo $file_name;
    if($file_name != ""){
        $up_dir = $_SERVER['DOCUMENT_ROOT']."/upload";
        $filename_tmp = $_FILES['upfile']['tmp_name'];
        $file_type = $_FILES['upfile']['type'];
        $filename_arr = explode(".", $file_name);
        $extension = strtolower($filename_arr[sizeof($filename_arr)-1]);
        $filesize = $_FILES['upfile']['size'];
        
        $original_file_name = $file_name;
        $new_file_name = time() .".".$extension;
        $save_name = $up_dir."/".$new_file_name;
        echo $save_name;
        if(move_uploaded_file($filename_tmp, $save_name)){
            if(file_exists($filename_tmp))
                unlink($filename_tmp);
        }
        else{
            echo ("<script>
                       window.alert('파일 저장 오류'); history.go(-1);
                   </script>");
                     exit;
        }

        $fsql = "insert into file_board (s_num, ofile, nfile)
                        values ($num, '$original_file_name','$new_file_name')";
        $result2 = mysql_query($fsql,$conn);
         
        
         if($result2){
             echo "<script>alert('파일이 등록되었습니다.'); location.href='board_list.php'; </script>";
         }
         else
             echo "파일실패";
   }
   else // echo "<script>alert('파일실패'); location.href='board_list.php'; </script>";
   

?>