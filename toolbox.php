<?php
include ('config.php');
include ('conten.php');
if(isset($_GET['delcn'])){
    $id=$_GET['delcn'];
    $query ="DELETE FROM sheet1 WHERE id=$id";			
	 mysql_query($query);
    }
mysql_query("DELETE FROM `{$_COOKIE['project']}`");
mysql_query("INSERT INTO `{$_COOKIE['project']}` (doi)
SELECT DISTINCT doi
FROM sheet1 WHERE project ='{$_COOKIE['project']}'");
?>

 <script>
                    function load_ccn(){
                    $.ajax({
                    url : 'modun.php',
                    type : 'post',
                    data : {
                         ccn : $('#ccn').val()
                    },
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
            </script>
            <script>
                    function load_n3(){
                    $.ajax({
                    url : 'modun.php',
                    type : 'post',
                    data : {
                         n3 : $('#n3').val()
                    },
                    success : function (result){
                        $('#result').html(result);
                    }
                });
            }
            </script>

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
   <div class='input-group'><span class='form-control'>CÔNG NHÂN TOÀN CÔNG TRƯỜNG</span>
 <span class="input-group-addon"><button id="exportButton2" >Xuất Excel</button></span></div>
    <div class='input-group'>
    <span class="input-group-addon"><label  for="ccn"> <a> <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> CC Nghề </a></label><input type="button" name="ccn" id="ccn" onclick="load_ccn()" value="ccn" style="display: none;"/></a></span>
    <span class="input-group-addon"><label  for="n3"> <a> <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Thẻ Nhóm 3 </a></label><input type="button" name="ccn" id="n3" onclick="load_n3()" value="n3" style="display: none;"/></a></span>
    <input class="form-control" id="myInput" type="text" placeholder="Search.."/>
    </div>
    <div style="width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;">
   <table class="table table-bordered" id="exportTable2">
 <thead>
<tr>
<th>STT</th>
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
 
 while($row3 = mysql_fetch_assoc($query3)){
$cmnd=$row3['cmnd'];
$jpg="avt/".$cmnd.".jpg"; $png="avt/".$cmnd.".png";
$ccnjpg="cc/ccn/".$cmnd.".jpg"; $ccnpng="cc/ccn/".$cmnd.".png";
$n3jpg="cc/n3/".$cmnd.".jpg"; $n3png="cc/n3/".$cmnd.".png";
echo "<tr><td>";
 if (file_exists($jpg)or file_exists($png)){
    
 if (file_exists($jpg))  echo "<a href='$jpg' target='_blank'><span class='glyphicon glyphicon-user' aria-hidden='true'></span></a>";  
 if (file_exists($png))  echo "<a href='$png' target='_blank'><span class='glyphicon glyphicon-user' aria-hidden='true'></span></a>"; 
}
 else echo "<span class='glyphicon glyphicon-user text-danger' aria-hidden='true'></span>";
if (file_exists($ccnjpg)or file_exists($ccnpng)){
 if (file_exists($ccnjpg))  echo "<a href='$ccnjpg' target='_blank'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a>";  
 if (file_exists($ccnpng))  echo "<a href='$ccnpng' target='_blank'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a>";  
 
}else echo "<span class='glyphicon glyphicon-list-alt text-danger' aria-hidden='true'>";
if (file_exists($n3jpg)or file_exists($n3png)){
    
 if (file_exists($n3jpg))  echo "<a href='$n3jpg' target='_blank'><span class='glyphicon glyphicon-tag' aria-hidden='true'></span></a>"; 
 if (file_exists($n3png))  echo "<a href='$n3png' target='_blank'><span class='glyphicon glyphicon-tag' aria-hidden='true'></span></a>"; 
 
}else echo "<span class='glyphicon glyphicon-tag text-danger' aria-hidden='true'></span>";  
echo "</td>";  
    echo "<td>{$row3['ID']}</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
    <td>{$row3['note']}</td>
    <td><a href='toolbox.php?delcn={$row3['ID']}' onclick='return confirmAction()'><span title='Xóa' class='glyphicon glyphicon-remove text-danger' aria-hidden='true'></span> </a>--
    <script>function open_a_win{$row3['ID']}() { window.open('edit.php?idedit={$row3['ID']}','Edit','width=1020,height=450'); return false; }</script> 
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

  <br />
  
 </body>
 </html>