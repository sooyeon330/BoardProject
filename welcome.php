<?php
    session_start();
    require '../include/con_db.php'; 
   
    $id= $_POST["id"];
    $pw= $_POST["pw"];
    
    $saveid=$_POST["saveid"];
    setcookie("saveid",$saveid);
 
    if(isset($_SESSION[id])){
        echo "★ $_SESSION[id] 님이 로그인 중입니다 ★<p>";
        echo "<form action='change.php' method='POST'>
               <input type='hidden' name='id' value='$id'>
                <input type='submit' value='정보변경'>
               <input type='button' value='로그아웃' onclick=". "location.href='logout.php'" .">
               </form>";
        if( $_SESSION[id] == 'admin'){
            echo " <input type='button' value='회원리스트' onclick="."location.href='list.php'".">";
        }
//         echo "$_SESSION[id]";
        echo "<input type='button' value='메인으로' class='btn_log' onclick="."location.href='main.php'></center>";
        
    }
    else{
  
        $sellog = "select pw from members where id='$id' AND pw='$pw' ";
        $login = mysql_query($sellog,$connect);
        
        $logcnt = mysql_num_rows($login);
     
        if($logcnt==1){
            $_SESSION[id]="$id";
            if($saveid){
            $cookie = setcookie("id","$id");
            echo "$_COOKIE[id]";
            }
            echo "★ $_SESSION[id] 님이 로그인 중입니다 ★<p>";
            echo "";
            echo "<form action='change.php' method='POST'>
                   <input type='hidden' name='id' value='$id'>
                    <input type='submit' value='정보변경'>
                   <input type='button' value='로그아웃' onclick=". "location.href='logout.php'" .">
                   </form>";
            if($id == 'admin'){
                echo " <input type='button' value='회원리스트' onclick="."location.href='list.php'".">";
            }
            echo "$_SESSION[id]";
            echo "<input type='button' value='메인으로' class='btn_log' onclick="."location.href='main.php'></center>";
            
        }
        else
            echo "아이디와 비밀번호가 맞지 않습니다.";
    }
    
    
        

        
?>