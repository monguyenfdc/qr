<?php
include ('config.php');
if(isset($_REQUEST["chuyen"])){
     $sql1=mysql_query("UPDATE sheet1 SET project = '{$_COOKIE['project']}' WHERE ID='{$_REQUEST["chuyen"]}'");
if($sql1) { 

    echo "<script language='javascript'>alert('Chuyển về thành công !')</script>";
    echo "<script>setTimeout(function(){open(location, '_self').close();}, 3000); </script>";}
}

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
     <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     

</head>
<body>
 <img src="img/hsse.jpg" height="60px" width="150px" /><br />
<table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>
<th>PIC</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>NOTE</th>
<th>SAVE</th>
</tr>
 </thead>
 <tr>
<form action="" method="post" enctype="multipart/form-data">
<td><label  for="imgInp" class="btn btn-primary btn-file">  <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> </label><input type="file" name="file" id="imgInp" style="display: none;"/></td>
 <td><input class="form-control" type="text" required="required" name="ten" value="<?php echo "$ten";?>" /></td>
 <td><input class="form-control" type="text" required="required" name="nam" value="<?php echo "$nam";?>"/></td>
 <td><input class="form-control" type="text" required="required" name="cmnd" value="<?php echo "$cmnd";?>"/></td>
 <td> <?php  $sqld = mysql_query("SELECT `doi` FROM `{$_COOKIE['project']}`");?>         
  <select class="form-control" name="doi" >
           <option value='<?php echo "$doi";?>' >--<?php echo "$doi";?>--</option>
            <?php while($rowd = mysql_fetch_assoc($sqld)){ echo "<option value='{$rowd['doi']}' > {$rowd['doi']} </option>";}?>
            </select></td>
 <td><input class="form-control" type="text" name="note" value="<?php echo "$note";?>"/></td>
 
 <td><input type="submit"  value="Lưu" name="save" id="save" style="display: none;"/><label  for="save" class="btn btn-primary">  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> </label></td>
 
 
 </tr>
 <tr>
 <td><img id="blah" src="#" alt="" height="132px"  /></td>
  <td>
  <input  type="file" name="ccn" id="ccn" class="inputfile" style="display: none;"/>
  <label  for="ccn" class="btn btn-info btn-file" >  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> CC Nghề&hellip;</span></label>
  </td>
   <td><input type="file" name="n3" id="n3" class="inputfile" style="display: none;"/>
   <label  for="n3" class="btn btn-info btn-file" >  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true">Thẻ N3&hellip;</span> </label></td>

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
    </form>
 </tr>
 <tr>
 <?php
$jpg="avt/".$cmnd.".jpg"; $png="avt/".$cmnd.".png";
$ccnjpg="cc/ccn/".$cmnd.".jpg"; $ccnpng="cc/ccn/".$cmnd.".png";
$n3jpg="cc/n3/".$cmnd.".jpg"; $n3png="cc/n3/".$cmnd.".png";

 if (file_exists($jpg)or file_exists($png)){
    echo "<td>";
 if (file_exists($jpg))  echo "<img src='$jpg'height='132px'";  
 if (file_exists($png))  echo "<img src='$png'height='132px'"; 
 echo "</td>";}
 else echo "<td>empty ;(</td>
<div class='alert alert-warning alert-dismissible' role='alert'>
  <strong>Thiếu ảnh thẻ!</strong> Vui lòng bổ sung.
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
</div>

