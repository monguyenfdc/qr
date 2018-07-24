<?php
include ('config.php');
include ('conten.php');
ob_start();
?>


 <div class="row">
           
    <br/>
    <div class="col-md-6">
    <span  class="input-group-addon">Thêm đội mới</span>  
        <form action="" method="POST">
        <div class="input-group">
            <input  class="form-control" type="text" name="doi" required="required" placeholder="Nhập đội mới" />
            <div class="input-group-addon">
 <?php
//xử lý form 1
  if(isset($_POST["add"])){
      $doi=$_POST["doi"]; 
      if ($doi=='') echo "<span style='color: red;' title='Chưa điền thông tin' class='glyphicon glyphicon-remove' aria-hidden='true'></span>"; else{
      $sql=mysql_query("SELECT * FROM `{$_COOKIE['project']}` where doi='$doi' ");
      if(mysql_num_rows($sql)>0) echo "<script language='javascript'>alert('Tên đội trùng lặp')</script><span style='color: red;' title='Tên đội trùng lặp' class='glyphicon glyphicon-remove' aria-hidden='true'></span>"; else {
         $sql1=mysql_query("INSERT INTO `{$_COOKIE['project']}`(doi) value ('$doi')");
         if($sql1) echo "<span style='color: #80FF00;' title='Thêm thành công' class='glyphicon glyphicon-ok' aria-hidden='true'></span>"; else echo "<script language='javascript'>alert('Lổi')</script>";
      } 
 }}
 ?>
            </div>
            <span class="input-group-addon"><input type="submit" name="add" value="Thêm đội" /></span>
            
        </div>
        </form>
    <span  class="input-group-addon">Tra cứu công nhân</span>    
    <form action="" method="POST">
    
              <div class="input-group">
                  
                  <input type="text" class="form-control" name="key" required="required" placeholder="Nhập CMND cần tìm">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                  <span  class="input-group-addon"><input type="submit" value="Seach" name="seach"/> </span>
              </div>
             
    </form>
    </div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Cập nhật từ file CSV/TEXT</legend>
                                        <div class="input-group">
                                        <input  class="form-control" type="file"  name="file" id="file" />
                                        <div class="input-group-addon"><button type="submit" id="submit" name="Import">Upload</button></div>
                                        </div>
                        </fieldset>
                    </form>
                </div>
                
 </div>
 
  <div style='width: 100%; height: 450px; overflow:auto;border: 1px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>
<th>AVT</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>NOTE</th>
<th>STATUS</th>
</tr>
 </thead>
 <tr>
 <form action="" method="post" enctype="multipart/form-data">
 
 <td ><label  for="imgInp" class="btn btn-primary btn-file">  <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> </label></td>
 <td><input type="file" name="file" id="imgInp" style="display: none;"/><input class="form-control" type="text" required="required" name="ten" placeholder="Tên"/></td>
 <td><input class="form-control" type="text" required="required" name="nam" placeholder="Năm sinh"/></td>
 <td><input class="form-control" type="text" required="required" name="cmnd" placeholder="Số CMND"/></td>
 <td> <?php  $sqld = mysql_query("SELECT `doi` FROM `{$_COOKIE['project']}`");?>         
  <select class="form-control" name="doi" title="Vào mục ĐTC/NTP rồi trở lại nếu danh sách đội ko hiển thị">
            <?php if (empty($_COOKIE['sldoi'])) echo "<option value='' >--Chọn đội--</option>";else echo"<option value='{$_COOKIE['sldoi']}' >--{$_COOKIE['sldoi']}--</option>";?>
            <?php while($rowd = mysql_fetch_assoc($sqld)){ echo "<option value='{$rowd['doi']}' > {$rowd['doi']} </option>";}?>
            </select></td>
 <td><input class="form-control" type="text" name="note" placeholder="Ghi chú"/></td>
 <td><input class="btn btn-primary btn-file" type="submit"  value="Thêm CN" name="addcn"/></td>
 
 </form>
 </tr>

 
  <?php
