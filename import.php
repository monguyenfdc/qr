<?php
include ('config.php');
include ('conten.php');
?>
<header >
 <div class="container">
  <div class="row"> 
     <div class="col-sm-2" >
        <img src="img/logo.jpg" height="100px" width="100%" />
     </div>
     <div class="col-sm-7" >
        <h3><CENTER><B>KIỂM SOÁT CÔNG NHÂN RA VÀO DỰ ÁN</B></CENTER></h3>
     </div>
     <div class="col-sm-3" >
        <img src="img/hsse.jpg" />
     </div>
  </div>
  </div>
</header>
 <div class="container">
 <div class="row">
           
    <br>
                <div class="col-md-3 hidden-phone"></div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Cập nhật từ file CSV/TEXT</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/TEXT File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
  <div style='width: 100%; height: 300px; overflow:auto;border: 1px solid #c5cdd8;'>
   <table class='table table-bordered' id='exportTable2'>
 <thead>
<tr>
<th>STT</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
<th>NOTE</th>
</tr>
 </thead>
 
  <?php

if(isset($_POST["Import"])){
if($_FILES["file"]["size"] > 0)

{
 $filename= $_FILES['file']['tmp_name'];
$file = fopen($filename, "r");
$t=0;
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
{
if ($t>0){
//It wiil insert a row to our subject table from our csv file`
 $sql1=mysql_query("INSERT INTO `sheet1`(`ten`, `nam`, `cmnd`, `doi`, `note`) VALUES ('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')");

//we are using mysql_query function. it returns a resource on true else False on error
if($sql1) {
echo "
<tr><td>$emapData[0]</td>
    <td>$emapData[1]</td>
    <td>$emapData[2]</td>
    <td>$emapData[3]</td>
    <td>$emapData[4]</td>
    <td>$emapData[5]</td>
   
    </tr>";
}
else echo "loi";}
$t=$t+1;
}
fclose($file);
//throws a message if data successfully imported to mysql database from excel file

}
} 
?> 

</table>
</div>
 </body>
</html>