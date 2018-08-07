
<?php
include ('config.php');

if (isset($_POST['date'])){ $today=$_POST['ndt'];}
if (isset($_GET['project'])){
   $project=$_GET['project'];
$sqll=mysql_query("SELECT * FROM user WHERE project='$project'");
 $roww = mysql_fetch_assoc($sqll);$keyqr=$roww['keycheck'];}
mysql_query("DELETE FROM `$project`");
mysql_query("INSERT INTO `$project` (doi)
SELECT DISTINCT doi
FROM `congnhan` WHERE `keycheck` ='$keyqr'and `ngay`='$today'");    


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
  <div style="width: 100%; height: 516px; overflow:auto; border: 2px solid #c5cdd8;">
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
  $query = "select * from `$project` ";$sql = mysql_query($query); 
  $sl=0;if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)){ $doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE doi = '$doi' and ngay='$today' and keycheck='$keyqr'");
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
<?php $query4=mysql_query("SELECT * FROM congnhan WHERE ngay='$today' and keycheck='$keyqr'");
echo mysql_num_rows($query4);
?></b>
</div>
</div>
 <div class="col-sm-8" >
 <div class='input-group'><span class='form-control'>CÔNG NHÂN TRONG NGÀY</span>
 <span class="input-group-addon"><button id="exportButton2" >Xuất Excel</button></span></div>

 <div style="width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;">
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
 $query3=mysql_query("SELECT * FROM congnhan WHERE ngay='$today'and keycheck='$keyqr'order by doi desc");
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
  </div>



  
 </body>
 </html>