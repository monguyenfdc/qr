<?php
include ('config.php');

if(isset($_REQUEST["admin"])){
    $ad =$_REQUEST["admin"];
    $query = "select * from user where ten = '$ad'";
    $sql = mysql_query($query);
    $row = mysql_fetch_assoc($sql);
       
 }
?>
<!DOCTYPE html>
<html>
<head>
	

<title>SETTING</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>


</head>
<div class="container">
  <div class="row"> 
    <img src="img/hsse.jpg" height="60px" width="150px" /><br />
  
   <div class='input-group'>
    <span class="input-group-addon">Admin</span>
    <span class='form-control'><?php echo $row['ten'] ?></span>
    
    <span class="input-group-addon">Công trình</span>
    <span class='form-control'><?php echo $row['project'] ?></span>
    
    <span class="input-group-addon">Mã số quét</span>
    <span class='form-control'><?php echo $row['keycheck'] ?></span>
    </div>
    <div class='input-group'>
    <span class="input-group-addon"><img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://work.fdcc.com.vn:8081/index.php?msqr=<?php echo $row['keycheck'] ?>' height='102px' width='102px'/></span>
    <span class='form-control'>Mã Set-up máy quét: Quét mã này thay cho điền mật khẩu trên điện thoại</span>
    </div>
 <center>
 
<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Đổi mật khẩu đăng nhập
</button></center>
<div class="collapse" id="collapseExample">
  <div class="well">
    <form action="" method="POST">
    Nhập Pass đăng nhập
    <input type="password" class="form-control" name="pass"  required="required" />
    Nhập Pass mới
    <input type="password" class="form-control" name="pass1"  required="required"/>
    Nhập lại Pass
    <input type="password" class="form-control" name="pass2"  required="required"/>
    <input type="submit"  class="btn btn-default"  name="setpass" value="OK" />
    </form>
  </div>
</div>


    
 
</div>
</div>
 <?php
 if(isset($_POST["setpass"])){
    $pass=$_POST["pass"];$pass1=$_POST["pass1"];$pass2=$_POST["pass2"];
    $sql1=mysql_query("SELECT * FROM user where matkhau='$pass'");
            if(mysql_num_rows($sql1)>0){
                if ($pass1==$pass2){
                    $sql1=mysql_query("UPDATE user SET matkhau='$pass1'WHERE ten='$ad'");
                    if($sql1) echo "<script language='javascript'>alert('Cập nhật thành công!')</script>"; 
                   
                }else echo "<script language='javascript'>alert('Xác nhận mật khẩu không đúng !')</script>";
 }else echo "<script language='javascript'>alert('Mật khẩu không đúng !')</script>";
 }

 ?>

</body>