if(isset($_POST["seach"])){
$sql1= mysql_query("SELECT * FROM sheet1 where cmnd='{$_POST["key"]}'");
if(mysql_num_rows($sql1)>0){ 
    $row1 = mysql_fetch_assoc($sql1);$cmnd=$row1['cmnd'];
        echo "<tr>
        <td>{$row1['ID']}</td>
        <td>{$row1['ten']}</td>
        <td>{$row1['nam']}</td>
        <td>{$row1['cmnd']}</td>
        <td>{$row1['doi']}</td>
        <td>{$row1['note']}</td>
        <td>{$row1['project']}
        <script>function open_a_win{$row1['ID']}() { window.open('edit.php?idedit={$row1['ID']}','Edit','width=1020,height=450'); return false; }</script> 
        <a onclick='return open_a_win{$row1['ID']}();'><span title='Edit' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
        </td>
        
        </tr>";
 $jpg="avt/".$cmnd.".jpg"; $png="avt/".$cmnd.".png";
$ccnjpg="cc/ccn/".$cmnd.".jpg"; $ccnpng="cc/ccn/".$cmnd.".png";
$n3jpg="cc/n3/".$cmnd.".jpg"; $n3png="cc/n3/".$cmnd.".png";
echo '<tr>';
 if (file_exists($jpg)or file_exists($png)){
 if (file_exists($jpg))  echo "<img  src='$jpg' height='132px'/><br/>";  
 if (file_exists($png))  echo "<img  src='$png' height='132px'/><br/>"; 
 }
 else echo "<img class='img-thumbnail' src='#' alt= 'Thiếu ảnh'/><br/>";
if (file_exists($ccnjpg)or file_exists($ccnpng)){
 if (file_exists($ccnjpg))  echo "<a href='$ccnjpg' class='btn btn-success'>CC NGHỀ >></a>";  
 if (file_exists($ccnpng))  echo "<a href='$ccnpng' class='btn btn-success'>CC NGHỀ >></a>";  
}
if (file_exists($n3jpg)or file_exists($n3png)){
 if (file_exists($n3jpg))  echo "<a href='$n3jpg'class='btn btn-success'>THẺ N3 >></a>";
 if (file_exists($n3png))  echo "<a href='$n3png'class='btn btn-success'>THẺ N3 >></a>";
}
echo '</tr>';
}   else echo "<script>alert('CSDL trống !')</script>";
}

