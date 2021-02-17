<?php 
    $errors=$this->session->flashdata ( 'errors' );
    $data=$this->session->flashdata ( 'data' );
    $attributes = array( 'id' => 'frmUser' ,'data-parsley-validate novalidate'); 
?>
<?php echo form_open('bo/user/save',$attributes);?>
<!-- .box-body -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_tittle?></h3>
	</div>
	<div class="box-body table-responsive no-padding">
        <?php if (isset($errors) && is_array($errors) && count($errors)>0) :?>
            <div class="col-lg-12 m-b-10" >
                <div class="">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert"  aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                            <strong>Se detectaron los siguientes problemas</strong>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <div class="col-lg-12 m-t-20">
            <!-- first column -->
            <div class="col-lg-6 ">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Id:</label>
                    <div class="col-lg-2">
                        <input
                        type="text"
                        placeholder="Id"
                        id="user_id"
                        name="user_id"
                        class="form-control"
                        value="<?php echo isset($data['user_id'])? $data['user_id'] : '' ?>"
                        autocomplete="off"
                        readonly
                        />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input
                        type="text"
                        placeholder="Ingrese su Nombre"
                        id="user_first_name"
                        name="user_first_name"
                        class="form-control"
                        maxlength="35"
                        value="<?php echo isset($data['user_first_name'])? $data['user_first_name'] : '' ?>"
                        parsley-trigger="change" required
                        autocomplete="off"
                        />
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_first_name'])? $errors['user_first_name'] : '' ?></i></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Apellido:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input
                        type="text"
                        placeholder="Ingrese su apellido"
                        id="user_last_name"
                        name="user_last_name"
                        class="form-control"
                        maxlength="35"
                        value="<?php echo isset($data['user_last_name'])? $data['user_last_name'] : '' ?>"
                        parsley-trigger="change" required
                        autocomplete="off"
                        />
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_last_name'])? $errors['user_last_name'] : '' ?></i></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Telefono:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input
                            type="text"
                            placeholder="Ingrese su telefono"
                            id="user_phone"
                            name="user_phone"
                            class="form-control"
                            maxlength="9"
                            value="<?php echo isset($data['user_phone'])? $data['user_phone'] : '' ?>"
                            parsley-type="digits"
                            data-parsley-minlength="9"
                            data-parsley-maxlength="9"
                            required="" 
                            autocomplete="off"
                        />
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_phone'])? $errors['user_phone'] : '' ?></i></div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">E-Mail:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input
                            type="email"
                            placeholder="Ingrese Email"
                            id="user_email"
                            name="user_email"
                            maxlength="50"
                            class="form-control"
                            value="<?php echo isset($data['user_email'])? $data['user_email'] :'' ?>"
                            parsley-type="email"
                            required="" 
                            autocomplete="off" 
                        />
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_email'])? $errors['user_email'] : '' ?></i></div>
                    </div>
                </div>
                
            </div>
            <!-- end first column -->
            <!-- second column -->
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Usuario:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input
                            type="text"
                            placeholder="Ingrese Usuario"
                            id="user_username"
                            name="user_username"
                            maxlength="50"
                            class="form-control"
                            value="<?php echo isset($data['user_username'])? $data['user_username'] :''  ?>"
                            data-parsley-minlength="6"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                        />
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_username'])? $errors['user_username'] : '' ?></i></div>
                    </div>
                </div>
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
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Perfil:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-control" id="user_profile" name="user_profile" required="">
                                <option value="" >Seleccione</option>
                                <?php foreach ($profiles as $profile):?>
                                    <option value="<?php echo $profile->profile_id?>"  <?php echo   $profile->profile_id==trim($data['user_profile']) ? 'selected' :  ''    ?> ><?php echo $profile->profile_name?></option>
                                <?php endforeach;?>
                        </select>
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_profile'])? $errors['user_profile'] : '' ?></i></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="form-control" id="user_status" name="user_status" required="">
                            <option value=""  <?php if ($data['user_status']=="") echo "selected"  ?>>Seleccione</option>
                            <option value="1" <?php  echo   $data['user_status']=="1" ? 'selected' :  ''    ?>>Activo</option>
                            <option value="2" <?php  echo   $data['user_status']=="2" ? 'selected' :  ''    ?>>Inactivo</option>
                        </select>
                        <div class="clearfix"></div>
                        <div class="text-danger font-10"><i><?php echo isset($errors['user_status'])? $errors['user_status'] : '' ?></i></div>

                    </div>
                </div>

                

            </div>
            <!-- end second column -->
        </div>
    </div>
	<!-- /.box-body -->
	<div class="box-footer">
		<div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url()?>bo/user/lists" type="reset" class="btn btn-default waves-effect m-l-5">
                    Cancel
                </a>
                <button class="btn btn-primary waves-effect waves-light" type="submit">
                    Submit
                </button>
            </div>
		</div>
	</div>
	<!-- /.box-footer-->
</div>
<!-- /.box -->
<?php echo form_close(); ?>	