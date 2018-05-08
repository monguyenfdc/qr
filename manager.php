<?php
include ('config.php');
include ('conten.php');
?>

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

  <div class="container">
  <div class="row"> 
 
     <div class="col-sm-4" >
  <div class='input-group'><span class='form-control'>QUÂN SỐ NGÀY: <?php echo $today; ?></span>
  <span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> 
  <div style="width: 100%; height: 550px; overflow:auto; border: 2px solid #c5cdd8;">
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
  $query = "select * from doi ";$sql = mysql_query($query); 
  $sl=0;
  while($row = mysql_fetch_assoc($sql)){ $doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE doi = '$doi' and ngay='$today'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td>$doi </td>
            <td>$row2</td>
        </tr>
        ";}
    ?>
	

    </tbody>
    </table>
</div></div>
 <div class="col-sm-8" >
 <div class='input-group'><span class='form-control'>THÔNG TIN CÔNG NHÂN LÀM VIỆC TRONG NGÀY</span>
 <span class="input-group-addon"><button id="exportButton2" >Xuất Excel</button></span></div>
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
 <div style="width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;">
  <table class="table table-bordered" id="exportTable2">
 <thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
</tr>
 </thead>
 <tbody id="myTable">
 <?php
 $query3=mysql_query("SELECT * FROM congnhan WHERE ngay='$today'order by doi desc");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
   
    </tr>";
    }
   echo '</tbody></table>'; 
 ?>
 </div>
 </div>
 
 
  </div>
  </div>


  <footer>
  <center>
  Copyright by FDC<br />
  Design and development by <a href="https://www.facebook.com/monguyen.giskill" target="_blank">mo.nguyen@fdcc.com.vn</a></center> 
  </footer>
  
 </body>
 </html>