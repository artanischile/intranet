<?php 
    
    $errors=$this->session->flashdata ( 'errors' );
    $data=$this->session->flashdata ( 'data' );
    $succcess=$this->session->flashdata ( 'success' );
    
    if (empty($data)){
        $data=(array)$category[0];
    }
    
    if (!empty($succcess)){
       $success= $this->session->flashdata ( 'success' );
    }else{
        $success= "";
    }

    
    
    $attributes = array( 'id' => 'frmCategory' ,"enctype"=>"multipart/form-data"); 
    
    

?>



<?php echo form_open('bo/category/save',$attributes);?>
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
                            id="category_id"
                            name="category_id"
                            class="form-control"
                            value="<?php echo isset($data['category_id'])? $data['category_id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />
                        </div>
                        <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_id'] ?></div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Depende de:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="category_parent_id" required=""   name="category_parent_id" >
                                <option value=""  >Seleccione</option>
                                <option value="0" <?php echo $data['category_parent_id']==0 ? 'selected': ''?> >Principal</option>
                                <?php echo categoryTree(0,'',$data['category_parent_id'])?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_parent_id'] ?></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Nombre Categoria"
                            id="category_name"
                            name="category_name"
                            class="form-control"
                            value="<?php echo isset($data['category_name'])? $data['category_name'] : '' ?>"
                            required=""  
                            parsley-type="alphanum"
                            autocomplete="off"
                            />
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_name'] ?></div>
                        </div>
                </div>
                
          

                

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="category_status" required=""   name="category_status" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($status as $sts):?>
                                    <option  value="<?php echo $sts->status_value;?>" <?php echo isset($data['category_status']) ?  $sts->status_value==$data['category_status'] ? 'selected' : ''   :  '' ?>   ><?php echo $sts->status_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_status'] ?></div>
                        </div>
                </div>
              

            </div>
            <!--/ first col -->
            <div class="col-lg-6">
                <div>
                    <img class="center_block"  src="<?php echo base_url() ?>assets/frontend/img/brand/page/<?php echo $data['brand_image']?>" alt="">
                </div>
            </div>
           
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