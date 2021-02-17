<?php //print_r($info)            ?>
<style>

    *{
        border-radius: 0;
    }   
    .select-menu .sort {

        display: block;
        float: left;
        height: 38px;
        margin-right: 20px;
        padding: 5px 10px;
    }

    .form-control{
        border-radius: 0;
    }

    .sort > h4 {
        float: left;
        font-size: 14px;
        font-weight: 700;
        margin-right: 5px;
        margin-top: 7px;
        text-transform: uppercase;
        color:#fff;
    }

    .sort select {


        background: #fff url("<?php echo base_url() ?>assets/frontend/img/bottom-arrow.png") no-repeat scroll 90% center;
        border: 1px;
        min-width: 40px;
    }

    .btn-primary-cart {
        border-radius: 0;
        padding-top: 16px;
        padding-bottom: 16px;
        font-size: 16px;
    }

    .btn-u-cart{
        border: 1px solid #3F77B6;
        color: #3F77B6;
        font-size: 12px;
        font-weight: 500;
        padding: 10px 15px;
        text-decoration: none;
        text-transform: uppercase;
        background: transparent;
        display: inline-block;
        margin-left: 20px;
        margin-top: 10px;
    }   

    .label {
        background: #ebebeb none repeat scroll 0 0;
        border: 1px solid #ccc;
        color: #3e3f3f;
        font-size: 13px;
        padding: 7px 15px;
        width: 100%;
        border-radius: 0;
    }

</style>
<div class="page-title fix"><!--Start Title-->
    <div class="overlay section">
        <h2>CHECKOUT</h2>
    </div>
</div><!--End Title-->

<?php
$attributes = array('id' => 'frmPlace');
?>

<section class="cart-page page fix" style=""><!--Start Cart Area-->
    <div class="container">
        <div class="row">
            <?php echo form_open(base_url('productos/solcitar'), $attributes); ?>
                <input type="hidden" name="customer_id" value="<?php echo $customer[0]->customer_id ?>">

                <div class="col-sm-12">
                    <div class="col-sm-6 col-md-6">
                        <div class="login">



                            <h2>Datos Cliente</h2>


                            <label>Rut Empresa</label>
                            <input 
                                type="text"  
                                value="<?php echo $customer[0]->customer_rut_enterprise ?>"
                                readonly=""
                                />

                            <label>Razon Social </label>
                            <input 
                                type="text"  
                               
                                value="<?php echo $customer[0]->customer_enterprise_name ?>"
                                parsley-type="alphanum"

                                />


                            <label>Nombre Contacto </label>
                            <input 
                                type="text" 
                                value="<?php echo $customer[0]->customer_name ?>" 
                                readonly=""
                                />
                            <div class="text-danger small e_customer_name"><?php echo $errors['customer_name'] ?></div>

                            <label>E-mail Contacto </label>
                            <input 
                                type="text" 
                                value="<?php echo $customer[0]->customer_email ?>" 
                                readonly=""

                                />

                            <label>Teléfono Contacto</label>
                            <input 
                                type="text" 
                                value="<?php echo $customer[0]->customer_phone ?>" 
                                readonly=""
                                />
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="login">
                            <h2>Datos Despacho</h2>

                            <label>Direccion </label>
                            <input 
                                type="text"  
                                value="<?php echo $customer[0]->customer_enterprise_adress ?>"
                                readonly=""
                                />

                            <label>Comuna </label>
                            <input
                                type="text"
                                value="<?php echo $customer[0]->customer_enterprise_commune ?>"
                                readonly=""

                                />

                            <label>Ciudad </label>
                            <input
                                type="text"
                                value="<?php echo $customer[0]->customer_enterprise_city ?>"
                                readonly=""
                                />  

                            <label>Region </label>
                            <input
                                type="text"
                                value="<?php echo $RegionName ?>"
                                readonly=""
                                />  

                            <?php /* ?>
                              <label>Region </label>
                              <select class="form-control" id="enterprise_region" name="enterprise_region" required="" >
                              <option  value="">Seleccione Region</option>
                              <?php foreach($region as $rg):?>
                              <option  value="<?php echo $rg->region_id;?>"   <?php echo isset($customer[0]->enterprise_region']) ?  $rg->region_id==$customer[0]->enterprise_region'] ? 'selected' : ''   :  '' ?>      ><?php echo $rg->region_name;?></option>
                              <?php endforeach;?>
                              </select>


                              <!--<input
                              type="text"
                              name="enterprise_region"
                              id="enterprise_region"
                              value="<?php  echo  $customer[0]->enterprise_region']?>"
                              />-->
                              <div class="text-danger small e_enterprise_region"><?php echo $errors['enterprise_region'] ?></div>





                              <label>Comuna </label>
                              <input
                              type="text"
                              name="enterprise_commune"
                              id="enterprise_commune"
                              value="<?php  echo  $customer[0]->enterprise_commune']?>"
                              parsley-type="alphanum"

                              />
                              <div class="text-danger small e_enterprise_commune"><?php echo $errors['enterprise_commune'] ?></div>

                              <label>Ciudad </label>
                              <input
                              type="text"
                              name="enterprise_city"
                              id="enterprise_city"
                              value="<?php  echo  $customer[0]->enterprise_city']?>"
                              />
                              <div class="text-danger small e_enterprise_city"><?php echo $errors['enterprise_city'] ?></div>


                              <?php */ ?>

                        </div>
                    </div>    


                </div>



                <?php if (count($this->cart->contents()) > 0) : ?>        
                    <div class="col-sm-12" style="margin-top: 80px" >
                        <div class="col-md-12 text-center">
                            <h3>Detalle Productos</h3>
                        </div>
                        <div class="table-responsive">

                            <table class="table cart-table">
                                <thead class="table-title">
                                    <tr>
                                        <th class="namedes">Producto</th>
                                        <th class="quantity">Cantidad</th>
                                        <th class="quantity">Sub Total</th>

                                    </tr>														
                                </thead>
                                <tbody>
                                    <?php foreach ($this->cart->contents() as $items) : ?>
                                        <tr class="table-info">
                                            <td class="namedes">
                                                <?php echo $items['name'] ?> <?php echo $items['size'] ?> / <?php echo $items['color'] ?>
                                            </td>

                                            <td class="quantity"><?php echo $items['qty'] ?></td>

                                            <td class="valu" >
                                                <h5>$<?php echo number_format($items['subtotal'], 0, ',', '.') ?></h5>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 ">
                        <div class="proceed fix">
                            <div class="total">
                                <h6>Total <span>$<?php echo number_format($this->cart->total(), 0, ',', '.'); ?></span></h6>
                            </div>

                        </div>
                    </div>

                <div class="col-sm-6 " style="float:right">
                        <div class="proceed fix">
                          <input type="submit" value="Realizar Pedido" class="btn-u-cart" />
                        </div>
                    </div>
            </div>
             <?php echo form_close(); ?>	
        <?php endif; ?>
    </div>
</section><!--End Cart Area-->
