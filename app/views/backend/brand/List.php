<!-- Default box -->
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title"><?php echo $description?></h3>
	</div>
	<div class="box-body table-responsive no-padding">

		<div class="col-lg-12">
        <a id="agregar_user" href="<?php echo BASE_BO?>brand/add"   class="btn bg-navy btn-flat margin">
				<i class="bigger-120 ion-android-add-circle"></i> Nueva Marca
			</a>
		</div>
        <div class="col-lg m-b-10" >
            <?php if (!empty($success)) :?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo $success;?></strong> 
                </div>
            <?php endif?>
        </div>
        <div class="col-lg-12">
        
        <input type="hidden" name="<?php echo $csfr['csrfName']?>" value="<?php echo $csfr['csrfHash']?>" style="display:none;" />
		<table class="table table-bordered table-hover" id="table">
			<thead>
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Creado</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Creado</th>
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




