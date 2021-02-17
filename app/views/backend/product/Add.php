
<?php 
    $errors     =   $this->session->flashdata ( 'errors' );
    $data       =   $this->session->flashdata ( 'data' );
    $succcess   =   $this->session->flashdata ( 'success' );
    
    if (empty($data)){
        $data=(array)$product[0];
    }
    
    if (!empty($succcess)){
       $success= (array)$brands[0];
    }else{
        $success= "";
    }
    //echo "<pre>";
    //print_r($data);
    //print_r($codes);
    
    
    $attributes = array( 'id' => 'frmProduct' ,"enctype"=>"multipart/form-data"); 
?>



<?php echo form_open('bo/product/save',$attributes);?>
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $sub_tittle?></h3>
	</div>
	<div class="box-body table-responsive m-t-20	">
        <div class="col-lg m-b-10" >
        </div>
    
        <div class="col-lg-12 m-t-20">
            <!-- first col -->
            <div class="col-lg-8 ">
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Id:</label>
                        <div class="col-lg-2">
                            <input
                            type="text"
                            placeholder=""
                            id="product_id"
                            name="product_id"
                            class="form-control"
                            value="<?php echo isset($data['product_id'])? $data['product_id'] : '' ?>"
                            autocomplete="off"
                            readonly
                            />
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Codigo Padre:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control select2" id="code_id" required=""   name="code_id" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($codes as $code):?>
                                    <option  value="<?php echo $code->code;?>" <?php echo isset($data['code_id']) ?  $code->code==$data['code_id'] ? 'selected' : ''   :  '' ?>   ><?php echo $code->code_description;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['code_id'] ?></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">SKU :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="SKU Producto"
                            id="product_sku"
                            name="product_sku"
                            class="form-control"
                            value="<?php echo isset($data['product_sku'])? $data['product_sku'] : '' ?>"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                            
                            />
                        </div>
                </div>



                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Nombre :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Nombre Producto"
                            id="product_name"
                            name="product_name"
                            class="form-control"
                            value="<?php echo isset($data['product_name'])? $data['product_name'] : '' ?>"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                            
                            />
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Marca:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control select2" id="brand_id" required=""   name="brand_id" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($brands as $brand):?>
                                    <option  value="<?php echo $brand->brand_id;?>" <?php echo isset($data['brand_id']) ?  $brand->brand_id==$data['brand_id'] ? 'selected' : ''   :  '' ?>   ><?php echo $brand->brand_name;?></option>
                                <?php endforeach;?>                                    

                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['brand_id'] ?></div>
                        </div>
                </div>
                
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Jerarquia 1:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="category_id_1" required=""   name="category_id_1" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($category_one as $c_one):?>
                                    <option  value="<?php echo $c_one->category_id;?>" <?php echo isset($data['product_cat_1']) ?  $c_one->category_id==$data['product_cat_1'] ? 'selected' : ''   :  '' ?>   ><?php echo $c_one->category_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_id_1'] ?></div>
                        </div>
                </div>
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Jerarquia 2:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="category_id_2" required=""   name="category_id_2" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($category_two as $c_two):?>
                                    <option  value="<?php echo $c_two->category_id;?>" <?php echo isset($data['product_cat_2']) ?  $c_two->category_id==$data['product_cat_2'] ? 'selected' : ''   :  '' ?>   ><?php echo $c_two->category_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_id_2'] ?></div>
                        </div>
                </div>
                
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Jerarquia 3:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="category_id_3" required=""   name="category_id_3" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($category_three as $c_three):?>
                                    <option  value="<?php echo $c_three->category_id;?>" <?php echo isset($data['product_cat_3']) ?  $c_three->category_id==$data['product_cat_3'] ? 'selected' : ''   :  '' ?>   ><?php echo $c_three->category_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['category_id_3'] ?></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Precio Venta Publico (PVP) :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Precio Venta Publico"
                            id="product_sugest_price"
                            name="product_sugest_price"
                            class="form-control"
                            value="<?php echo isset($data['product_sugest_price'])? $data['product_sugest_price'] : '' ?>"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                            
                            />
                        </div>
                </div>                

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Precio Base Mayorista Neto:</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Precio Producto con iva"
                            id="product_sale_price"
                            name="product_sale_price"
                            class="form-control"
                            value="<?php echo isset($data['product_sale_price'])? $data['product_sale_price'] : '' ?>"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                            
                            />
                        </div>
                </div>
                 
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Stock :</label>
                        <div class="col-lg-8">
                            <input
                            type="text"
                            placeholder="Stock Producto"
                            id="product_stock"
                            name="product_stock"
                            class="form-control"
                            value="<?php echo isset($data['product_stock'])? $data['product_stock'] : '' ?>"
                            parsley-type="alphanum"
                            required=""  
                            autocomplete="off"
                            
                            />
                        </div>
                </div>


                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Descripcion Corta:</label>
                        <div class="col-lg-8">
                           <textarea 
                                name="product_short_description" 
                                id="product_short_description" 
                                placeholder="Descripción Corta"
                                class="form-control"
                                width="100%"
                                
                                >
                                <?php echo isset($data['product_short_description'])? $data['product_short_description'] : '' ?>
                                
                            </textarea>
                        </div>
                </div>

                 <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Descripcion Larga:</label>
                        <div class="col-lg-8">
                           <textarea 
                                name="product_long_description" 
                                id="product_long_description" 
                                class="form-control"
                                width="100%"
                                placeholder="Descripción larga"
                                
                            >
                            <?php echo isset($data['product_long_description'])? $data['product_long_description'] : '' ?>
                            </textarea>
                        </div>
                </div>
                

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen 1:</label>
                        <div class="col-lg-8">
                            <input
                            type="file"
                            placeholder=""
                            id="product_list_image"
                            name="product_list_image"
                            class="form-control"
                            value="<?php echo isset($data['product_list_image'])? $data['product_list_image'] : '' ?>"
                            autocomplete="off"
                            
                            style="padding-bottom: 42px;" 
                            />
                        </div>
                </div>
                <input type="hidden" name="hdImage" value="<?php echo isset($data['product_list_image'])? $data['product_list_image'] : '' ?>">
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Imagen 2:</label>
                        <div class="col-lg-8">
                            <input
                            type="file"
                            placeholder=""
                            id="product_detail_image"
                            name="product_detail_image"
                            class="form-control"
                            value="<?php echo isset($data['product_detail_image'])? $data['product_detail_image'] : '' ?>"
                            autocomplete="off"
                            requiredx="" 
                            style="padding-bottom: 42px;" 
                            />
                        </div>
                </div>
                <input type="hidden" name="hdImageD" value="<?php echo isset($data['product_detail_image'])? $data['product_detail_image'] : '' ?>">
                
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Talla:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control select2" id="product_size" required=""   name="product_size" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($sizes as $size):?>
                                    <option  value="<?php echo $size->product_size;?>" <?php echo isset($data['product_size']) ?  $size->product_size==$data['product_size'] ? 'selected' : ''   :  '' ?>   ><?php echo $size->product_size;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['product_size'] ?></div>
                        </div>
                </div>
                
                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Color:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control select2" id="product_color" required=""   name="product_color" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($colors as $color):?>
                                    <option  value="<?php echo $color->product_color;?>" <?php echo isset($data['product_color']) ?  $color->product_color==$data['product_color'] ? 'selected' : ''   :  '' ?>   ><?php echo $color->product_color;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['product_color'] ?></div>
                        </div>
                </div>
                
                

                <div class="form-group row">
                        <label for="inputEmail3" class="col-lg-4 form-control-label">Estado:<span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="product_status" required=""   name="product_status" >
                                <option value=""  >Seleccione</option>
                                <?php foreach($status as $sts):?>
                                    <option  value="<?php echo $sts->status_value;?>" <?php echo isset($data['product_status']) ?  $sts->status_value==$data['product_status'] ? 'selected' : ''   :  '' ?>   ><?php echo $sts->status_name;?></option>
                                <?php endforeach;?>
                            </select>
 
                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['product_status'] ?></div>
                        </div>
                </div>
           
            </div>
            <!--/ first col -->
            <!-- first col -->
            <div class="col-lg-6">
            <?php if( isset($data['product_list_image'])) :?>
                <div class="col-md-6">
                    <img src="<?php echo base_url()?>/assets/frontend/img/product/<?php echo !empty($data['product_list_image'])? $data['product_list_image'] : 'nofoto.jpg' ?>" class="img-responsive" />
                </div>
            <?php endif;?>
            <?php if( isset($data['product_detail_image'])) :?>
                <div class="col-md-6">
                    <img src="<?php echo base_url()?>/assets/frontend/img/product/<?php echo !empty($data['product_detail_image'])? $data['product_detail_image'] : 'nofoto.jpg' ?>" class="img-responsive" />
                </div>
            <?php endif;?>
                
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