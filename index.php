<?php
include ('config.php');
?>

<body >
<header>
<center>
<?php
if (isset($_COOKIE['username'])){           
      if(isset($_REQUEST["cmnd"])){
    
    $cmnd=$_REQUEST["cmnd"];
    $query = "select * from sheet1 where cmnd = '$cmnd'";$sql = mysql_query($query); $row = mysql_fetch_assoc($sql); 
    if ($row>0){
    $ten =$row['ten'];
    $nam= $row['nam'];
    $doi=$row['doi'];
    $note=$row['note'];
    $ngay=$today;
    $query2 = "select * from congnhan where cmnd = '$cmnd'and ngay='$today'";$sql2 = mysql_query($query2); $row2 = mysql_fetch_assoc($sql2);
    if ($row2>0) echo "Đã kiểm <br/> $ten - $doi - $note"; else{
    $sql=mysql_query("INSERT INTO congnhan value('','".$ten."','".$nam."','".$cmnd."','".$doi."','".$ngay."')");
      if($sql) {
        echo "$ten - $doi - $note";
      }
      }}else echo 'Thu thẻ - Xử lý';
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

            if($_POST['pass']='fdc@tocdo'){
                setcookie("username", $_POST['pass'], time() + 3600);
                   
                echo'<script language="javascript">{window.location.reload(); }</script>'; 
                  
              
                             
            }else echo "<script language='javascript'>alert('Tên hoặc mật khẩu không đúng !')</script>";
        }
   }
   
?>          
</center>