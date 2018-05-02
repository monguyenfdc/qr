<?php
 mysql_connect('localhost','root',''); //ket noi FDC
 mysql_select_db("qr" ); //lua chon database
  mysql_query("SET NAMES utf8");
 date_default_timezone_set("Asia/Ho_Chi_Minh");
  $today=date('d-m-Y');
  session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Check in</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
     
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
 
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/swal.js"></script>


</head>
<body >
<header>
<center>
<?php
if (isset($_COOKIE['username'])){           
      if(isset($_REQUEST["cmnd"])){
    
    $cmnd=$_REQUEST["cmnd"];
    $query = "select * from sheet1 where cmnd = '$cmnd'";$sql = mysql_query($query); $row = mysql_fetch_assoc($sql); 
    if ($row>0){
    $ten =$row['ten'];
    $nam= $row['nam'];
    $doi=$row['doi'];
    $note=$row['note'];
    $ngay=$today;
    $query2 = "select * from congnhan where cmnd = '$cmnd'and ngay='$today'";$sql2 = mysql_query($query2); $row2 = mysql_fetch_assoc($sql2);
    if ($row2>0) echo "Đã kiểm <br/> $ten - $doi - $note"; else{
    $sql=mysql_query("INSERT INTO congnhan value('','".$ten."','".$nam."','".$cmnd."','".$doi."','".$ngay."')");
      if($sql) {
        echo "$ten - $doi - $note";
      }
      }}else echo 'Thu thẻ - Xử lý';
 }
      
    }else{
        echo '<!-- dang nhap-->
  
 Đăng nhập

<form method="POST" action="">

Tên đăng nhập 
    <input class="form-control" type="text" name="user" required="required"/>
Mật khẩu 
    <input class="form-control" type="password" name="pass" required="required"/>
    <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Đăng nhập" />

</form></div>
 <!-- end dn -->';
        if(isset($_POST['submit'])){

            if(($_POST['user']='ATVFDCC')and ($_POST['pass']='fdc@tocdo')){
                setcookie("username", $_POST['user'], time() + 3600);
                   
                echo'<script language="javascript">{window.location.reload(); }</script>'; 
                  
              
                             
            }else echo "<script language='javascript'>alert('Tên hoặc mật khẩu không đúng !')</script>";
        }
   }
   
?>          
</center>