";
if (file_exists($ccnjpg)or file_exists($ccnpng)){
    echo "<td>";
 if (file_exists($ccnjpg))  echo "<img class='zom' src='$ccnjpg'height='132px'";  
 if (file_exists($ccnpng))  echo "<img class='zom' src='$ccnpng'height='132px'"; 
 echo "</td>"; 
}else echo "<td>empty ;(</td>";
if (file_exists($n3jpg)or file_exists($n3png)){
    echo "<td>";
 if (file_exists($n3jpg))  echo "<img class='zom' src='$n3jpg'height='132px'";  
 if (file_exists($n3png))  echo "<img class='zom' src='$n3png'height='132px'"; 
 echo "</td>"; 
}else echo "<td>empty ;(</td>";
  ?>
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
        <td>{$row1['project']} <a href=edit.php?chuyen=$idc>Chuển CT</a></td>
        </tr>";
 } else{//Ko trùng thì thêm vào csdl
     if (isset($_FILES['file']['name']) and $_FILES['file']['name'] != NULL) {
        if($_FILES['file']['type'] == "image/jpeg"
			|| $_FILES['file']['type'] == "image/png")
			{
			 $tmp_name = $_FILES['file']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['file']['name'])));
            $target_file= "avt/".$_FILES['file']['name'];
             move_uploaded_file($tmp_name,$target_file);
              list($width,$height) = getimagesize($target_file);
                 if($_FILES['file']['type'] == "image/jpeg")$newimage = imagecreatefromjpeg($target_file);else $newimage = imagecreatefrompng($target_file);
	               $newwith=$width*0.25;
                    $newhight=$height*0.25;	
                    $thumb=	"avt/".$_POST["cmnd"].".".$duoi;
                    $colo=imagecreatetruecolor($newwith,$newhight);
                    imagecopyresampled($colo,$newimage,0,0,0,0,$newwith,$newhight,$width,$height);
                    if($_FILES['file']['type'] == "image/jpeg")imagejpeg($colo,$thumb,100);else imagepng($colo,$thumb,8);
                    unlink ($target_file);
                    $cu1="avt/".$_POST["cmnd"].".jpg";$cu2="avt/".$_POST["cmnd"].".png";
                    if($_FILES['file']['type'] == "image/jpeg")unlink ($cu2);else unlink ($cu1);
			}
    }else $thumb='#';
    if (isset($_FILES['ccn']['name']) and $_FILES['ccn']['name'] != NULL) {
        if($_FILES['ccn']['type'] == "image/jpeg"
			|| $_FILES['ccn']['type'] == "image/png")
			{
			 $ccn = $_FILES['ccn']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['ccn']['name'])));
            $local1= "cc/ccn/".$_POST["cmnd"].".".$duoi;
             move_uploaded_file($ccn,$local1);
            $cn1="cc/ccn/".$_POST["cmnd"].".jpg";$cn2="cc/ccn/".$_POST["cmnd"].".png";
                    if($_FILES['ccn']['type'] == "image/jpeg")unlink ($cn2);else unlink ($cn1);  
			}
    }else $local1='#';
    if (isset($_FILES['n3']['name']) and $_FILES['n3']['name'] != NULL) {
        if($_FILES['n3']['type'] == "image/jpeg"
			|| $_FILES['n3']['type'] == "image/png")
			{
			 $n3 = $_FILES['n3']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['n3']['name'])));
            $local2= "cc/n3/".$_POST["cmnd"].".".$duoi;
             move_uploaded_file($n3,$local2);
              $c31="cc/n3/".$_POST["cmnd"].".jpg";$c32="cc/n3/".$_POST["cmnd"].".png";
                    if($_FILES['n3']['type'] == "image/jpeg")unlink ($c32);else unlink ($c31); 
			}
    }else $local2='#';
    $sql1=mysql_query("UPDATE sheet1 SET ten='{$_POST["ten"]}', nam='{$_POST["nam"]}', cmnd='{$_POST["cmnd"]}',doi='{$_POST["doi"]}', note= '{$_POST["note"]}', project = '{$_COOKIE['project']}' WHERE ID='$idc'");
