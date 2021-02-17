<!-- Default box -->
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title"><?php echo $titulo?></h3>
	</div>
	<div class="box-body table-responsive no-padding">

		<div class="col-lg-12">
			<button id="agregar_user" onclick="ShowAddUser();"  class="btn bg-navy btn-flat margin">
					<i class="bigger-180 ion  ion-person-add"></i>
			</button>
		</div>
        <div class="col-lg-12">
        
        
		<table class="table table-bordered table-hover" id="table">
			<thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>E-mail</th>
                    <th>Estado</th>
                    <th >Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
 
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>E-mail</th>
                    <th>Estado</th>
                    <th >Accion</th>
                </tr>
            </tfoot>
		</table>

		</div>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<div class="box-tools">
        
            
		</div>
	</div>
	<!-- /.box-footer-->
</div>
<!-- /.box -->



<?php $attributes = array( 'id' => 'frmUser'); ?>

<!-- COMPOSE MESSAGE MODAL VER -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<i class="fa fa-users blue"></i> <span id="ttt">Mantencion Usuarios</span></h4>
			</div>
			<?php echo form_open('',$attributes);?>
			
				<div class="modal-body"></div>
				<div class="modal-footer clearfix">
					<button type="button" id="cancelar" class="btn btn-danger"
						data-dismiss="modal">
						<i class="fa fa-times"></i> Cancelar
					</button>
					<button type="button" id="enviar" onclick="return Validarform()"
						class="btn btn-primary ">	Aceptar</button>

				</div>
			<?php echo form_close(); ?>	
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- COMPOSE MESSAGE MODAL VER -->
<div class="modal fade" id="mymodal2" tabindex="-1" role="dialog"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-users blue"></i> <span id="tt">Mantencion Usuarios</span></h4>
			</div>
			<?php echo form_open('',$attributes);?>
			   
				<div class="modal-body"></div>
				<div class="modal-footer clearfix">
					<button type="button" id="cancelar" class="btn btn-danger"
						data-dismiss="modal">
						<i class="fa fa-times"></i> Cerrar
					</button>
					

				</div>
			<?php echo form_close(); ?>	
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
$(document).ready(function(){
	table = $('#table').DataTable({ 
		 searching: true,
         ordering:  false,
        "info": true,
        "lengthChange": true ,
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
         
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('bo/user/ajax_list')?>",
            "type": "POST",
            "data": {
                '<?php echo  $csrf['name'];?>': '<?php echo $csrf['hash'];?>' //replace by your name/value
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
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
	
})
</script>

