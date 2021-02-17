<?php
$errors = $this->session->flashdata('errors');
$data = (array) $info[0];
$attributes = array('id' => 'frmUpdate');
?>
<style>

    .customers {}
    .customers .panel-heading a.active {
        background: #2e6da4 none repeat scroll 0 0;
        color: #fff;
    }


    .customers h2 {
        font-size: 18px;
        font-weight: 700;
        margin-top: 30px;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    .customers label {
        font-size: 13px; 
        font-weight: 400;
        margin-bottom: 5px;
        margin-top: 25px;
        width: 100%;
    }

    .customers input {

        background: #ebebeb none repeat scroll 0 0;
        border: 1px solid #ccc;
        color: #3e3f3f;
        font-size: 13px;
        padding: 7px 15px;
        width: 100%;

    }

</style>

<div class="page-title fix"><!--Start Title-->
    <div class="overlay section">
        <h2>Mi Cuenta</h2>
    </div>
</div><!--End Title-->
<section class="checkout-page page fix"><!--Start Checkout Area-->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group customers" id="checkout-progress">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <a class="active" data-toggle="collapse" data-parent="#checkout-progress" href="#checkout-method">MIS DATOS</a>
                        </div>
                        <div id="checkout-method" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <?php if ($errors['succes'] == "true") : ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Excelente! </strong><?php echo $errors['message']?> ...
                                </div>    
                                <?php endif;?>

                                <?php echo form_open(base_url('clientes/mi-cuenta/actualizar'), $attributes); ?>
                                <input type="hidden" name="customer_id" value="<?php echo $data['customer_id'] ?>">
                                <div class="forms">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="">
                                            <h2>Datos Encargado</h2>

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
                                                require="require"
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
                                                />
                                            <div class="text-danger small e_customer_phone"><?php echo $errors['customer_phone'] ?></div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <div class="login">
                                            <h2>Datos Empresa</h2>
                                            <label>Rut Empresa<span class="text-danger">*</span></label>
                                            <input 
                                                type="text"  
                                                name="enterprise_rut" 
                                                id="enterprise_rut" 
                                                value="<?php echo $data['customer_rut_enterprise'] ?>"
                                                parsley-type="alphanum"

                                                />
                                            <div class="text-danger small e_enterprise_rut"><?php echo $errors['rut_enterprise'] ?></div>

                                            <label>Razon Social <span class="text-danger">*</span></label>
                                            <input 
                                                type="text"  
                                                name="enterprise_name" 
                                                id="enterprise_name"
                                                value="<?php echo $data['customer_enterprise_name'] ?>"
                                                parsley-type="alphanum"

                                                />
                                            <div class="text-danger small e_enterprise_name"><?php echo $errors['enterprise_name'] ?></div>



                                            <label>Direccion <span class="text-danger">*</span></label>
                                            <input 
                                                type="text"  
                                                name="enterprise_address" 
                                                id="enterprise_address"
                                                value="<?php echo $data['customer_enterprise_adress'] ?>"
                                                parsley-type="alphanum"

                                                />
                                            <div class="text-danger small e_enterprise_address"><?php echo $errors['enterprise_adress'] ?></div>

                                            <label>Comuna <span class="text-danger">*</span></label>
                                            <input
                                                type="text"
                                                name="enterprise_commune"
                                                id="enterprise_commune"
                                                value="<?php echo $data['customer_enterprise_commune'] ?>"
                                                parsley-type="alphanum"

                                                />
                                            <div class="text-danger small e_enterprise_commune"><?php echo $errors['enterprise_commune'] ?></div>

                                            <label>Ciudad <span class="text-danger">*</span></label>
                                            <input
                                                type="text"
                                                name="enterprise_city"
                                                id="enterprise_city"
                                                value="<?php echo $data['customer_enterprise_city'] ?>"
                                                />
                                            <div class="text-danger small e_enterprise_city"><?php echo $errors['enterprise_city'] ?></div>

                                            <label>Region <span class="text-danger">*</span></label>
                                            <select class="form-control" id="enterprise_region" name="enterprise_region" required="" >
                                                <option  value="">Seleccione Region</option>
                                                <?php foreach ($region as $rg): ?>
                                                    <option  value="<?php echo $rg->region_id; ?>"   <?php echo isset($data['customer_enterprise_region']) ? $rg->region_id == $data['customer_enterprise_region'] ? 'selected' : '' : '' ?>      ><?php echo $rg->region_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="text-danger small e_enterprise_region"><?php echo $errors['enterprise_region'] ?></div>
                                            <input type="submit" value="Aceptar" style="float:right" />
                                        </div>
                                    </div>    
                                </div>
                                <?php echo form_close(); ?>	 

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="checkout-right">
                    <h2>MENU</h2>
                    <ul>
                        <li><a href="javascript:;">Actualizar Datos</a></li>
                        <li><a href="<?php echo base_url()?>clientes/mis-ordenes">Mis Ordenes</a></li>
                    </ul>
                </div>
            </div>
        </div>
</section>    
