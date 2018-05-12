<?php
include ('config.php');
include ('conten.php');
if(isset($_GET['delcn'])){
    $id=$_GET['delcn'];
    $query ="DELETE FROM sheet1 WHERE id=$id";			
	 mysql_query($query);
    }
?>


  <div class="container">
  <div class="row"> 
  
<div class="col-sm-4" >
 

<span class='form-control'>ĐTC/NTP TOÀN CÔNG TRƯỜNG</span>
  <div style="width: 100%; height: 550px; overflow:auto; border: 2px solid #c5cdd8;">
    <table class="table table-striped"  id="exportTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>DOI</th>
            <th>SL</th>
            
        </tr>
    </thead>
    <tbody>
  <?php 
  $query = "select * from `{$_COOKIE['project']}`";$sql = mysql_query($query); 
  $sl=0;
  while($row = mysql_fetch_assoc($sql)){ $id = $row['id'];$doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM sheet1 WHERE doi = '$doi' and project='{$_COOKIE['project']}'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td><input class='form-control' type='button' name='number' id='number$id' onclick='load_ajax$id()' value='$doi'/> </td>
            <td>$row2</td>
            
              <script>
                    function load_ajax$id(){
                    $.ajax({
                    url : 'modun.php',
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
<th>ACTION</th>
</tr>
 </thead>
 <tbody id="myTable">
 <?php
 $query3=mysql_query("SELECT * FROM sheet1 WHERE project='{$_COOKIE['project']}' order by doi desc");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
    <td>{$row3['note']}</td>
    <td><a href='toolbox.php?delcn={$row3['ID']}' onclick='return confirmAction()'><span title='Xóa' class='glyphicon glyphicon-remove' aria-hidden='true'></span> </a>--
    <script>function open_a_win{$row3['ID']}() { window.open('edit.php?idedit={$row3['ID']}','Edit',300,300); return false; }</script> 
    <a onclick='return open_a_win{$row3['ID']}();'><span title='Edit' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
    </td>
   
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