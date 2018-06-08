<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload nhiều ảnh xem trước và thanh tiến trình</title>

</head>
<body>
<center>

		<h2>Upload monguyen</h2>
		<form action="" method="POST" enctype="multipart/form-data">
		<select name="foder">
        <option value="0">---</option>
        <option value="img">img</option>
        <option value="js">js</option>
        <option value="css">css</option>
        </select>	
			<input type="file" name="file" />
		<input type="submit" value="save" name="ok" />
		</form>
<?php
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
  
    if ($_FILES['file']['name'] != NULL )
    { // Đã chọn file
     $foder=$_POST['foder'];
     $tmp_name = $_FILES['file']['tmp_name'];
           // Tiến hành code upload file
     if ($foder=='0') {$target_file = "{$_FILES["file"]["name"]}"; } else {$target_file = "$foder/".$_FILES["file"]["name"];}
     
    move_uploaded_file($tmp_name,$target_file); 
    if (file_exists($target_file))   echo "<script>alert('save thành công!')</script>"; else  echo "<script>alert('save thất bại!')</script>";          
}   }          
?>

</body>
</html>