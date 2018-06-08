<?php
include ('config.php');
include ('conten.php');
$sql = "CREATE DATABASE IF NOT EXISTS qr CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci'";
if (mysql_query($sql)) 
{     
    // BUOC 2: T?O TABLE
    mysql_select_db('qr');
    mysql_query("CREATE TABLE IF NOT EXISTS congnhan (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    nam VARCHAR(20) NOT NULL,
    cmnd VARCHAR(20) NOT NULL,
    doi VARCHAR(100) NOT NULL,
    ngay VARCHAR(50) NOT NULL,
    project VARCHAR(50) NOT NULL,
    keycheck VARCHAR(10) NOT NULL
)");
    // Th?c thi câu truy v?n
    
     mysql_query("CREATE TABLE IF NOT EXISTS {$_COOKIE['project']} (
    id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    doi VARCHAR(100) NOT NULL
)");
    // Th?c thi câu truy v?n
    
     mysql_query("CREATE TABLE IF NOT EXISTS sheet1 (
    ID INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    nam VARCHAR(20) NOT NULL,
    cmnd VARCHAR(20) NOT NULL,
    doi VARCHAR(100) NOT NULL,
    note VARCHAR(50) NOT NULL,
    project VARCHAR(50) NOT NULL
)");


}
mysql_query("DELETE FROM `{$_COOKIE['project']}`");
mysql_query("INSERT INTO `{$_COOKIE['project']}` (doi)
SELECT DISTINCT doi
FROM `congnhan` WHERE `keycheck` ='{$_COOKIE['keycheck']}'and `ngay`='$today'");
?>

  
  <div class="row"> 
 
     <div class="col-sm-4" >
  <div class='input-group'><span class='form-control'>QUÂN SỐ NGÀY: <?php echo $today; ?></span>
  <span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> 
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
  </div>



  
 </body>
 </html>