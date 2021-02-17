<?php 
    $errors=$this->session->flashdata ( 'errors' );
    $data=empty($this->session->flashdata ( 'data' )) ? (array)$brands[0]  : $this->session->flashdata ( 'data' ) ;
    $success=empty($this->session->flashdata ( 'success' )) ? '' : $this->session->flashdata ( 'success' );

    $attributes = array( 'id' => 'frmBrand' ,"enctype"=>"multipart/form-data"); 
   


   
?>



<?php echo form_open('bo/brand/save',$attributes);?>
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
                            id="brand_id"
                            name="brand_id"
                            class="form-control"
                            value="<?php echo isset($data['brand_id'])? $data['brand_id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />
                        </div>
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_id'] ?></div>
                </div>
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Nombre Marca"
                            id="brand_name"
                            name="brand_name"
                            class="form-control"
                            value="<?php echo isset($data['brand_name'])? $data['brand_name'] : '' ?>"
                            parsley-type="alphanum"
                             
                            autocomplete="off"
                            
                            />
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_name'] ?></div>
                        </div>
                </div>
                
          

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Descripcion:</label>
                        <div class="col-lg-8">
                           <textarea name="brand_description" id="brand_description" cols="30" rows="10" class="form-control" style="width:100%">
                           <?php echo isset($data['brand_description'])? $data['brand_description'] : '' ?>
                           </textarea>
                           <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_description'] ?></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen :</label>
                        <div class="col-lg-8">
                            <input
                            type="file"
                            placeholder=""
                            id="brand_image"
                            name="brand_image"
                            class="form-control"
                            value="<?php echo isset($data['brand_image'])? $data['brand_image'] : '' ?>"
                            autocomplete="off"
                            style="padding-bottom: 42px;" 
                            />
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_image'] ?></div>
                        </div>
                        
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="brand_status" name="brand_status" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($status as $sts):?>
                                    <option  value="<?php echo $sts->status_value;?>" <?php echo isset($data['brand_status']) ?  $sts->status_value==$data['brand_status'] ? 'selected' : ''   :  '' ?>   ><?php echo $sts->status_name;?></option>
                                <?php endforeach;?>
                            </select>
                            <input type="hidden" name="hdImage" value="<?php echo isset($data['brand_image'])? $data['brand_image'] : '' ?>">
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_status'] ?></div>
                        </div>
                </div>



            </div>
            <!--/ first col -->
            <div class="col-lg-6">
                <div>
                    <img class="center_block"  src="<?php echo base_url() ?>assets/frontend/img/brand/page/<?php echo $data['brand_image']?>" alt="">
                </div>
            </div>

            <!-- first col -->
           
        </div>

        <!--/ first col -->
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