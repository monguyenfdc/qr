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
<style type="text/css">.ritz .waffle a { color: inherit; }.ritz .waffle .s10{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Inconsolata',Arial;font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:0;}.ritz .waffle .s0{border-bottom:1px SOLID #000000;background-color:#ffffff;}.ritz .waffle .s4{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s1{border-right:1px SOLID #000000;background-color:#ffffff;}.ritz .waffle .s8{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:8pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s2{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;color:#000000;font-family:'Arial';font-size:10pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:0;}.ritz .waffle .s5{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:10pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s3{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:12pt;vertical-align:bottom;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s7{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Times New Roman';font-size:12pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s9{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s6{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}</style>
</head>
<body onload="window.print()">
<center>
<?php
$project=strtoupper($_COOKIE['project']);
if(isset($_POST["in1"])){ $doi= $_POST['doi'];
$query3=mysql_query("SELECT * FROM `sheet1` WHERE `doi`= '$doi' and `project`='{$_COOKIE['project']}'");
 while($row3 = mysql_fetch_assoc($query3)){ 
 $jpg="avt/".$row3['cmnd'].".jpg"; $png="avt/".$row3['cmnd'].".png";
 if (file_exists($jpg)or file_exists($png)){
 if (file_exists($jpg))  $img=$jpg;  
 if (file_exists($png))  $img=$png; }
    echo "
<div class='ritz grid-container' dir='ltr'  id='Content_ID'>
<table class='waffle' cellspacing='0' cellpadding='0'>
<tbody>
<tr style='height:1px;'>
<td></td><td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
</tr>
<tr style='height:20px;'>

<td class='s1'></td>
<td class='s2'>
<div style='width:100px;height:20px'>
<img src='img/logo.png' width='90px' height='30px' />
</div>
</td>
<td class='s3' colspan='4'> FDC - $project<br>THẺ RA VÀO CÔNG TRƯỜNG</td>
<td class='s4' dir='ltr' rowspan='6'></td>
<td class='s4' dir='ltr' colspan='2'>NỘI QUY CÔNG TRÌNH</td>
</tr>
<tr style='height:33px;'>

<td class='s1'></td>
<td class='s5' dir='ltr'>{$row3['ID']}</td>
<td class='s6' dir='ltr' colspan='2'>Họ &amp;Tên:</td>
<td class='s4' dir='ltr' colspan='2'>{$row3['ten']}</td>
<td class='s7' dir='ltr' colspan='2' rowspan='5'>
1. Chấp hành nghiêm chỉnh nội quy công trường;<br>
2. Thẻ có giá trị trong công trường FDC;<br>
<span style='font-weight:bold;'>3. Không cho người khác mượn thẻ dưới mọi hình thức<br>vi phạm phạt 10.000.000đ</span><br>
4. Xuất trình thẻ khi vào cổng;<br>5. Giữ và trình thẻ khi chuyển công trình trong FDC;<br>6. Mất thẻ phạt 20.000đ</td>
</tr>
<tr style='height:29px;'>


<td class='s1'></td>
<td class='s8' dir='ltr' rowspan='4'><img src='$img' height='130px' width='100px'/></td>
<td class='s6' dir='ltr' colspan='2'>ĐTC/NTP</td>
<td class='s4' dir='ltr' colspan='2'>{$row3['doi']}</td>
</tr>
<tr style='height:36px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>Ngày cấp:</td>
<td class='s9' dir='ltr'>$today</td>
<td class='s10' rowspan='3'><div style='width:107px;height:102px'>
<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://work.fdcc.com.vn:8081/index.php?cmnd={$row3['cmnd']}' height='102px' width='102px'/>
</div></td>
</tr>
<tr style='height:35px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>Năm sinh:</td>
<td class='s9' dir='ltr'>[-----{$row3['nam']}-----]</td>
</tr>
<tr style='height:29px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>CMND:</td>
<td class='s9' dir='ltr'>{$row3['cmnd']}</td>
</tr>
</tbody>
</table>
</div>
<br/>
 ";
 }
}

if(isset($_GET["idpr"])){ 
$query3=mysql_query("SELECT * FROM `sheet1` WHERE `ID`= '{$_GET["idpr"]}'");
$row3 = mysql_fetch_assoc($query3) ;
 $jpg="avt/".$row3['cmnd'].".jpg"; $png="avt/".$row3['cmnd'].".png";
 if (file_exists($jpg)or file_exists($png)){
 if (file_exists($jpg))  $img=$jpg;  
 if (file_exists($png))  $img=$png; }
    echo "
<div class='ritz grid-container' dir='ltr'  id='Content_ID'>
<table class='waffle' cellspacing='0' cellpadding='0'>
<tbody>
<tr style='height:1px;'>
<td></td><td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
<td class='s0'></td>
</tr>
<tr style='height:20px;'>

<td class='s1'></td>
<td class='s2'>
<div style='width:100px;height:20px'>
<img src='img/logo.png' width='90px' height='30px' />
</div>
</td>
<td class='s3' colspan='4'> FDC - $project<br>THẺ RA VÀO CÔNG TRƯỜNG</td>
<td class='s4' dir='ltr' rowspan='6'></td>
<td class='s4' dir='ltr' colspan='2'>NỘI QUY CÔNG TRÌNH</td>
</tr>
<tr style='height:33px;'>

<td class='s1'></td>
<td class='s5' dir='ltr'>{$row3['ID']}</td>
<td class='s6' dir='ltr' colspan='2'>Họ &amp;Tên:</td>
<td class='s4' dir='ltr' colspan='2'>{$row3['ten']}</td>
<td class='s7' dir='ltr' colspan='2' rowspan='5'>
1. Chấp hành nghiêm chỉnh nội quy công trường;<br>
2. Thẻ có giá trị trong công trường FDC;<br>
<span style='font-weight:bold;'>3. Không cho người khác mượn thẻ dưới mọi hình thức<br>vi phạm phạt 10.000.000đ</span><br>
4. Xuất trình thẻ khi vào cổng;<br>5. Giữ và trình thẻ khi chuyển công trình trong FDC;<br>6. Mất thẻ phạt 20.000đ</td>
</tr>
<tr style='height:29px;'>


<td class='s1'></td>
<td class='s8' dir='ltr' rowspan='4'><img src='$img' height='130px' width='100px'/></td>
<td class='s6' dir='ltr' colspan='2'>ĐTC/NTP</td>
<td class='s4' dir='ltr' colspan='2'>{$row3['doi']}</td>
</tr>
<tr style='height:36px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>Ngày cấp:</td>
<td class='s9' dir='ltr'>$today</td>
<td class='s10' rowspan='3'><div style='width:107px;height:102px'>
<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://work.fdcc.com.vn:8081/index.php?cmnd={$row3['cmnd']}' height='102px' width='102px'/>
</div></td>
</tr>
<tr style='height:35px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>Năm sinh:</td>
<td class='s9' dir='ltr'>{$row3['nam']}</td>
</tr>
<tr style='height:29px;'>


<td class='s1'></td>
<td class='s6' colspan='2'>CMND:</td>
<td class='s9' dir='ltr'>{$row3['cmnd']}</td>
</tr>
</tbody>
</table>
</div>
<br/>
 ";
 
}
?>
Copyright by FDC<br />
  Design and development by <a href="https://www.facebook.com/monguyen.giskill" target="_blank">mo.nguyen@fdcc.com.vn</a>
</center>
</body>