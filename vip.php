<?php
include ('config.php');
include ('conten.php');
if (empty($_COOKIE['vip'])) header("location:manager.php");
?>
<script type="text/javascript" src="js/chart.js"></script>
 <div class="container">
  <div class="row"> 
 
     <div class="col-sm-4" >
  <div class='input-group'><span class='form-control'>TỔNG QS NGÀY: <?php echo $today; ?></span>
  <span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> 
  <div style="width: 100%; height: 516px; overflow:auto; border: 2px solid #c5cdd8;">
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
  $sql = mysql_query("SELECT DISTINCT `keycheck`,`project` FROM `congnhan`");
  $sl=0;if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)){ $key = $row['keycheck'];$prj = $row['project'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE keycheck = '$key' and ngay='$today'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td>$prj</td>
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
<span  class="input-group-addon">Giám sát công trình</span> 
  <div style='width: 100%; height: 228px; overflow:auto;border: 1px solid #c5cdd8;'>
  <?php 
  if(isset($_REQUEST["idgs"])){
    $idgs=$_REQUEST["idgs"];
    $sql3=mysql_query("SELECT * FROM user where id = '$idgs' ");$row3 = mysql_fetch_assoc($sql3);
    echo "<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Edit {$row3['ten']}!</strong> <br/>
  <table>
  <form action='' method='post'>

  <tr>

  <td><input class='form-control' type='text' required='required' name='ten' value ='{$row3['ten']}'/></td>
  <td><input class='form-control' type='text' required='required' name='project' value ='{$row3['project']}'/></td>
  <td><input class='form-control' type='text' required='required' name='qrcode' value ='{$row3['keycheck']}'/></td>
  <td><span class='input-group-addon'><input type='submit' value='chuyen' name='go'/> </span></td>
</form></tr></table></div>";
}
  ?>
   <table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>

<th>NAME</th>
<th>PROJECT</th>
<th>MS QR</th>

</tr>
 </thead>
<?php

$sql1=mysql_query('SELECT * FROM user');
while($row1 = mysql_fetch_assoc($sql1)){
     echo "<tr>
            <td>{$row1['ten']} </td>
            <td>{$row1['project']} </td>
            <td>{$row1['keycheck']} </td>
            <td><a href=vip.php?idgs={$row1['id']}>edit</a> </td>
        </tr>
        ";}
echo "</table>";


?>

</div>


<span  class="input-group-addon">Thêm công trường</span> 
  <div style='width: 100%; border: 1px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>

 <form action='' method='post'>
  <div class='input-group'>
  <tr>
  <td><input class='form-control' type='text' required='required' name='ten' placeholder="Tên đăng nhập" /></td> 
  <td><input class='form-control' type='text' required='required' name='pass' placeholder="Sét mật khẩu"/></td>
   <td><input class='form-control' type='text' required='required' name='project' placeholder="Dự án"/></td>
    <td><input class='form-control' type='text' required='required' name='qrcode' placeholder="Mã số quét"/></td>
  <td><span class='input-group-addon'><input type='submit' value='add' name='add'/> </span></td>
</div> </form>
 </tr>
 </table>

</div>
<?php
if(isset($_POST["go"])){
     $sql1=mysql_query("UPDATE user SET ten='{$_POST["ten"]}', project='{$_POST["project"]}', keycheck ='{$_POST["qrcode"]}' WHERE id='$idgs'");
if($sql1) { echo "<script language='javascript'>alert('Edit thành công !')</script>";
}}
if(isset($_POST["add"])){
     $sql1=mysql_query("INSERT INTO `user`(`ten`, `matkhau`, `project`, `keycheck`, `vip`) VALUES ('{$_POST["ten"]}','{$_POST["pass"]}','{$_POST["project"]}','{$_POST["qrcode"]}','0')");
if($sql1) { echo "<script language='javascript'>alert('Thêm thành công thành công !')</script>";
}}
?>
<canvas id="chartjs-0" class="chartjs" width="100%" height="30px" style="display: block; width: 100%; height: 30px; border: 2px solid #c5cdd8;"></canvas>
<script>
new Chart(document.getElementById("chartjs-0"),{
    "type":"line",
    "data":{
        "labels":["<?php echo date('d-m', strtotime('-6 day')); ?>","<?php echo date('d-m', strtotime('-5 day')); ?>","<?php echo date('d-m', strtotime('-4 day')); ?>","<?php echo date('d-m', strtotime('-3 day')); ?>","<?php echo date('d-m', strtotime('-2 day')); ?>","<?php echo date('d-m', strtotime('-1 day')); ?>","<?php echo date('d-m'); ?>"],
        "datasets":[
         <?php 
 $t1=date('d-m-Y', strtotime('-6 day')); $t2=date('d-m-Y', strtotime('-5 day')); $t3=date('d-m-Y', strtotime('-4 day')); $t4=date('d-m-Y', strtotime('-3 day')); $t5=date('d-m-Y', strtotime('-2 day')); $t6=date('d-m-Y', strtotime('-1 day')); $t7=date('d-m-Y');
  $sql4 = mysql_query("SELECT DISTINCT `keycheck`,`project` FROM `congnhan`");
  $sl=45;$sl2=190;if(mysql_num_rows($sql4)>0){
  while($row4 = mysql_fetch_assoc($sql4)){ $key4 = $row4['keycheck'];$prj4 = $row4['project'];
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
