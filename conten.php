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
       <script type="text/javascript" src="js/swal.js"></script>
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
</head>

<a href="#" onclick="hiddenMainLeft()" class="menua"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
<div class="cbp-spmenu"  id="hidden-main-left">
  <H3><B>MENU</B></H3><br /><br />
  
  <div>
  <H4>QUẢN LÝ</H4>
  <a href="manager.php"  title="Quản lý" >QUÂN SỐ HẰNG NGÀY </a>
  <a href="toolbox.php"  title="Quản lý" >ĐTC/NTP</a>
  <H4>CÔNG CỤ</H4>
  <a href="import.php"  title="Thêm đội" >NHẬP LIỆU</a>
   
</div>
</div>