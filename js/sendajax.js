//x? lý form 1
$(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[id='oke1']");
     
    //khi th?c hi?n kích vào nút Login
    submit.click(function()
    {

        //lay tat ca du lieu trong form login
        var data = $('form#form1').serialize();
        //su dung ham $.ajax()
        $.ajax({
        type : 'POST', //ki?u post
        url  : 'modun.php', //g?i d? li?u sang trang submit.php
        data : data,
        success :  function(data)
               {                       
                    if(data == 'false')
                    {
                        alert('Có l?i xãy ra');
                    }else{
                        $('#status').html(data);
                    }
               }
        });
        return false;
    });
});

//loadajax 2
