//x? l� form 1
$(document).ready(function()
{  
    //khai b�o n�t submit form
    var submit   = $("button[id='oke1']");
     
    //khi th?c hi?n k�ch v�o n�t Login
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
                        alert('C� l?i x�y ra');
                    }else{
                        $('#status').html(data);
                    }
               }
        });
        return false;
    });
});

//loadajax 2
