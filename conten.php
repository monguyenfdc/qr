<?php 
if (empty($_COOKIE['project'])) header("location:login.php");
if (isset($_COOKIE['vip'])and $_COOKIE['vip']==2)header("location:super.php");
if (isset($_COOKIE['vip'])and $_COOKIE['vip']==3)header("location:super2.php");
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
     <script src="js/jquery.waypoints.min.js"></script>
     <script src="js/main.js"></script>          

<script>
function confirmAction() {
      return confirm("Bạn chắc chắn muốn xóa")
    }
</script>
<script>function setting() { window.open('setting.php?admin=<?php echo $_COOKIE['ten'];?>','Edit','width=960,height=350'); return false; }</script> 
</head>

<body>

	<div id="fh5co-page">
		<a type="button" href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight cbp-spmenu">
			<H3><B><?php echo strtoupper($_COOKIE['project']); ?></B></H3>
  <a href="<?php if (isset($_COOKIE['vip'])and $_COOKIE['vip']==1) echo 'vip.php'; else echo '#'; ?>"><span class='glyphicon glyphicon-user' aria-hidden='true'> <?php echo $_COOKIE['ten']; ?></a><br />
  			<nav id="fh5co-main-menu" role="navigation">
				<ul >
					 <li> <H4>QUẢN LÝ</H4></li>
 <li> <a href="manager.php"  title="Quản lý" >QUÂN SỐ HẰNG NGÀY </a></li>
  <li><a href="toolbox.php"  title="Quản lý" >ĐTC/NTP</a></li>
  <li><H4>CÔNG CỤ</H4></li>
  <li><a href="import.php"  title="Nhập liệu" >NHẬP LIỆU</a></li>
  <li><a href="layout.php"  title="Xuất thẻ công nhân" >XUẤT THẺ</a></li>
   <li><div  class="menua">
<div class="dropdown">
   <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Thiết lập"> 
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> CÀI ĐẶT </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
  <center>
    <a href="#" onclick='return setting()' > <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Thiết lập</a> <br />
    <a href="manager.php?out=1" > <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Đăng xuất</a>
  </center>
  </ul>
</div>

</div></li>
				</ul>
			</nav>

		</aside>

		<div id="fh5co-main">
		<header>
        <div class="pc">
                <div class="row"> <CENTER>
     <div class="col-sm-2" >
        <img src="img/logo.png" height="40px" width="90px" />
     </div>
     <div class="col-sm-7" >
        <h3><B>KIỂM SOÁT CÔNG NHÂN RA VÀO DỰ ÁN</B></h3>
     </div>
     <div class="col-sm-3" >
        <img src="img/hsse.png" height="40px" width="90px" />
     </div></CENTER>
  </div>
  </div>
  <div class="mobile">
                 <CENTER>
     <h3>
        <img src="img/logo.png" height="30px" width="60px"/>
     
        <B>QR PROJECT</B>
    
        <img src="img/hsse.png" height="30px" width="60px" />
     </h3></CENTER>
  </div>
  
 </header>
 <footer >
 FDC   <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> MO.NGUYEN
 </footer>
  
  