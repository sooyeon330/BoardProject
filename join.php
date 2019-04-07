<?php
        require '../include/con_db.php'; 

       $grade = $_POST["grade"];
       $name=$_POST["name"];
       $id=$_POST["id"];
       $mail = $_POST["mail"] ;
       $pw1=$_POST["pw1"];
       $pw2=$_POST["pw2"];
       $idnum1=$_POST["numid1"];
       $idnum2=$_POST["numid2"];
       $tell = $_POST["tel1"];
       $tel=$_POST["tel"];
       $adress=$_POST["adress"];       
       $Date = date("Y");
             
       
      $selid = "select id from member where id='$id' ";
      $reslutid = mysql_query($selid,$connect);
      $idcnt = mysql_num_rows($reslutid);

      echo "$idnum1 , $idnum2";
      
          $year = substr($idnum1, 0,2);
          $mon = substr($idnum1, 2,2);
          $day = substr($idnum1, 4,2);
          $birthday = $year . $mon . $day;
                  
          $sql = "insert into member (id, pw, name, birthday, idnum, tel,email,adress)";
          $sql .= " values ('$id','$pw2','$name','$birthday', '$idnum1$idnum2','$tell$tel','$mail','$adress')";
     //    echo $sql;
          $reslut = mysql_query($sql);
          echo "$id 님 가입되셨습니다.";
          
/*            if($reslut)
               echo "레코드 삽입 완료<p>";
           else
               echo "레코드 삽입 실패<p>"; */
                  
         mysql_close($connect);

    /*      
       echo ("이름 : ". trim($name) . " <br>");
       echo ("아이디 : ". trim($id) . "<br>");
       echo ("메일 : $mail<br>");
      
       echo ("pw1 : $pw1"); echo("  pw2 : $pw2 <br>");
       if($pw1 != $pw2) echo "비밀번호가 같지 않습니다.<br>";
       else echo "비밀번호가 같습니다 <br>";       
      
       switch($idnum2){
           case 1: case 3: echo "남자입니다. <br>"; break;
           case 2: case 4: echo "여자입니다. <br>"; break;
       }
        
       echo("주민번호  : $idnum1 - $idnum2****** <br>");
       
       echo("주소  : $adress <br>");
       
       $year = substr($idnum1, 0,2);
       $mon = substr($idnum1, 2,2);
       $day = substr($idnum1, 4,2);
       $age1 = $Date - $year -1900+1;
       $age2 = $Date - $year -2000+1;
       
       switch($idnum2){
           case 1: case 2:
               echo($year+1900 ." 년".  $mon ."월". $day ." 일 <br>");
               echo("나이 : ". $age1. "<br>");
                break;
           case 3: case 4:               
               echo($year+2000 ." 년".  $mon ."월". $day ." 일 <br>");
               echo "나이 : " . $age2. "<br>";
               break;
       }
       
       echo ("전화번호 : $tell $tel <br>");
       echo "$grade 학년 <br>";
       
       if(!empty($_POST["ck"]))
       {
           foreach( $_POST["ck"] as $a){
               echo "$a ";
           }
       }
*/
      
?>