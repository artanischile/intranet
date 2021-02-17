<?php 
    $errors     =   $this->session->flashdata ( 'errors' );
    $data       =   $this->session->flashdata ( 'data' );
    $attributes =   array( 'id' => 'frmUser' ,'data-parsley-validate novalidate'); 
?>
<?php echo form_open('bo/user/changepass',$attributes);?>
<!-- .box -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_tittle?></h3>
    </div>
    <!-- box-body -->
	<div class="box-body table-responsive m-t-20">
		<div class="col-lg-6">
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Password:<span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input
                        type="password"
                        placeholder="Ingrese Password"
                        id="user_password"
                        name="user_password"
                        class="form-control"
                        value=""
                        maxlength="10" 
                        data-parsley-minlength="6"
                        data-parsley-maxlength="10"
                        required="" 
                        autocomplete="off"
                    />
                    <div class="clearfix"></div>
                    <div class="text-danger font-10"><i><?php echo isset($errors['user_password'])? $errors['user_password'] : '' ?></i></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-lg-4 form-control-label">Confirme Password:<span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input
                        type="password"
                        placeholder="Ingrese Password"
                        id="user_confirm_password"
                        name="user_confirm_password"
                        class="form-control"
                        value=""
                        maxlength="10" 
                        data-parsley-minlength="6"
                        data-parsley-maxlength="10"
                        data-parsley-equalto="#user_password"
                        required="" 
                        autocomplete="off"
                    />
                    <div class="clearfix"></div>
                    <div class="text-danger font-10"><i><?php echo isset($errors['user_confirm_password'])? $errors['user_confirm_password'] : '' ?></i></div>
                </div>
            </div>

            


        
        </div>
	</div>
    <!-- /.box-body -->
    <!-- .box-footer-->
	<div class="box-footer">
		<div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url()?>bo/user/lists" type="reset" class="btn btn-default">
                    Cancel
                </a>
                <button class="btn btn-primary waves-effect waves-light" type="submit">
                    Aceptar
                </button>
            </div>
		</div>
	</div>
	<!-- /.box-footer-->
</div>
<!-- /.box -->
<?php echo form_close(); ?>	

