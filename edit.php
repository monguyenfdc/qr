<?php
include ('config.php');

if(isset($_REQUEST["idedit"])){
    $idc =$_REQUEST["idedit"];
    $query = "select * from sheet1 where ID = '$idc'";
    $sql = mysql_query($query);
    $row = mysql_fetch_assoc($sql);
     $ten= $row['ten'];  $nam= $row['nam'];  $cmnd= $row['cmnd'];  $doi= $row['doi'];  $note= $row['note'];
 }
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Edit</title>

<title>login</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>NOTE</th>
<th>Lưu</th>
</tr>
 </thead>
 <tr>
<form action="" method="post">
 <td><input class="form-control" type="text" required="required" name="ten" value="<?php echo "$ten";?>" /></td>
 <td><input class="form-control" type="text" required="required" name="nam" value="<?php echo "$nam";?>"/></td>
 <td><input class="form-control" type="text" required="required" name="cmnd" value="<?php echo "$cmnd";?>"/></td>
 <td> <?php  $sqld = mysql_query("select * from `{$_COOKIE['project']}`");?>         
  <select class="form-control" name="doi" >
           <option value='<?php echo "$doi";?>' >--<?php echo "$doi";?>--</option>
            <?php while($rowd = mysql_fetch_assoc($sqld)){ echo "<option value='{$rowd['doi']}' > {$rowd['doi']} </option>";}?>
            </select></td>
 <td><input class="form-control" type="text" name="note" value="<?php echo "$note";?>"/></td>
 <td><input class="form-control" type="submit"  value="Lưu" name="save"/></td>
 
 </form>
 </tr>
 <?php
 if(isset($_POST["save"])){
     $cmnd2= $_POST['cmnd'];
    //Kiểm tra số cmnd
    if ($cmnd2 != $cmnd){
    $sql1=mysql_query('SELECT * FROM sheet1 where cmnd="'.$_POST['cmnd'].'"');
    if(mysql_num_rows($sql1)>0){ //nếu trùng thì thông báo
        
        $row1 = mysql_fetch_assoc($sql1);
        echo "<script language='javascript'>alert('Số chứng minh có sẵn trong CSDL {$row1['project']} !')</script>";
        echo "
        
        <td>{$row1['ten']}</td>
        <td>{$row1['nam']}</td>
        <td>{$row1['cmnd']}</td>
        <td>{$row1['doi']}</td>
        <td>{$row1['note']}</td>
        <td>{$row1['project']}</td>
        </tr>";
 } 
 }else{//Ko trùng thì thêm vào csdl
    $sql1=mysql_query("UPDATE sheet1 SET ten='{$_POST["ten"]}', nam='{$_POST["nam"]}', cmnd='{$_POST["cmnd"]}',doi='{$_POST["doi"]}', note= '{$_POST["note"]}' WHERE ID='$idc'");
if($sql1) { 
echo "
<tr>
    <td>{$_POST["ten"]}</td>
    <td>{$_POST["nam"]}</td>
    <td>{$_POST["cmnd"]}</td>
    <td>{$_POST["doi"]}</td>
    <td>{$_POST["note"]}</td>
    <td>Ok</td>
   
    </tr>";
    echo "<script>setTimeout(function(){open(location, '_self').close();}, 3000); </script>";
}
else echo "<tr><td>Xãy ra lỗi</td></tr>";}
 }
 ?>
</body>