if($sql1) { 
echo "
<tr>
    <td><img src='$thumb' alt='' height='132px'/></td>
    <td>{$_POST["ten"]}<br/><img src='$local1' alt='' height='120px'/></td>
    <td>{$_POST["nam"]}<br/><img src='$local2' alt='' height='120px'/></td>
    <td>{$_POST["cmnd"]}</td>
    <td>{$_POST["doi"]}</td>
    <td>{$_POST["note"]}</td>
    <td>Ok</td>
   
    </tr>";
    echo "<script>setTimeout(function(){open(location, '_self').close();}, 7000); </script>";}
 }
 }else{//Ko trùng thì thêm vào csdl
     if (isset($_FILES['file']['name']) and $_FILES['file']['name'] != NULL) {
        if($_FILES['file']['type'] == "image/jpeg"
			|| $_FILES['file']['type'] == "image/png")
			{
			 $tmp_name = $_FILES['file']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['file']['name'])));
            $target_file= "avt/".$_FILES['file']['name'];
             move_uploaded_file($tmp_name,$target_file);
              list($width,$height) = getimagesize($target_file);
                 if($_FILES['file']['type'] == "image/jpeg")$newimage = imagecreatefromjpeg($target_file);else $newimage = imagecreatefrompng($target_file);
	               $newwith=$width*0.25;
                    $newhight=$height*0.25;	
                    $thumb=	"avt/".$_POST["cmnd"].".".$duoi;
                    $colo=imagecreatetruecolor($newwith,$newhight);
                    imagecopyresampled($colo,$newimage,0,0,0,0,$newwith,$newhight,$width,$height);
                    if($_FILES['file']['type'] == "image/jpeg")imagejpeg($colo,$thumb,100);else imagepng($colo,$thumb,8);
                    unlink ($target_file);
                     $cu1="avt/".$_POST["cmnd"].".jpg";$cu2="avt/".$_POST["cmnd"].".png";
                    if($_FILES['file']['type'] == "image/jpeg")unlink ($cu2);else unlink ($cu1);
			}
    }else $thumb='#';
    if (isset($_FILES['ccn']['name']) and $_FILES['ccn']['name'] != NULL) {
        if($_FILES['ccn']['type'] == "image/jpeg"
			|| $_FILES['ccn']['type'] == "image/png")
			{
			 $ccn = $_FILES['ccn']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['ccn']['name'])));
            $local1= "cc/ccn/".$_POST["cmnd"].".".$duoi;
             move_uploaded_file($ccn,$local1);
              $cn1="cc/ccn/".$_POST["cmnd"].".jpg";$cn2="cc/ccn/".$_POST["cmnd"].".png";
                    if($_FILES['ccn']['type'] == "image/jpeg")unlink ($cn2);else unlink ($cn1); 
			}
    }else $local1='#';
    if (isset($_FILES['n3']['name']) and $_FILES['n3']['name'] != NULL) {
        if($_FILES['n3']['type'] == "image/jpeg"
			|| $_FILES['n3']['type'] == "image/png")
			{
			 $n3 = $_FILES['n3']['tmp_name'];
             $duoi=strtolower(end(explode('.',$_FILES['n3']['name'])));
            $local2= "cc/n3/".$_POST["cmnd"].".".$duoi;
             move_uploaded_file($n3,$local2);
             $c31="cc/n3/".$_POST["cmnd"].".jpg";$c32="cc/n3/".$_POST["cmnd"].".png";
                    if($_FILES['n3']['type'] == "image/jpeg")unlink ($c32);else unlink ($c31);  
			}
    }else $local2='#';
    $sql1=mysql_query("UPDATE sheet1 SET ten='{$_POST["ten"]}', nam='{$_POST["nam"]}', cmnd='{$_POST["cmnd"]}',doi='{$_POST["doi"]}', note= '{$_POST["note"]}', project = '{$_COOKIE['project']}' WHERE ID='$idc'");
if($sql1) { 
echo "
<tr>
    <td><img src='$thumb' alt='' height='132px'/></td>
    <td>{$_POST["ten"]}<br/><img src='$local1' alt='' height='120px'/></td>
    <td>{$_POST["nam"]}<br/><img src='$local2' alt='' height='120px'/></td>
    <td>{$_POST["cmnd"]}</td>
    <td>{$_POST["doi"]}</td>
    <td>{$_POST["note"]}</td>
    <td>Ok</td>
   
    </tr>";
    echo "<script>setTimeout(function(){open(location, '_self').close();}, 7000); </script>";
}
}
}

 ?>
 
 
    </table>
</body>
<script>;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));</script>