<?php
 mysql_connect('localhost','root',''); //ket noi databse
 mysql_select_db("qr" ); //lua chon database
  mysql_query("SET NAMES utf8");
 date_default_timezone_set("Asia/Ho_Chi_Minh");
 $today=date('d-m-Y');
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
     
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="js/ex1.js"></script>
        <script type="text/javascript" src="js/ex2.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


</head>
<body >
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
  <hr />
  </header>
  
  <div class="container">
  <div class="row">
     <div class="col-sm-4" >
  <div class='input-group'><span class='form-control'>QUÂN SỐ NGÀY: <?php echo $today; ?>  </span><span class="input-group-addon"><button id="exportButton">Xuất Excel</button></span></div> 
  <div style="width: 100%; height: 550px; overflow:auto; border: 2px solid #c5cdd8;">
    <table class="table table-striped"  id="exportTable">
    <thead>
        <tr>
            <th>STT</th>
            <th>DOI</th>
            <th>QS</th>
        </tr>
    </thead>
    <tbody>
  <?php 
  $query = "select * from doi ";$sql = mysql_query($query); 
  $sl=0;
  while($row = mysql_fetch_assoc($sql)){ $doi = $row['doi'];
  $query2=mysql_query("SELECT * FROM congnhan WHERE doi = '$doi' and ngay='$today'");
   $row2 = mysql_num_rows($query2); 
 $sl=$sl+1;
   echo "<tr>
            <td>$sl </td>
            <td>$doi </td>
            <td>$row2</td>
        </tr>
        ";}
    ?>
	

    </tbody>
    </table>
</div></div>
 <div class="col-sm-8" >
 <div class='input-group'><span class='form-control'>THÔNG TIN CÔNG NHÂN LÀM VIỆC TRONG NGÀY</span><span class="input-group-addon"><button id="exportButton2" >Xuất Excel</button></span></div>
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
 <div style="width: 100%; height: 516px; overflow:auto;border: 2px solid #c5cdd8;">
  <table class="table table-bordered" id="exportTable2">
 <thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th>YEAR</th>
<th>ID_CAD</th>
<th>GROUP</th>
</tr>
 </thead>
 <tbody id="myTable">
 <?php
 $query3=mysql_query("SELECT * FROM congnhan WHERE ngay='$today'order by doi desc");
 $dem=0;
 while($row3 = mysql_fetch_assoc($query3)){$dem=$dem+1;
    
    echo "<tr><td>$dem</td>
    <td>{$row3['ten']}</td>
    <td>{$row3['nam']}</td>
    <td>{$row3['cmnd']}</td>
    <td>{$row3['doi']}</td>
   
    </tr>";
    }
   echo '</tbody></table>'; 
 ?>
 </div>
 </div>
 </div>
  </div>
  

  <footer>
 
  
  <hr /><center>
  Copyright by FDC<br />
  Design and development by <a href="https://www.facebook.com/monguyen.giskill" target="_blank">mo.nguyen@fdcc.com.vn</a></center>
  
  </footer>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <!-- you need to include the shieldui css and js assets in order for the components to work -->



<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                        STT: { type: Number },
                        DOI: { type: String },
                        QS: { type: Number }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "HSSE",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "STT"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "DOI"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "QS"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: Number, value: item.STT },
                                        { type: String, value: item.DOI },
                                        { type: Number, value: item.QS }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "Quan_so"
                });
            });
        });
    });
</script>

<script type="text/javascript">
    jQuery(function ($) {
        $("#exportButton2").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable2",
                schema: {
                    type: "table",
                    fields: {
                        ID: { type: Number },
                        NAME: { type: String },
                        YEAR: { type: Number },
                        ID_CAD: { type: String },
                        GROUP: { type: String }
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "MONGUYEN",
                    worksheets: [
                        {
                            name: "HSSE",
                            rows: [
                                {
                                    cells: [
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "ID"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "NAME"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "YEAR"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "ID_CAD"
                                        },
                                        {
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "GROUP"
                                        }
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                        { type: Number, value: item.ID },
                                        { type: String, value: item.NAME },
                                        { type: Number, value: item.YEAR },
                                        { type: String, value: item.ID_CAD },
                                        { type: String, value: item.GROUP }
                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "Quan_so_cong_nhan"
                });
            });
        });
    });
</script>
 </body>
 </html>