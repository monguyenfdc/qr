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
 
    <form action="" method="POST">
        <div class="input-group">
            <input  class="form-control" type="text" name="doi" placeholder="Thêm đội" />
            <input type='hidden' name='form' value='1' />
            <div class="input-group-addon">
 <?php
//xử lý form 1
  if(isset($_POST["form"]) and $_POST["form"]==1){
      $doi=$_POST["doi"]; 
      if ($doi=='') echo "<span style='color: red;' title='Chưa điền thông tin' class='glyphicon glyphicon-remove' aria-hidden='true'></span>"; else{
      $sql=mysql_query("SELECT * FROM doi where doi='$doi' ");
      if(mysql_num_rows($sql)>0) echo "<span style='color: red;' title='Tên đội trùng lặp' class='glyphicon glyphicon-remove' aria-hidden='true'></span>"; else {
         $sql1=mysql_query("INSERT INTO doi(doi) value ('$doi')");
         if($sql1) echo "<span style='color: #80FF00;' title='Thêm thành công' class='glyphicon glyphicon-ok' aria-hidden='true'></span>"; else echo "<script language='javascript'>alert('Lổi')</script>";
      } 
 }}
 ?>
            </div>
            <span class="input-group-addon"><button type="submit">Add</button></span>
            
        </div>
    </form>

  <div style="width: 100%; height: 550px; overflow:auto; border: 2px solid #c5cdd8;">
    <table class="table table-striped"  id="exportTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>DOI</th>
            <th>SL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
  <?php 
  $query = "select * from doi ";$sql = mysql_query($query); 
  $sl=0;
  while($row = mysql_fetch_assoc($sql)){ $id = $row['id'];$doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM sheet1 WHERE doi = '$doi'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td><input class='form-control' type='button' name='number' id='number$id' onclick='load_ajax$id()' value='$doi'/> </td>
            <td>$row2</td>
            <td><a href='toolbox.php?del=$id'>Xóa</a></td>
              <script>
  function load_ajax$id(){
                $.ajax({
                    url : 'config.php',
                    type : 'post',
                    data : {
                         number : $('#number$id').val()
                    },
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
  </script>
        </tr>
        ";}
    ?>
	

    </tbody>
    </table>
</div>
 </div>
  <div class="col-sm-8" >

  <div id="result" >
   <div class='input-group'><span class='form-control'>DANH SÁCH CÔNG NHÂN TOÀN CÔNG TRƯỜNG</span>
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
<th>NOTE</th>
</tr>
 </thead>
 <tbody id="myTable">
 <?php
 $query3=mysql_query("SELECT * FROM sheet1 order by doi desc");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
    <td>{$row3['note']}</td>
   
    </tr>";
    }
   echo '</tbody></table>'; 
 ?>
 </div>
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