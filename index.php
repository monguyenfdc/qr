<?php
include ('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Check in</title>

<title>Checked</title>
	<meta name="description" content="fdcc">
	<meta name="author" content="mo nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
	<!-- CSS HERE -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body >

<center>
<header>
<div class="container">
<img src="img/logo.png" height="50px" width="120px" />
</div>
</header>
<div class="container">

<?php
if (isset($_COOKIE['keycheck'])){           
      if(isset($_GET["cmnd"])){
    //kiểm tra số cmnd
    $cmnd=$_GET["cmnd"];
   
    $query = "select * from sheet1 where cmnd = '$cmnd'";$sql = mysql_query($query); $row = mysql_fetch_assoc($sql); 
    if ($row>0){
    $ten =$row['ten'];
    $nam= $row['nam'];
    $doi=$row['doi'];
    $note=$row['note'];
    $ngay=$today;
    $project=$row['project'];
    $check=$_COOKIE['keycheck'];
    
    //kiểm tra đã kiểm hay chưa
    $query2 = "select * from congnhan where cmnd = '$cmnd'and ngay='$today'and keycheck='$check'";
    $sql2 = mysql_query($query2); $row2 = mysql_fetch_assoc($sql2);
    if ($row2>0) {echo "
    <h4><b style='color: red;'>Đã kiểm </b> </h4>
    <b> $project</b> - <b>Đội: $doi</b>
    <h4 > $ten - $nam </h4>
     <b style='color: red;'>$note</b><br/>"; 
 $jpg="avt/".$cmnd.".jpg"; $png="avt/".$cmnd.".png";
$ccnjpg="cc/ccn/".$cmnd.".jpg"; $ccnpng="cc/ccn/".$cmnd.".png";
$n3jpg="cc/n3/".$cmnd.".jpg"; $n3png="cc/n3/".$cmnd.".png";

 if (file_exists($jpg)or file_exists($png)){
 if (file_exists($jpg))  echo "<img class='img-thumbnail' src='$jpg'/><br/>";  
 if (file_exists($png))  echo "<img class='img-thumbnail' src='$png'/><br/>"; 
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
}    
    else{
    if ($project != $_COOKIE['keypj']) echo "<script language='javascript'>alert('Công nhân từ dự án $project !')</script>";
    $sql=mysql_query("
    INSERT INTO `congnhan`(`ten`, `nam`, `cmnd`, `doi`, `ngay`, `project`, `keycheck`) VALUES ('$ten','$nam','$cmnd','$doi','$ngay','$project','$check')");
      if($sql) {
        echo "
        <b> $project</b> - <b>Đội: $doi</b>
    <h3 > $ten - $nam </h3>
     <b style='color: red;'>$note</b><br/>"; 
 $jpg="avt/".$cmnd.".jpg"; $png="avt/".$cmnd.".png";
$ccnjpg="cc/ccn/".$cmnd.".jpg"; $ccnpng="cc/ccn/".$cmnd.".png";
$n3jpg="cc/n3/".$cmnd.".jpg"; $n3png="cc/n3/".$cmnd.".png";

 if (file_exists($jpg)or file_exists($png)){
 if (file_exists($jpg))  echo "<img class='img-thumbnail' src='$jpg'/><br/>";  
 if (file_exists($png))  echo "<img class='img-thumbnail' src='$png'/><br/>"; 
 }
 else echo "<img class='img-thumbnail' src='#' alt= 'Thiếu ảnh'/><br/>";
if (file_exists($ccnjpg)or file_exists($ccnpng)){
 if (file_exists($ccnjpg))  echo "<a href='$ccnjpg'class='btn btn-success'>CC NGHỀ >></a>";  
 if (file_exists($ccnpng))  echo "<a href='$ccnpng'class='btn btn-success'>CC NGHỀ >></a>";  
}
if (file_exists($n3jpg)or file_exists($n3png)){
 if (file_exists($n3jpg))  echo "<a href='$n3jpg'class='btn btn-success'>THẺ N3 >></a>";
 if (file_exists($n3png))  echo "<a href='$n3png'class='btn btn-success'>THẺ N3 >></a>";
}
      }else echo "lổi";
      }}else echo "<b style='color: red;'>Gian lận - Thu thẻ - Xử lý</b>";
 } 
      
    }else{
        echo '<!-- dang nhap-->
<form method="POST" action="">

Password:
    <input class="form-control" type="password" name="pass" required="required"/>
    <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Đăng nhập" />

</form></div>
 <!-- end dn -->';
        if(isset($_POST['submit'])){
 $sql1=mysql_query('SELECT * FROM user where keycheck="'.$_POST['pass'].'"');
            if(mysql_num_rows($sql1)>0){
                $row1 = mysql_fetch_assoc($sql1);
                setcookie("keycheck", $_POST['pass'], time() + 60*60*24*100);
                setcookie("keypj", $row1['project'], time() + 60*60*24*100);
                   
                echo'<script language="javascript">{window.location.reload(); }</script>'; 
                  
              
                             
            }else echo "<script language='javascript'>alert('Tên hoặc mật khẩu không đúng !')</script>";
        }
   }
   
?>   
<hr/>
NO PROBLEM - ONLY SOLUTION
<hr/>
</center>
</div>
</body>
</html>