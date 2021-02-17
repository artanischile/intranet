<?php //print_r($info)             ?>
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
        <h2>Envio de orden</h2>
    </div>
</div><!--End Title-->

<?php
$attributes = array('id' => 'frmPlace');
?>

<section class="cart-page page fix" style=""><!--Start Cart Area-->
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <div class="h2 text-center">Gracias por confiar en Dorel</div>
                <div class="h4 text-center">Hemos recibido tu orden, la cual será procesada lo antes posible.</div>
            </div>
        </div>
    </div>
</section><!--End Cart Area-->
