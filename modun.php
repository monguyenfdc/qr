<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/ex1.js"></script>
    <script type="text/javascript" src="js/ex2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sendajax.js"></script>
     <script type="text/javascript" src="js/excel.js"></script>
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
 <tbody id="myTable">';
 
 $query3=mysql_query("SELECT * FROM sheet1 WHERE doi='$checkd' and project='{$_COOKIE['project']}'");
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
    
   echo '</tbody></table></div>'; 

}

if(isset($_POST['ccn'])){
    echo "
       <div class='input-group'><span class='form-control'>CÔNG NHÂN <b>CÓ CC NGHỀ</b></span>
 <span class='input-group-addon'><button id='exportButton2' >Xuất Excel</button></span></div>
    <input class='form-control' id='myInput' type='text' placeholder='Search..'>
  <div style='width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
    ";
    echo '
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
 <tbody id="myTable">';
    
 $files = array_filter(glob('cc/ccn/*'),'is_file');
foreach($files as $cm=>$value){
    $duoi='.'.strtolower(end(explode('.',$value)));
    $cmnd=  basename($value,$duoi);
    $query3=mysql_query("SELECT * FROM sheet1 WHERE cmnd=$cmnd");
    $row3 = mysql_fetch_assoc($query3);
    echo "<td><a href='$value' target='_blank'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a></td>
    <td>{$row3['ID']}</td>
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
}
if(isset($_POST['n3'])){
    echo "
       <div class='input-group'><span class='form-control'>CÔNG NHÂN <b>CÓ THẺ NHÓM 3</b></span>
 <span class='input-group-addon'><button id='exportButton2' >Xuất Excel</button></span></div>
    <input class='form-control' id='myInput' type='text' placeholder='Search..'>
  <div style='width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
    ";
    echo '
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
 <tbody id="myTable">';
    
 $files = array_filter(glob('cc/n3/*'),'is_file');
foreach($files as $cm=>$value){
    $duoi='.'.strtolower(end(explode('.',$value)));
    $cmnd=  basename($value,$duoi);
    $query3=mysql_query("SELECT * FROM sheet1 WHERE cmnd=$cmnd");
    $row3 = mysql_fetch_assoc($query3);
    echo "<td><a href='$value' target='_blank'><span class='glyphicon glyphicon-tag' aria-hidden='true'></span></a></td>
    <td>{$row3['ID']}</td>
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
}

?>
