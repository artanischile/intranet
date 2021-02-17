$(document).ready(function(){
    $('form').parsley();
    /*$('.date').datepicker({
        autoclose: true,
        language: "es",
        format: "yyyy/mm/dd",
    })*/


    //bootstrap WYSIHTML5 - text editor
    $("textarea").wysihtml5();
    //Initialize Select2 Elements
    $(".select2").select2();

      


	table = $('#table').DataTable({ 
	 searching: true,
         ordering:  true,
        "info": true,
        "lengthChange": true ,
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "bo/product/ajax_list",
            "type": "POST",
            "data": {
                'csrf_token': $("input[name=csrf_token]").val() //replace by your name/value
              }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        "language":{
            "sProcessing":     "<i class='fa fa-cog fa-spin' style='font-size:28px'></i> Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "<",
                "sLast":     ">",
                "sNext":     ">>",
                "sPrevious": "<<"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    

    setTimeout(function() {
        $(".msg").fadeOut(1500);
        },3000);
    })

function del(register_id){
    swal({
        title: "¿estas seguro?",
        text: "No podras deshacer la acción.",
        type: "error",
        showCancelButton: true,
        cancelButtonClass: 'btn-secondary waves-effect',
        confirmButtonClass: 'btn-danger waves-effect waves-light',
        confirmButtonText: "Si, borrarlo de todos modos!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            borra(register_id)
        } else {
            
        }
    });
}


$("#branch_region").change(function (e) { 
     
     $.ajax({
        type: "post",
        url: BASE_URL + "branch/ajaxCommune",
        data: {
            'reg_id': $(this).val(),
            'csrf_token': $("input[name=csrf_token]").val()
        },
        dataType: "json",
        success: function (response) {
            $("#branch_commune option").remove();
            $("#branch_commune").append("<option value=''>Seleccione Comuna</option>");

            $.each(response, function (i, item) { 
                $("#branch_commune").append("<option value='"+response[i].commune_id +"'>"+ response[i].commune_name+ "</option>");
            });
        }
    });
});


function borra (register_id){
    jQuery.ajax({
        type : "POST",
        url : BASE_URL + "banner/delete",
        data : {
            'user_id': register_id,
            'csrf_token': $("input[name=csrf_token]").val() //replace by your name/value
        },
        dataType : "json",
        beforeSend : function() {
        },
        success : function(data) {
            if(data['succes']){
                swal({
                    title: "Eliminado!!",
                    text: "El registro fue eliminado.",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }, function () {
                    window.location.href= BASE_URL + "banner/lists"
                });
                
            }else{
                swal("Deleted!", "el registro no pudo ser eliminado.", "success");
                
            }
        },
        error : function(message) {
        }
    })
}