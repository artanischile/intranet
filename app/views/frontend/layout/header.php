<?php
$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "S?bado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$LaFecha = date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
//$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Viernes 24 de Febrero del 2012
?>
<div class="header-top hidden-xs hidden-md hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3"></div>
            <div class="col-sm-12 col-md-2"><div class="socials text-center"></div></div>
            <div class="col-sm-12 col-md-7">
                <div class="info">
                    <div class="mail-id float-left col-sm-4 no-padding text-right">
                        <i class="fa fa-phones "></i>
                        <p style="text-align: right;"><a href="tel://+56981615090"></a></p>
                    </div>
                    <div class="mail-id float-left col-sm-4 no-padding text-right">
                        <i class="fa fa-envelope-os "></i>
                        <p style="text-align: right;"><a href="#"></a></p>
                    </div>
                    <div class="mail-id float-left col-sm-4 no-padding text-right">
                        <i class="fa fa fa-calendar "></i>
                        <p style="text-align: right;"><a href="#"><?php echo $LaFecha ?> </a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--End Header Top Area-->
<!--Start Header Area-->
<div class="header-area"><!--Start Header Area-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="col-lg-4 c">
                    <img src="<?php echo base_url() ?>assets/frontend/img/header/logo.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-6 col-xs-12" style="padding-top:10px">

                
                <?php if (!$this->session->userdata('isLogued')) : ?>
                    <div class="col-lg-2 col-xs-6">
                        <a href="<?php echo base_url() ?>clientes" type="button" class="btn btn-primary">Iniciar sesion</a>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <a href="<?php echo base_url() ?>clientes/registro" type="button" class="btn btn-primary">Registrarse</a>
                    </div>
                <?php else: ?>
                   <div class="col-lg-6 col-lg-offset-2">
                    <?php echo form_open(base_url('productos/buscar'), $attributes); ?>
                    <div class="input-group margin">
                        <input type="text" class="form-control" name="search" value=" <?php echo $SearcString?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">IR!</button>
                        </span>
                    </div>
                    <?php echo form_close(); ?>	
                </div>
                    <div class="col-lg-2 col-xs-6">
                        <a href="<?php echo base_url() ?>/clientes/mi-cuenta" type="button" class="btn btn-primary">Mi Cuenta</a>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <a href="<?php echo base_url() ?>clientes/cerrar" type="button" class="btn btn-primary">Cerrar Sesi&oacute;n</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($this->session->userdata('isLogued')) : ?>
        <div class="container">
            <div class="row">
                <?php //echo show_cart()?>
                
                
                <div class="col-sm-4 col-lg-3 float-right">
                    <?php //echo show_cart()?>
                    
                    <div class="cart-info float-right">
                        <a href="<?php echo base_url() ?>productos/carro">
                            <h5>Mi Carro <span><?php echo $this->cart->total_items() ?></span> items  <!--<span>$390</span>--></h5>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <?php if (count($this->cart->contents()) > 0): ?>
                            <div class="cart-hover">
                                <ul class="header-cart-pro">
                                    <?php foreach ($this->cart->contents() as $items) : 
                                        $img=getImageCode($items['id']);
                                        
                                        ?>
                                        <li>
                                            <div class="image"><img alt="imagen item" src="<?php echo base_url('assets/frontend/img/code/') . $img ?>"></div>
                                            <div class="content fix" style="font-size: 11px;"><?php echo $items['name'] ?><!--<span class="price">Price: $130</span>--><span class="quantity">Cantidad: <?php echo $items['qty'] ?></span></div>
                                            <i class="fa fa-trash delete"></i>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="header-button-price">
                                    <a href="<?php echo base_url() ?>productos/carro"><i class="fa fa-sign-out"></i><span>Ir al Carro</span></a>
                                    <!--<div class="total-price"><h3>Total Price : <span>$390</span></h3></div>-->
                                </div>
                            </div>
                        <?php endif; ?> 
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!--End Header Area-->
<div class="menu-area"><!--Start Main Menu Area-->
    <div class="container">
        <div class="row">
            <div class="clo-md-12">
                <div class="main-menu hidden-sm hidden-xs">
                    <nav>
                        <ul>
                            <li><a href="<?php echo base_url() ?>" class="active">Home</a></li>
                            <li><a href="<?php echo base_url() ?>nuestras-marcas">Nuestras Marcas</a></li>

                            <li><a href="<?php echo base_url() ?>quienes-somos">Quienes Somos</a></li>


                            <?php if ($this->session->userdata('isLogued')) : ?>
                                <li><a href="<?php echo base_url() ?>productos/bicicletas/bicicletas/">Productos</a></li>
                            <?php endif; ?>

                            <li><a href="<?php echo base_url() ?>noticias">Noticias</a></li>
                            <li><a href="<?php echo base_url() ?>unete-al-equipo">Unete al Equipo</a></li>


                        </ul>
                    </nav>
                </div>
                <div class="mobile-menu hidden-md hidden-lg">
                    <nav>
                        <ul>
                            <li><a href="<?php echo base_url() ?>" class="active">Home</a></li>
                            <li><a href="<?php echo base_url() ?>nuestras-marcas">Nuestras Marcas</a></li>

                            <li><a href="">Quienes Somos</a></li>
                            <li><a href="<?php echo base_url() ?>mision">Mision</a></li>
                            <li><a href="">Noticias</a></li>
                            <li><a href="<?php echo base_url() ?>unete-al-equipo">Unete al Equipo</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><!--End Main Menu Area--> 