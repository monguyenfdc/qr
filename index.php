<?php
include ('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Check in</title>

<title>Checked</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body >

<center>
<header>
<div class="container">
<img src="img/logo.png" height="50px" width="120px" />
</div>
</header>
<div class="container">
<br />
<?php
if (isset($_COOKIE['keycheck'])){           
      if(isset($_REQUEST["cmnd"])){
    //kiểm tra số cmnd
    $cmnd=$_REQUEST["cmnd"];
    $query = "select * from sheet1 where cmnd = '$cmnd'";$sql = mysql_query($query); $row = mysql_fetch_assoc($sql); 
    if ($row>0){
    $ten =$row['ten'];
    $nam= $row['nam'];
    $doi=$row['doi'];
    $note=$row['note'];
    $ngay=$today;
    $project=$row['project'];
    $check=$_COOKIE['keycheck'];
    //kiểm tra đã kiểm hay chưa
    $query2 = "select * from congnhan where cmnd = '$cmnd'and ngay='$today'and keycheck='$check'";
    $sql2 = mysql_query($query2); $row2 = mysql_fetch_assoc($sql2);
    if ($row2>0) echo "
    <h2><b style='color: red;'>Đã kiểm </b> </h2><h2><b> Dự án $project</b> </h2><h2> $ten </h2> <h3>$nam <h3> <h2><b>Đội:</b> $doi </h2> <h3><b style='color: red;'>$note</b></h3>"; 
    else{
    if ($project != $_COOKIE['keypj']) echo "<script language='javascript'>alert('Công nhân từ dự án $project !')</script>";
    $sql=mysql_query("INSERT INTO congnhan value('','".$ten."','".$nam."','".$cmnd."','".$doi."','".$ngay."','".$project."','".$check."')");
      if($sql) {
        echo "<h2><b> Dự án $project</b> </h2><h2> $ten </h2> <h3>$nam <h3> <h2><b>Đội:</b> $doi </h2> <h3><b style='color: red;'>$note</b></h3>";
      }
      }}else echo "<b style='color: red;'>Gian lận - Thu thẻ - Xử lý</b>";
 }
      
    }else{
        echo '<!-- dang nhap-->
<form method="POST" action="">

Password:
    <input class="form-control" type="password" name="pass" required="required"/>
    <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Đăng nhập" />

</form></div>
 <!-- end dn -->';
        if(isset($_POST['submit'])){
 $sql1=mysql_query('SELECT * FROM user where keycheck="'.$_POST['pass'].'"');
            if(mysql_num_rows($sql1)>0){
                $row1 = mysql_fetch_assoc($sql1);
                setcookie("keycheck", $_POST['pass'], time() + 60*60*24*100);
                setcookie("keypj", $row1['project'], time() + 60*60*24*100);
                   
                echo'<script language="javascript">{window.location.reload(); }</script>'; 
                  
              
                             
            }else echo "<script language='javascript'>alert('Tên hoặc mật khẩu không đúng !')</script>";
        }
   }
   
?>          
</center>
</div>
</body>
</html>