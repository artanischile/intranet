<?php //print_r($info)       ?>
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

</style>
<div class="page-title fix"><!--Start Title-->
    <div class="overlay section">
        <h2>CARRO</h2>
    </div>
</div><!--End Title-->
<section class="cart-page page fix" style=""><!--Start Cart Area-->
    <div class="container">
        <div class="row">
            <form action="<?php echo base_url() ?>productos/carro/actualiza" method="post" id="formcart"   >
                <input type="hidden" name="<?php echo $csfr['csrfName'] ?>" value="<?php echo $csfr['csrfHash'] ?>">
                
                <?php 
                    if (count($this->cart->contents()) > 0) :
                    
                    
                    
                ?>        
                    <div class="col-sm-12">
                        <div class="table-responsive">

                            <table class="table cart-table">
                                <thead class="table-title">
                                    <tr>
                                        <th class="namedes">Producto</th>
                                        <th class="quantity">Cantidad</th>
                                        <th class="quantity">Sub Total</th>
                                        <th class="acti">Acci&oacute;n</th>
                                    </tr>													
                                </thead>
                                <tbody>
                                    <?php foreach ($this->cart->contents() as $items) : ?>
                                        <tr class="table-info">
                                            <td class="namedes">
                                                <?php echo $items['name'] ?> <?php echo $items['size'] ?> / <?php echo $items['color'] ?>
                                            </td>

                                            <td class="quantity">
                                                 <input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid[]">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="<?php echo $items['qty'] ?>" name="qty[]" class="cart-plus-minus-box">
                                                </div>
                                            </td>
                                           
                                            <td class="valu" >
                                                <h5>$<?php echo number_format($items['subtotal'],0,',','.') ?></h5>
                                            </td>
                                            <td class="acti">
                                                <a href="<?php echo base_url() ?>productos/carro/eliminaritem/<?php echo $items['rowid'] ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-7">
                        <div class="coupon">
                            <a href="<?php echo base_url() ?>productos/bicicletas/bicicletas">SEGUIR COMPRANDO</a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="proceed fix">
                            <a href="<?php echo base_url() ?>productos/carro/eliminar">VACIAR CARRO</a>
                            <input type="submit" value="ACTUALIZAR CARRO" class="btn-u-cart" />
                           
                            <div class="total">
                                <h6>Total <span>$<?php echo $this->cart->total(); ?></span></h6>
                            </div>
                            <div class="clearfix"></div>
                            <a id="procedto" href="<?php echo base_url()?>productos/checkout">CHECK OUT</a>
                        </div>
                    </div>
            </div>
            </form>
        <?php else: ?>
            <div class="col-sm-12">
                <div class="alert alert-info" style="margin-top: 20px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Atencion!&nbsp;&nbsp;No existen productos en su carro, debe seleccionar alguno</strong>     </div>         
            </div>
        <?php endif; ?>
    </div>
</section><!--End Cart Area-->
