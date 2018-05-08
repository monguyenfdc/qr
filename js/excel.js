
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


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
