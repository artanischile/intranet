<?php 
    $errors=$this->session->flashdata ( 'errors' );
    $data=$this->session->flashdata ( 'data' );
    $succcess=$this->session->flashdata ( 'success' );
    if (empty($data)){
        $data=(array)$modules[0];
    }
    
    if (!empty($succcess)){
       $success= (array)$modules[0];
    }else{
        $success= "";
    }
    $attributes = array( 'id' => 'frmmodules' ,"enctype"=>"multipart/form-data"); 
?>



<?php echo form_open('bo/modules/save',$attributes);?>
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_tittle?></h3>
	</div>
	<div class="box-body table-responsive m-t-20	">
       
        <div class="col-lg m-b-10" >
            <?php if (!empty($success)) :?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo $success;?></strong> 
                </div>
            <?php endif?>
               
            
        </div>
    
        <div class="col-lg-12 m-t-20">
            <!-- first col -->
            <div class="col-lg-6 ">
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Id:</label>
                        <div class="col-lg-2">
                            <input
                            type="text"
                            placeholder=""
                            id="module_id"
                            name="module_id"
                            class="form-control"
                            value="<?php echo isset($data['module_id'])? $data['module_id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />
                        </div>
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['module_id'] ?></div>
                </div>
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Descripcion"
                            id="module_name"
                            name="module_name"
                            class="form-control"
                            value="<?php echo isset($data['module_name'])? $data['module_name'] : '' ?>"
                            required=""  
                            parsley-type="alphanum"
                            autocomplete="off"
                            />
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['module_name'] ?></div>
                        </div>
                </div>
                 <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Url :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Url"
                            id="modules_name"
                            name="module_url"
                            class="form-control"
                            value="<?php echo isset($data['module_url'])? $data['module_url'] : '' ?>"
                            required=""  
                            parsley-type="alphanum"
                            autocomplete="off"
                            />
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['module_url'] ?></div>
                        </div>
                </div>
                 <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Pertenece A:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="module_parent" required=""   name="module_parent" >
                                <option value=""  >Seleccione</option>
                                
                                <?php foreach($principals as $pri): ?>
                                    <option  value="<?php echo $pri->module_id;?>"  <?php echo isset($data['module_parent']) ?  $pri->module_id==$data['module_parent'] ? 'selected' : ''   :  '' ?>  ><?php echo $pri->module_name;?></option>
                                <?php endforeach; ?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['module_parent'] ?></div>
                        </div>
                </div>
   
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="module_status" required=""   name="module_status" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($status as $sts):?>
                                    <option  value="<?php echo $sts->status_value;?>" <?php echo isset($data['module_status']) ?  $sts->status_value==$data['module_status'] ? 'selected' : ''   :  '' ?>   ><?php echo $sts->status_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['module_status'] ?></div>
                        </div>
                </div>
               


            </div>
            <!--/ first col -->
            <div class="col-lg-6">
                <div>
                    <img class="center_block"  src="<?php echo base_url() ?>assets/frontend/img/modules/page/<?php echo $data['modules_image']?>" alt="">
                </div>
            </div>
           
        </div>

        <!--/ first col -->
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url()?>bo/modules/lists" type="reset" class="btn btn-default waves-effect m-l-5">
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