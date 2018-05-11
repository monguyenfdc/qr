<?php
include ('config.php');
 // Xử lý ajax toolbox.php
if(isset($_POST['number'])){
    $checkd=$_POST['number'];
    echo "
       <div class='input-group'><span class='form-control'>DANH SÁCH CÔNG NHÂN <b>ĐỘI $checkd</b></span>
 <span class='input-group-addon'><button id='exportButton2' >Xuất Excel</button></span></div>
    <input class='form-control' id='myInput' type='text' placeholder='Search..'>
  <div style='width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
    ";
    echo '
 <thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>NOTE</th>
<th>ACTION</th>
</tr>
 </thead>
 <tbody id="myTable">';
 
 $query3=mysql_query("SELECT * FROM sheet1 WHERE doi='$checkd' and project='{$_COOKIE['project']}'");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['note']}</td>
   <td><a href='toolbox.php?delcn={$row3['ID']}' onclick='return confirmAction()'><span title='Xóa' class='glyphicon glyphicon-remove' aria-hidden='true'></span> </a>--
    <script>function open_a_win{$row3['ID']}() { window.open('edit.php?idedit={$row3['ID']}','Edit',200,900); return false; }</script> 
    <a onclick='return open_a_win{$row3['ID']}();'><span title='Edit' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
    </td>
    </tr>";
    }
   echo '</tbody></table></div>'; 

}

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query ="DELETE FROM doi WHERE id=$id";			
	 mysql_query($query);
    }
?>
