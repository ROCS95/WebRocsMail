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

function charge_mymodal(id,remitente,destinatario,asunto,cuerpo)
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

function charge_mymoda(id,remitente,destinatario,asunto,cuerpo,state)
{   
  
    $("#id").val(id);
    $("#remitente").val(remitente);
    $("#destinatario").val(destinatario);
    $("#asunto").val(asunto);
    $("#cuerpo").val(cuerpo);
    $("#state").val(state);
    $('#myModal').data('show-callback', function() 
    {
    $("#remitente").focus();
   

    });
};
//Refresca el modal.
$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
})

function charge_modal(id,remit,dest,asun,cuer)
{   
    //$("#id").val(id);
    $("#remit").val(remit);
    $("#dest").val(dest);
    $("#asun").val(asun);
    $("#cuer").val(cuer);

    $('#secModal').data('show-callback', function() 
    {
    $("#remit").focus();
   

    });
};