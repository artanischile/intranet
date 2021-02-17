<style>.overlay {
        background: #2e6da4;
    }
    .login input[type="submit"] {
        background: #2e6da4 none repeat scroll 0 0;
    }

    .login select {
        background: #ebebeb none repeat scroll 0 0;
        border: 1px solid #ccc;
        color: #3e3f3f;
        font-size: 13px;
        padding: 7px 15px;
        width: 100%;
        border-radius: none !important;
    }
    
    .parsley-errors-list {
      color:red !important;   
    }

</style>

<div class="page-title fix"><!--Start Title-->
    <div class="overlay section">
        <h2>Registro Clientes </h2>
    </div>
</div><!--End Title-->





<?php
$errors = $this->session->flashdata('errors');
$data = $this->session->flashdata('data');
$attributes = array('id' => 'frmRegister');
?>
<?php if ($errors['succes'] == "true") : ?>
    <div class="login-page page fix"><!--start login Area-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mesasage text-center msg" >
                    <h2>Tu registro se llevo <br /> acabo de manera exitosa</h2>
                    <br />
                    <a href="<?php echo base_url() ?>clientes"><button type="button" class="btn btn-primary btn-lg">Iniciar Sesión</button></a>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <?php echo form_open(base_url('clientes/registro/guardar'), $attributes); ?>
    <div class="login-page page fix"><!--start login Area-->
        <div class="container">
            <div class="row">
                <div class="forms">
                    <div class="col-sm-6 col-md-6">
                        <div class="login">


                            <label>Rut <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="customer_rut" 
                                id="customer_rut" 
                                value="<?php echo $data['customer_rut'] ?>" 
                                
                                
                                />
                            <div class="text-danger small e_customer_rut"><?php echo $errors['customer_rut'] ?></div>

                            <label>Nombre <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="customer_name" 
                                id="customer_name"  
                                value="<?php echo $data['customer_name'] ?>" 
                                
                                />
                            <div class="text-danger small e_customer_name"><?php echo $errors['customer_name'] ?></div>

                            <label>E-mail <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="customer_email" 
                                id="customer_email" 
                                value="<?php echo $data['customer_email'] ?>" 
                                data-parsley-type="email"
                                

                                />
                            <div class="text-danger small e_customer_email"><?php echo $errors['customer_email'] ?></div>

                            <label>Telefono<span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="customer_phone" 
                                id="customer_phone" 
                                value="<?php echo $data['customer_phone'] ?>" 
                                
                                data-parsley-type="digits"
                                data-parsley-minlength="6"
                                />
                            <div class="text-danger small e_customer_phone"><?php echo $errors['customer_phone'] ?></div>

                            <label>Contraseña<span class="text-danger">*</span></label>
                            <input 
                                type="password" 
                                name="customer_password" 
                                id="customer_password" 
                                value="<?php echo $data['customer_password'] ?>" 
                                
                                />
                            <div class="text-danger small e_customer_password"><?php echo $errors['customer_password'] ?></div>

                            <label>Confirma contraseña<span class="text-danger">*</span></label>
                            <input 
                                type="password" 
                                name="re_customer_password" 
                                id="re_customer_password"
                                value="<?php echo $data['re_customer_password'] ?>" 
                                
                                data-parsley-equalto="#customer_password"
                                />
                            <div class="text-danger small e_re_customer_password"><?php echo $errors['re_customer_password'] ?></div>                	

                        </div>
                    </div>


                    <div class="col-sm-6 col-md-6">
                        <div class="login">




                            <label>Direccion <span class="text-danger">*</span></label>
                            <input 
                                type="text"  
                                name="customer_address" 
                                id="enterprise_address"
                                value="<?php echo $data['customer_address'] ?>"
                                parsley-type="alphanum"
                                
                                
                                />
                            <div class="text-danger small e_enterprise_address"><?php echo $errors['customer_address'] ?></div>
                            
                             <label>Numero <span class="text-danger">*</span></label>
                            <input 
                                type="text"  
                                name="customer_addres_number" 
                                id="customer_addres_number"
                                value="<?php echo $data['customer_addres_number'] ?>"
                                data-parsley-type="digits"
                                

                                />
                            <div class="text-danger small e_enterprise_address"><?php echo $errors['customer_addres_number'] ?></div>

                            <label>Depto /Casa <span class="text-danger">*</span></label>
                            <input 
                                type="text"  
                                name="customer_addres_rest" 
                                id="customer_addres_rest"
                                value="<?php echo $data['customer_addres_rest'] ?>"
                                parsley-type="alphanum"

                                />
                            <div class="text-danger small e_enterprise_address"><?php echo $errors['customer_addres_rest'] ?></div>




                            <label>Region <span class="text-danger">*</span></label>
                            <select  id="customer_region" name="customer_region"  data-parsley-type="digits" >
                                <option  value="">Seleccione Region</option>
                                <?php foreach ($region as $rg): ?>
                                    <option  value="<?php echo $rg->region_id; ?>"   <?php echo isset($data['customer_region']) ? $rg->region_id == $data['customer_region'] ? 'selected' : '' : '' ?>      ><?php echo $rg->region_name; ?></option>
                                <?php endforeach; ?>
                            </select>

                            <div class="text-danger small e_enterprise_region"><?php echo $errors['customer_region'] ?></div>





                            <label>Comuna <span class="text-danger">*</span></label>
                            <select  id="customer_commune" name="customer_commune"   data-parsley-type="digits">
                                
                            </select>
                            <div class="text-danger small e_enterprise_commune"><?php echo $errors['commune_id'] ?></div>

                            <label>Ciudad <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="enterprise_city"
                                id="enterprise_city"
                                value="<?php echo $data['enterprise_city'] ?>"
                                />
                            <div class="text-danger small e_enterprise_city"><?php echo $errors['enterprise_city'] ?></div>



                            <input type="submit" value="Aceptar" style="float:right" />
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div><!--End login Area-->
    <?php echo form_close(); ?>	
<?php endif; ?>
	