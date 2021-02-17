<!-- Default box -->

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $sub_tittle ?></h3>
    </div>
    <div class="box-body table-responsive no-padding">
        <div class="col-sm-12">

            <div class="col-sm-6 col-md-6">
                <div class="col-lg-12">
                    <h3>Datos Clientes</h3>
                </div>
                <div class="login">

                    <div class="form-group ">
                        <label>Rut Empresa</label>
                        <input 
                            type="text"  
                            value="<?php echo $customer->customer_rut_enterprise ?>"
                            readonly=""
                            class="form-control"
                            />
                    </div>
                    <div class="form-group ">
                        <label>Razon Social </label>
                        <input 
                            type="text" 
                            value="<?php echo $customer->customer_enterprise_name ?>"
                            parsley-type="alphanum"
                            readonly=""
                            class="form-control"
                            />
                    </div>    
                    <div class="form-group ">
                        <label class="form-control-label">Nombre Contacto </label>
                        <input 
                            type="text" 
                            value="<?php echo $customer->customer_name ?>" 
                            readonly=""
                            class="form-control"
                            />
                        <div class="text-danger small e_customer_name"><?php echo $errors['customer_name'] ?></div>
                    </div>

                    <div class="form-group ">
                        <label  class="form-control-label">E-mail Contacto </label>
                        <input 
                            type="text" 
                            value="<?php echo $customer->customer_email ?>" 
                            readonly=""
                            class="form-control"
                            />
                    </div>
                    <div class="form-group ">
                        <label class="form-control-label">Teléfono Contacto</label>
                        <input 
                            type="text" 
                            value="<?php echo $customer->customer_phone ?>" 
                            readonly=""
                            class="form-control"
                            />
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="col-lg-12">
                    <h3>Datos Despacho</h3>
                </div>
                <div class="login">

                    <div class="form-group ">
                        <label>Direccion </label>
                        <input 
                            type="text"  
                            value="<?php echo $customer->customer_enterprise_adress ?>"
                            readonly=""
                            class="form-control"
                            />
                    </div>

                    <div class="form-group ">
                        <label>Comuna </label>
                        <input
                            type="text"
                            value="<?php echo $customer->customer_enterprise_commune ?>"
                            readonly=""
                            class="form-control"
                            />
                    </div>
                    <div class="form-group ">
                        <label>Ciudad </label>
                        <input
                            type="text"
                            value="<?php echo $customer->customer_enterprise_city ?>"
                            readonly=""
                            class="form-control"
                            /> 
                    </div>
                    <div class="form-group ">
                        <label>Region </label>
                        <input
                            type="text"
                            value="<?php echo $customer->customer_enterprise_region ?>"
                            readonly=""
                            class="form-control"
                            />
                    </div>
                </div>
            </div>    
        </div>
        <br><br>
        <div class="col-sm-12">
            <div class="col-lg-12">
                <h3>Detalle De Productos</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Sub Total</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order->code_description ?> <?php echo $order->product_attr_1 ?>  <?php echo $order->product_attr_2 ?> </td>
                            <td><?php echo $order->product_quantity ?></td>
                            <td><?php echo number_format($order->product_sub_total, 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach ?>    
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <div class="box-tools">
            <div class="form-group text-right m-b-0">
                <a href="<?php echo base_url() ?>bo/orders/" type="reset" class="btn btn-default waves-effect m-l-5">
                    <i class="fa fa-chevron-left"></i>   Volver
                </a>
            </div>
        </div>
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->


<!-- COMPOSE MESSAGE MODAL VER -->
