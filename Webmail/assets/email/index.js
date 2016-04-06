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

function charge_modal(id,remitente,destinatario,asunto,cuerpo)
{   
    $("#id").val(id);
    $("#remitente").val(remitente);
    $("#destinatario").val(destinatario);
    $("#asunto").val(asunto);
    $("#cuerpo").val(cuerpo);

    $('#myModal').data('show-callback', function() 
    {
    $("#remitente").focus();
   

    });
};