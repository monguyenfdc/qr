<?php
include ('config.php');
include ('conten.php');
if (empty($_COOKIE['vip'])) header("location:manager.php");
?>
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