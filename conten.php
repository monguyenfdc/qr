<?php 
if (empty($_COOKIE['project'])) header("location:login.php");
if (isset($_GET['out'])) {setcookie("project", "", time() - 60*60*24*100);header("location:login.php");}
?>
<!DOCTYPE html>
<html>
<head>
<title>HSSE - FDC</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
     <link rel="shortcut icon" href="/favicon.ico">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/ex1.js"></script>
    <script type="text/javascript" src="js/ex2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sendajax.js"></script>
     <script type="text/javascript" src="js/excel.js"></script>
<script>
function hiddenMainLeft() {
    var hidden = document.getElementById('hidden-main-left');
    if (hidden.style.display === 'none') hidden.style.display = 'block';
	else hidden.style.display = 'none';
}
</script>
<script>
function confirmAction() {
      return confirm("Bạn chắc chắn muốn xóa")
    }
</script>
<script>function setting() { window.open('setting.php?admin=<?php echo $_COOKIE['ten'];?>','Edit','width=960,height=350'); return false; }</script> 
</head>
<body>


<header >
 <div class="container">
  <div class="row"> 
     <div class="col-sm-2" >
        <img src="img/logo.jpg" height="100px" width="100%" />
     </div>
     <div class="col-sm-7" >
        <h3><CENTER><B>KIỂM SOÁT CÔNG NHÂN RA VÀO DỰ ÁN</B></CENTER></h3>
     </div>
     <div class="col-sm-3" >
        <img src="img/hsse.jpg" />
     </div>
  </div>
  </div>
</header>
<div  class="menua">
<div class="dropdown">
   <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Thiết lập"> 
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
  <center>
    <a onclick='return setting()' > <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Thiết lập</a> <br />
    <a href="manager.php?out=1" > <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Đăng xuất</a>
  </center>
  </ul>
</div>
 <br />
<a href="#" onclick="hiddenMainLeft()"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
</div>

<div class="cbp-spmenu"  id="hidden-main-left">
  <H3><B><?php echo strtoupper($_COOKIE['project']); ?></B></H3><br /><br />
  <a><span class='glyphicon glyphicon-user' aria-hidden='true'> <?php echo $_COOKIE['ten']; ?></a><br />
  <div>
  <H4>QUẢN LÝ</H4>
  <a href="manager.php"  title="Quản lý" >QUÂN SỐ HẰNG NGÀY </a>
  <a href="toolbox.php"  title="Quản lý" >ĐTC/NTP</a>
  <H4>CÔNG CỤ</H4>
  <a href="import.php"  title="Nhập liệu" >NHẬP LIỆU</a>
  <a href="layout.php"  title="Xuất thẻ công nhân" >XUẤT THẺ</a>
   
</div>
</div>