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
                            <a class="active" data-toggle="collapse" data-parent="#checkout-progress" href="#checkout-method">Detalle Orden # <?php echo $order_number?></a>
                        </div>
                        <div id="checkout-method" class="panel-collapse collapse in">
                            <div class="panel-body">
                               
                                <table class="table table-bordered table-hover">
                                     <thead>
                                         <tr>
                                             
                                             <th>Producto</th>
                                             <th>Cantidad</th>
                                             <th>Sub Total</th>
            
                                             
                                         </tr>
                                     </thead>
                                     <tbody>
                                     <?php foreach ($orders as $order):?>
                                         <tr>
                                             <td><?php echo $order->code_description?> <?php echo $order->product_attr_1?>  <?php echo $order->product_attr_2?> </td>
                                             <td><?php echo $order->product_quantity?></td>
                                             <td><?php echo number_format($order->product_sub_total,0,',','.');?></td>
                                         </tr>
                                     <?php endforeach?>    
                                     </tbody>
                                 </table>
                 
                               
                               

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-3">
                <div class="checkout-right">
                    <h2>MENU</h2>
                    <ul>
                       <li><a href="<?php echo base_url()?>clientes/mi-cuenta">Actualizar Datos</a></li>
                        <li><a href="<?php echo base_url()?>clientes/mis-ordenes">Mis Ordenes</a></li>
                    </ul>
                </div>
            </div>
        </div>
</section>    
