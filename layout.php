<?php
include ('config.php');
include ('conten.php');
mysql_query("DELETE FROM `{$_COOKIE['project']}`");
mysql_query("INSERT INTO `{$_COOKIE['project']}` (doi)
SELECT DISTINCT doi
FROM sheet1 WHERE project ='{$_COOKIE['project']}'");
?>

<style type="text/css">.ritz .waffle a { color: inherit; }.ritz .waffle .s10{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Inconsolata',Arial;font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:0;}.ritz .waffle .s0{border-bottom:1px SOLID #000000;background-color:#ffffff;}.ritz .waffle .s4{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s1{border-right:1px SOLID #000000;background-color:#ffffff;}.ritz .waffle .s8{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:8pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s2{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;color:#000000;font-family:'Arial';font-size:10pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:0;}.ritz .waffle .s5{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:10pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s3{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:center;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:12pt;vertical-align:bottom;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s7{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Times New Roman';font-size:12pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s9{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}.ritz .waffle .s6{border-bottom:1px SOLID #000000;border-right:1px SOLID #000000;background-color:#ffffff;text-align:left;font-weight:bold;color:#000000;font-family:'Times New Roman';font-size:11pt;vertical-align:middle;white-space:nowrap;direction:ltr;padding:2px 3px 2px 3px;}</style>
<div class="container">
 <div class="row">
<div class="col-md-4">
    <span  class="input-group-addon">In Theo đội</span>  
        <form action="print.php" method="POST" target="_blank">
        <div class="input-group">
             <?php  $sqld = mysql_query("select * from `{$_COOKIE['project']}`");?>         
             <select class="form-control" name="doi" >
           <option value='' >--Chọn đội--</option>
            <?php while($rowd = mysql_fetch_assoc($sqld)){ echo "<option value='{$rowd['doi']}' > {$rowd['doi']} </option>";}?>
            </select>
            <div class="input-group-addon">
            <input type="submit" value="print" name="in1"  />
            </div>
        </div>
        </form>
        
    <span  class="input-group-addon">In theo mã số công nhân</span>  
        <form action="" method="POST">
        <div class="input-group">
             <input class="form-control" type="text" name="ms" placeholder="Nhập mã số" />
            <div class="input-group-addon">
            <input type="submit" value="print" name="in2"  />
            </div>
        </div>
        </form>
    </div>
<div class="col-md-8">
<div style='width: 100%; height: 120px; overflow:auto;border: 1px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>NOTE</th>
<th>IN</th>
</tr>
 </thead>
<?php 
if(isset($_POST["in2"])){
$sql1= mysql_query("SELECT * FROM sheet1 where cmnd='{$_POST["ms"]}'");
if(mysql_num_rows($sql1)>0){
    $row1 = mysql_fetch_assoc($sql1);
        echo "
        
        <tr>
        <td>{$row1['ID']}</td>
        <td>{$row1['ten']}</td>
        <td>{$row1['nam']}</td>
        <td>{$row1['cmnd']}</td>
        <td>{$row1['doi']}</td>
        <td>{$row1['note']}</td>
        <td>{$row1['project']}
        <script>function open_a_win{$row1['ID']}() { window.open('print.php?idpr={$row1['ID']}','Print',300,300); return false; }</script> 
        <a onclick='return open_a_win{$row1['ID']}();'><span title='Print' class='glyphicon glyphicon-print' aria-hidden='true'></span></a>
        </td>
        </td>
        </tr>";
}   
}

?>
</table>
</div>
</div>
</div>
<div class="row">
<center>
 <span  class="input-group-addon">Mẫu thẻ</span>
<div class="ritz grid-container" dir="ltr"  id="Content_ID">

<table class="waffle" cellspacing="0" cellpadding="0">

<tbody>
<tr style="height:1px;">

<td></td><td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
<td class="s0"></td>
</tr>
<tr style="height:20px;">

<td class="s1"></td>
<td class="s2">
<div style="width:100px;height:20px">
<img src="img/logo.png" width="90px" height="30px" />
</div>
</td>
<td class="s3" colspan="4"> FDC - <?php echo strtoupper($_COOKIE['project']);?><br>THẺ RA VÀO CÔNG TRƯỜNG</td>
<td class="s4" dir="ltr" rowspan="6"></td>
<td class="s4" dir="ltr" colspan="2">NỘI QUY CÔNG TRÌNH</td>
</tr>
<tr style="height:33px;">

<td class="s1"></td>
<td class="s5" dir="ltr">MS</td>
<td class="s6" dir="ltr" colspan="2">Họ &amp;Tên:</td>
<td class="s4" dir="ltr" colspan="2">TEN CN</td>
<td class="s7" dir="ltr" colspan="2" rowspan="5">
1. Chấp hành nghiêm chỉnh nội quy công trường;<br>
2. Thẻ có giá trị trong công trường FDC;<br>
<span style="font-weight:bold;">3. Không cho người khác mượn thẻ dưới mọi hình thức<br>vi phạm phạt 10.000.000đ</span><br>
4. Xuất trình thẻ khi vào cổng;<br>5. Giữ và trình thẻ khi chuyển công trình trong FDC;<br>6. Mất thẻ phạt 20.000đ</td>
</tr>
<tr style="height:29px;">


<td class="s1"></td>
<td class="s8" dir="ltr" rowspan="4">(ẢNH THẺ)</td>
<td class="s6" dir="ltr" colspan="2">ĐTC/NTP</td>
<td class="s4" dir="ltr" colspan="2">xxxxx</td>
</tr>
<tr style="height:36px;">


<td class="s1"></td>
<td class="s6" colspan="2">Ngày cấp:</td>
<td class="s9" dir="ltr">xx/xx/xxxx</td>
<td class="s10" rowspan="3"><div style="width:107px;height:102px">
<img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://fdc.giskill.com/index.php?cmnd=1" height="102px" width="102px"/>
</div></td>
</tr>
<tr style="height:35px;">


<td class="s1"></td>
<td class="s6" colspan="2">Năm sinh:</td>
<td class="s9" dir="ltr">[----xxxx----]</td>
</tr>
<tr style="height:29px;">
<td class="s1"></td>
<td class="s6" colspan="2">CMND:</td>
<td class="s9" dir="ltr">xxxxxxxxxx</td>
</tr>
</tbody>
</table>
</div>

</center>
</div>
</div>
  <hr />
   <footer>
  <center>
  Copyright by FDC<br />
  Design and development by <a href="https://www.facebook.com/monguyen.giskill" target="_blank">mo.nguyen@fdcc.com.vn</a></center> 
  </footer>
  
 </body>
 </html>
