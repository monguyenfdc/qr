<?php
include ('config.php');
if(empty($_COOKIE['vip'])or $_COOKIE['vip']!=3)header("location:manager.php");
if (isset($_POST['date'])){ $today=$_POST['ndt'];}
?>
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
			<H3><B>HSSE</B></H3>
   <a href="<?php if (isset($_COOKIE['vip'])and $_COOKIE['vip']==1) echo 'vip.php'; else echo '#'; ?>"><span class='glyphicon glyphicon-user' aria-hidden='true'> <?php echo $_COOKIE['ten']; ?></a><br />
  			<nav id="fh5co-main-menu" role="navigation">
				<ul >
					 <li> <H4>PROJECT</H4></li>
   <?php 
  $sql = mysql_query("SELECT DISTINCT `project` FROM user WHERE vip ='0'");
  $sl=0;if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)){ 

   echo "<script>function setting{$row['project']}() { window.open('project.php?project={$row['project']}','Project','width=1200,height=600'); return false; }</script>
   <li> <a onclick='return setting{$row['project']}();' > {$row['project']}</a></li>  ";}
        }
    ?>

  
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
  
  
<script type="text/javascript" src="js/Chart.js"></script>
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
  <div class="row"> 
 
     <div class="col-sm-4" >
   <form action="" method="post">
  <div class='input-group'>
  <span class='form-control'><a id="ti">QUÂN SỐ NGÀY:</a> </span>
  <span class="input-group-addon"><input type="date"  id="dt" onchange="mydate1();" style="height: 20px;" hidden/>
<input type="text" id="ndt" name="ndt"  onclick="mydate();" hidden />
<input type="button" id="da" Value="<?php echo $today; ?>" onclick="mydate();" />
<input type="submit" id="up" value="view" name="date" hidden/>
</span>
  <span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> </form>
  <div style="width: 100%; height: 500px; overflow:auto; border: 2px solid #c5cdd8;">
    <table class="table table-striped"  id="exportTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>DỰ ÁN</th>
            <th>QS</th>
        </tr>
    </thead>
    <tbody>
       <?php 
  $sql = mysql_query("SELECT DISTINCT `keycheck` FROM `congnhan`");
  $sl=0;if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)){ $key = $row['keycheck'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key' and ngay='$today'");
   $row2 = mysql_num_rows($query2); 
   $query3=mysql_query("SELECT DISTINCT `keycheck`, `project` FROM user WHERE keycheck = '$key'");
    $row3 = mysql_fetch_assoc($query3);
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td>{$row3['project']}</td>
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
<?php $query4=mysql_query("SELECT * FROM congnhan WHERE ngay='$today'");
echo mysql_num_rows($query4);
?></b>
</div>
</div>
<div class="col-md-8">
<span  class="input-group-addon">Biến động quân số</span> 
<canvas id="chartjs-0" class="chartjs" width="100%" height="65px" style="display: block; width: 100%; height: 100px; border: 2px solid #c5cdd8;"></canvas>
</div></div>

<script>
new Chart(document.getElementById("chartjs-0"),{
    "type":"line",
    "data":{
        "labels":["<?php echo date('d-m', strtotime('-6 day')); ?>","<?php echo date('d-m', strtotime('-5 day')); ?>","<?php echo date('d-m', strtotime('-4 day')); ?>","<?php echo date('d-m', strtotime('-3 day')); ?>","<?php echo date('d-m', strtotime('-2 day')); ?>","<?php echo date('d-m', strtotime('-1 day')); ?>","<?php echo date('d-m'); ?>"],
        "datasets":[
         <?php 
 $t1=date('d-m-Y', strtotime('-6 day')); $t2=date('d-m-Y', strtotime('-5 day')); $t3=date('d-m-Y', strtotime('-4 day')); $t4=date('d-m-Y', strtotime('-3 day')); $t5=date('d-m-Y', strtotime('-2 day')); $t6=date('d-m-Y', strtotime('-1 day')); $t7=date('d-m-Y');
  $sql4 = mysql_query("SELECT DISTINCT `keycheck` FROM `congnhan`");
  $sl=45;$sl2=190;if(mysql_num_rows($sql4)>0){
  while($row4 = mysql_fetch_assoc($sql4)){ $key4 = $row4['keycheck'];
  $query6=mysql_query("SELECT DISTINCT `keycheck`, `project` FROM user WHERE keycheck = '$key4'");
    $row6 = mysql_fetch_assoc($query6);$prj4 = $row6['project'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t1'");
  $query3=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t2'");
  $query4=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t3'");
  $query5=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t4'");
  $query6=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t5'");
  $query7=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t6'");
  $query8=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key4' and ngay='$t7'");
   $row2 = mysql_num_rows($query2); 
   $row3 = mysql_num_rows($query3); 
   $row4 = mysql_num_rows($query4); 
   $row5 = mysql_num_rows($query5); 
   $row6 = mysql_num_rows($query6); 
   $row7 = mysql_num_rows($query7); 
   $row8 = mysql_num_rows($query8); 
 $sl=$sl+30;$sl2=$sl2-20;
   echo "
        {
            'label':'$prj4',
            'data':[$row2,$row3,$row4,$row5,$row6,$row7,$row8,],
            'fill':false,
            'borderColor':'rgb($sl, $sl2, $sl2 )',
            'lineTension':0.1},
        
        ";}
        }
    ?>
        
        ]},
        "options":{}});
            </script>
</div>
