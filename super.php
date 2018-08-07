<?php
include ('config.php');
if (isset($_POST['date'])){ $today=$_POST['ndt'];}
if(empty($_COOKIE['vip'])or $_COOKIE['vip']!=2)header("location:manager.php");
mysql_query("DELETE FROM `{$_COOKIE['project']}`");
mysql_query("INSERT INTO `{$_COOKIE['project']}` (doi)
SELECT DISTINCT doi
FROM `congnhan` WHERE `keycheck` ='{$_COOKIE['keycheck']}'and `ngay`='$today'");
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
     <script type="text/javascript" src="js/Chart.js"></script>       

</head>

<body>

	<div id="fh5co-page">
		<a type="button" href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight cbp-spmenu">
			<H3><B><?php echo strtoupper($_COOKIE['project']); ?></B></H3>
  <a href="super.php"><span class='glyphicon glyphicon-user' aria-hidden='true'> <?php echo $_COOKIE['ten']; ?></a><br />
  			<nav id="fh5co-main-menu" role="navigation">
				<ul >
					 <li> <H4>QUẢN LÝ</H4></li>

    <a href="manager.php?out=1" > <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Đăng xuất</a>
 
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
  
  
<div class="row"> 
 
     <div class="col-sm-4" >
     <script>
function mydate()
{
  //alert("");
document.getElementById("dt").hidden=false;
document.getElementById("ndt").hidden=true;
document.getElementById("da").hidden=true;
document.getElementById("up").hidden=false;
document.getElementById("ti").hidden=true;
}
function mydate1()
{
 d=new Date(document.getElementById("dt").value);
dt=d.getDate();
mn=d.getMonth();
mn++;
yy=d.getFullYear();
document.getElementById("ndt").value=(dt < 10 ? "0" : "")+dt+"-"+(mn < 10 ? "0" : "")+mn+"-"+yy
document.getElementById("ndt").hidden=false;
document.getElementById("dt").hidden=true;
}
</script>


     <form action="" method="post">
  <div class='input-group'>
  <span class='form-control'><a id="ti">QUÂN SỐ NGÀY:</a> </span>
  <span class="input-group-addon"><input type="date"  id="dt" onchange="mydate1();" style="height: 20px;" hidden />
<input type="text" id="ndt" name="ndt"  onclick="mydate();" hidden />
<input type="button" id="da" Value="<?php echo $today; ?>" onclick="mydate();" />
<input type="submit" id="up" value="view" name="date" hidden/>
</span>

  
  <span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> </form>
  <div style="width: 100%; height: 416px; overflow:auto; border: 2px solid #c5cdd8;">
    <table class="table table-striped"  id="exportTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>DOI</th>
            <th>QS</th>
        </tr>
    </thead>
    <tbody>
  <?php 
  $query = "select * from `{$_COOKIE['project']}` ";$sql = mysql_query($query); 
  $sl=0;if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)){ $doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE doi = '$doi' and ngay='$today' and keycheck='{$_COOKIE['keycheck']}'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td>$doi </td>
            <td>$row2</td>
        </tr>
        ";}
        }
    ?>
	

    </tbody>
    </table>
</div>
<div style="width: 100%; height: 34px; background: #39F702; border: 1px solid #c5cdd8;">
<b>TỔNG QUÂN SỐ:
<?php $query4=mysql_query("SELECT * FROM congnhan WHERE ngay='$today' and keycheck='{$_COOKIE['keycheck']}'");
echo mysql_num_rows($query4);
?></b>
</div>
</div>
 <div class="col-sm-8" >
 <div class='input-group'><span class='form-control'>CÔNG NHÂN TRONG NGÀY</span>
 <span class="input-group-addon"><button id="exportButton2" >Xuất Excel</button></span></div>

 <div style="width: 100%; height: 416px; overflow:auto;border: 2px solid #c5cdd8;">
  <table class="table table-bordered" id="exportTable2">
 <thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>PROJECT</th>
</tr>
 </thead>
 <tbody id="myTable">
 <?php
 $query3=mysql_query("SELECT * FROM congnhan WHERE ngay='$today'and keycheck='{$_COOKIE['keycheck']}'order by doi desc");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
   <td>{$row3['project']}</td>
    </tr>";
    }
   echo '</tbody></table>'; 
 ?>
 </div>
 
<input style="background: #39F702; border: 1px solid #c5cdd8;"class="form-control" id="myInput" type="text" placeholder="Search..">
 
 <br />
 </div>
 
 
  </div>
  <canvas id="chartjs-1" class="chartjs" width="100%" height="15" style="display: block; width: 678px; height: 339px;"></canvas>

  <?php 
 $t1=date('d-m-Y', strtotime('-6 day')); $t2=date('d-m-Y', strtotime('-5 day')); $t3=date('d-m-Y', strtotime('-4 day')); $t4=date('d-m-Y', strtotime('-3 day')); $t5=date('d-m-Y', strtotime('-2 day')); $t6=date('d-m-Y', strtotime('-1 day')); $t7=date('d-m-Y');

   
  $query2=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t1'");
  $query3=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t2'");
  $query4=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t3'");
  $query5=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t4'");
  $query6=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t5'");
  $query7=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t6'");
  $query8=mysql_query("SELECT * FROM congnhan WHERE keycheck = '{$_COOKIE['keycheck']}' and ngay='$t7'");
   $row2 = mysql_num_rows($query2); 
   $row3 = mysql_num_rows($query3); 
   $row4 = mysql_num_rows($query4); 
   $row5 = mysql_num_rows($query5); 
   $row6 = mysql_num_rows($query6); 
   $row7 = mysql_num_rows($query7); 
   $row8 = mysql_num_rows($query8); ?>
  <script>
  new Chart(document.getElementById("chartjs-1"),
  {"type":"bar","data":

  {"labels":["<?php echo date('d-m', strtotime('-6 day')); ?>","<?php echo date('d-m', strtotime('-5 day')); ?>","<?php echo date('d-m', strtotime('-4 day')); ?>","<?php echo date('d-m', strtotime('-3 day')); ?>","<?php echo date('d-m', strtotime('-2 day')); ?>","<?php echo date('d-m', strtotime('-1 day')); ?>","<?php echo date('d-m'); ?>"],
        
  "datasets":[{
    "label":"<?php echo $_COOKIE['project']; ?>",
  "data":<?php echo "[$row2,$row3,$row4,$row5,$row6,$row7,$row8,]," ?>
  "fill":false,
  "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
  "borderColor":["rgb(255, 99, 132)","rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
  "borderWidth":1}]},
  "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});
  </script>



  
 </body>
 </html>