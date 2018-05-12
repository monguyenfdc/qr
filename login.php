<?php
include ('config.php');
$sql = "CREATE DATABASE IF NOT EXISTS qr CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'";
if (mysql_query($sql)) 
{     
    // BUOC 2: T?O TABLE
    mysql_select_db('qr');
    mysql_query("CREATE TABLE IF NOT EXISTS user (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    matkhau VARCHAR(20) NOT NULL,
    project VARCHAR(20) NOT NULL,
    keycheck VARCHAR(20) NOT NULL,
    vip VARCHAR(10) NOT NULL
)");

$sql2 = mysql_query("SELECT * FROM user where ten='mo.nguyen'");
if(mysql_num_rows($sql2)==0){
     mysql_query("INSERT INTO `user`(`ten`, `matkhau`, `project`, `keycheck`, `vip`) VALUES ('mo.nguyen','khoamofc','Paihong','atph1','1')");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>login</title>

<title>login</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>


<div class="cbp-spmenu"  id="hidden-main-left">
<center>
<img src="img/logo.png" />
</center>
</div>
<div class="container">
 <div class="row">

<div class="login">
<center> <img src="img/hsse.jpg" /></center>
 <hr />
<form method="post">
<input class="form-control" type="text" name="ten" required="required" placeholder="Tên đăng nhập"/><br />
<input class="form-control" type="password" name="pass" required="required" placeholder="Mật Khẩu"/><br />
<input class="btn btn-success btn-flat btn-lg pull-right button-loading" type="submit" name="login" value="login" />
</form>

<?php
  if(isset($_POST['login'])){
            $sql1=mysql_query('SELECT * FROM user where ten="'.$_POST['ten'].'" and matkhau="'.$_POST['pass'].'"');
            if(mysql_num_rows($sql1)>0){
                $row1 = mysql_fetch_assoc($sql1);
                setcookie("keycheck", $row1['keycheck'], time() + 60*60*24*100);
                setcookie("ten", $row1['ten'], time() + 60*60*24*100);
                setcookie("project", $row1['project'], time() + 60*60*24*100);
                echo "chuẩn";
                   header("location:manager.php");
                   }else echo "<script language='javascript'>alert('Tên hoặc mật khẩu không đúng !')</script>";
                   }

?>
<hr />
</div>

</div>
</div>