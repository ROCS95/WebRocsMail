$(document).ready(function () {

    $("#grid").kendoGrid({
        dataSource: {
            pageSize: 5
        },
        height: 370,
        groupable: true,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        }
    });

    $('#container-table').css("visibility", 'visible');
});


function charge_modal(id,name,last_name,mail,omail,pass)
{   
    $("#id").val(id);
    $("#name").val(name);
    $("#last_name").val(last_name);
    $("#mail").val(mail);
    $("#omail").val(omail);
    $("#pass").val(pass);

    $('#myModal').data('show-callback', function() 
    {
    $("#name").focus();
   

    });
};