//thêm cn bằng file
if(isset($_POST["Import"])){
if($_FILES["file"]["size"] > 0)

{
 $filename= $_FILES['file']['tmp_name'];
$file = fopen($filename, "r");
$t=0;
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{
if ($t>0 and isset($emapData[3])){
    //Bỏ dồng tiêu đề và Kiểm tra số CMND
  $sql1=mysql_query('SELECT * FROM sheet1 where cmnd="'.$emapData[3].'"');
    if(mysql_num_rows($sql1)>0){
     //Nếu trùng cmnd thì thông báo và hiện thông tin   
        $row1 = mysql_fetch_assoc($sql1);
        echo "<script language='javascript'>alert('Số chứng minh $emapData[1] có sẵn trong CSDL {$row1['project']} !')</script>";
        echo "<tr>
        <td>{$row1['ID']}</td>
        <td>{$row1['ten']}</td>
        <td>{$row1['nam']}</td>
        <td>{$row1['cmnd']}</td>
        <td>{$row1['doi']}</td>
        <td>{$row1['note']}</td>
        <td>{$row1['project']}
        <script>function open_a_win{$row1['ID']}() { window.open('edit.php?idedit={$row1['ID']}','Edit','width=1020,height=450'); return false; }</script> 
        <a onclick='return open_a_win{$row1['ID']}();'><span title='Edit' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
        </td>
        </tr>";
 } else{  
    //Nếu cmnd chưa có thì thêm vào csdl
 $sql1=mysql_query("INSERT INTO `sheet1`(`ten`, `nam`, `cmnd`, `doi`, `note`,`project`) VALUES ('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','{$_COOKIE['project']}')");

if($sql1) {
echo "
<tr><td>$emapData[0]</td>
    <td>$emapData[1]</td>
    <td>$emapData[2]</td>
    <td>$emapData[3]</td>
    <td>$emapData[4]</td>
    <td>$emapData[5]</td>
   <td>Ok</td>
    </tr>";
}
else echo "loi";}}
$t=$t+1;
}
fclose($file);

  
}
}
//Thêm cn từ form thủ công
if(isset($_POST["addcn"])){ 
 if  ($_POST["doi"]=='') echo "<script language='javascript'>alert('Bạn chưa chọn đội !')</script>";
 else{
    //Kiểm tra số cmnd
    $sql1=mysql_query('SELECT * FROM sheet1 where cmnd="'.$_POST['cmnd'].'"');
    if(mysql_num_rows($sql1)>0){ //nếu trùng thì thông báo
        
        $row1 = mysql_fetch_assoc($sql1);
        echo "<script language='javascript'>alert('Số chứng minh có sẵn trong CSDL {$row1['project']} !')</script>";
        echo "<tr>
        <td>{$row1['ID']}</td>
        <td>{$row1['ten']}</td>
        <td>{$row1['nam']}</td>
        <td>{$row1['cmnd']}</td>
        <td>{$row1['doi']}</td>
        <td>{$row1['note']}</td>
        <td>{$row1['project']}
        <script>function open_a_win{$row1['ID']}() { window.open('edit.php?idedit={$row1['ID']}','Edit','width=1020,height=450'); return false; }</script> 
        <a onclick='return open_a_win{$row1['ID']}();'><span title='Edit' class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
        </td>
        </tr>";
 } else{//Ko trùng thì thêm vào csdl
 //thêm ảnh
     if (isset($_FILES['file']['name']) and $_FILES['file']['name'] != NULL) {
        if($_FILES['file']['type'] == "image/jpeg"
			|| $_FILES['file']['type'] == "image/png")
			{
			 $tmp_name = $_FILES['file']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['file']['name'])));
            $target_file= "avt/".$_POST["cmnd"].".".$duoi;
             move_uploaded_file($tmp_name,$target_file);
              $thumb= $target_file;
                     $cu1="avt/".$_POST["cmnd"].".jpg";$cu2="avt/".$_POST["cmnd"].".png";
                    if($_FILES['file']['type'] == "image/jpeg")
                    {if (file_exists($cu2))unlink ($cu2);}else {if (file_exists($cu1))unlink ($cu1);}
			}
    }else $thumb='#';
    //thêm vào csdl
    $sql1=mysql_query("INSERT INTO `sheet1`(`ten`, `nam`, `cmnd`, `doi`, `note`,`project`) VALUES ('{$_POST["ten"]}','{$_POST["nam"]}','{$_POST["cmnd"]}','{$_POST["doi"]}','{$_POST["note"]}','{$_COOKIE['project']}')");
if($sql1) { 
echo "
<tr><td><img src='$thumb' alt='' height='132px'/></td>
    <td>{$_POST["ten"]}</td>
    <td>{$_POST["nam"]}</td>
    <td>{$_POST["cmnd"]}</td>
    <td>{$_POST["doi"]}</td>
    <td>{$_POST["note"]}</td>
    <td>Ok</td>
   
    </tr>";
    setcookie("sldoi",$_POST["doi"], time() + 3600);
}
else echo "<tr><td>Xãy ra lỗi</td></tr>";}
 }
  
    
}
?> 

</table>
 <img id="blah" src="#" alt="" height="132px"  />
    <script type="text/javascript">
        function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
    </script>
</div>
  <br />
  
 </body>
 </html>
<?php
    ob_end_flush(); // Flush the output from the buffer
?>