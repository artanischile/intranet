<!DOCTYPE html>
<html lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GT - FORCE</title>
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Fonts CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css?family=Ruda:400,700,900" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url() ?>assets/frontend/css/animate.min.css" rel="stylesheet" />
        <style>
            body {
                font-family: 'Ruda', sans-serif;
            }

            .no-padding {
                padding-left: 0px;
                padding-right: 0px;
            }

            .clear {
                clear: both;
            }

            .bg-menu {
                background: #000;
                min-height: 42px;
            }

            .bg-section-1 {
                min-height: 410px;
                background-position: -625px;
            }

            .bg-section-2 {
                min-height: 702px;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .bg-section-3 {
                /*background-image: url('assets/frontend/img/jekill/bg-section-3.png');*/
                background: #E6FD36;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .bg-section-3-par {
                /*background-image: url('assets/frontend/img/jekill/bg-section-3.png');*/
                background: #fff;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .fill {
                width: 100%;
                height: 100%;
                background-position: center center;
                background-size: cover;
            }

            .logo {
                padding-top: 10px;
                margin-left: 0px;
            }

            .lo-quiero {
                font-size: 28pt;
                color: white;
                text-align: center;
            }

            .color-text-01-position {
                margin-top: 22px;
                text-align: center;
                padding-bottom: 25px;
            }

            .color-text-01 {
                color: rgb(89, 89, 91);
                font-weight: 700;
            }

            .color-text-white {
                color: #fff;
            }

            .color-text-grey {
                color: #1F1E21
            }

            .social-pad {
                padding-bottom: 53px;
            }

            .box {
                border: 1px solid #000;
            }

            .text-img {
                font-size: 16px;
                text-align: justify;
                margin-top: 15px;
                margin-bottom: 15px;
            }

            .carousel-indicators {
                bottom: -13px;
            }

            .box-text {
                background-color: rgba(240, 198, 15, 0.7);
                width: 100%;
                font-size: 10pt;
                color: #ffffff;
                text-align: center;
                padding: 4%;
            }

            .box-text-01 {
                font-size: 24px;
                color: #000;
            }

            .box-text-02 {
                color: #000;
                font-size: 16px;
                text-align: center;
            }

            .box-text .h2 {
                color: #E6FD36;
                font-weight: 700;
            }

            .text-razones {
                font-size: 20px;
                color: #000;
                text-align: center;
                margin-top: 3%;
                padding: 4%;
                line-height: 1;
                margin-top: 25px;
            }

            .pide-tu-test h1 {
                font-size: 25px;
                text-align: center;
            }

            .form-news {
                width: 70%;
                margin-left: 33px;
                margin-bottom: 20px;
            }

            .logo-inter {
                padding: 2%;
                background: #ffffff;
            }

            .texto-descriptivo {
                color: #fff;
                padding: 3%;
                font-size: 13px;
                text-align: center;
            }

            .border-left {
                border-left: none;
            }

            .border-rigth {
                border-right: 1px solid #fff;
            }

            .border-top {
                border-top: 1px solid #fff;
            }

            .input-group-addon {
                border-radius: 0px;
                border: none;
            }

            .form-control {
                height: 45px;
                border: none;
                border-radius: 0px;
            }

            .btn,
            btn:hover {
                border-radius: 0;
                color: #fff !important;
                font-size: 18px;
            }

            .left-35 {
                margin-left: 0;
            }

            .bg-form {
                font-size: 20pt;
                padding-top: 10px;
                padding-bottom: 5px;
                background: #000000;
                color: #ffffff;
            }

            .bg-fields {
                padding: 15px 15px 53px 15px;
                background: rgb(216, 217, 218);
            }

            .bg-fields p {
                font-size: 20px;
                font-weight: 700;
                padding: 5px;
            }

            .bg-fields p span {
                font-size: 22px;
                font-weight: 700;
            }

            .neg-top {
                margin-top: 30px;
            }

            .titulo-from {
                font-size: 20pt;
            }

            .footer {
                padding-top: 35px;
                padding-bottom: 35px;
                color: #fff;
                background: #0098CA;
            }

            .footer a {
                color: #fff
            }

            .footer img {
                padding-bottom: 25px;
            }

            .footer .ayuda {
                font-size: 12px;
                text-align: center;
                padding-bottom: 10px;
            }

            .footer .social {
                width: 15%;
                float: left;
                border: 1px solid #fff;
                text-align: center;
                margin-right: 2px;
                padding-top: 6px;
                padding-bottom: 2px;
                text-align: center;
            }

            .footer .social:hover {
                background: #FF7100;
            }

            .alerts-wrap {
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .txt-footer-address {
                color: white;
                text-align: center;
                font-size: 12px;
                width: 55%;
                margin: 0 auto !important;
                display: block;
            }

            .footer .titulo {
                padding-bottom: 0;
                font-size: 16px;
                text-align: center;
            }

            .alerts-wrap {
                color: red;
                font-size: 11px;
            }

            .color-text-grey {
                color: #403F41
            }

            .alternate-bg {
                background: rgb(63, 64, 65);
                padding-bottom: 50px;
            }

            .bici-box {
                padding-top: 7px;
                padding-bottom: 18px;
                margin-bottom: 25px;
            }

            .bici-box h2 {
                font-size: 18px;
                text-align: center;
            }

            .bici-box p {
                font-size: 15px;
                text-align: center;
            }

            .logo-in-form {
                margin-top: 50px;
                background: #000;
                padding: 15px;
            }

            .video-container {
                position: relative;
                padding-bottom: 56.25%;
                padding-top: 30px;
                height: 0;
                overflow: hidden;
            }

            .video-container iframe,
            .video-container object,
            .video-container embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            /*==========  Mobile First Method  ==========*/
            /* Custom, iPhone Retina */

            @media only screen and (min-width: 320px) {}
            /* Extra Small Devices, Phones */

            @media only screen and (min-width: 480px) {}
            /* Small Devices, Tablets */

            @media only screen and (min-width: 768px) {
                .bg-section-1 {
                    min-height: 410px;
                    background-position: -274px;
                }
                .bg-menu {
                    background: #000;
                    min-height: 85px;
                }
            }
            /* Medium Devices, Desktops */

            @media only screen and (min-width: 992px) {}
            /* Large Devices, Wid Screens */

            @media only screen and (min-width: 1200px) {
                .box-text-01 {
                    font-size: 28px;
                    color: #000;
                }
                .box-text-02 {
                    color: #000;
                    font-size: 16px;
                    text-align: left;
                }
                .box-text {
                    position: absolute;
                }
                .text-razones {
                    font-size: 25pt;
                    color: #ffffff;
                    text-align: center;
                    margin-top: 3%;
                    padding: 4%;
                    line-height: 1;
                }
                .pide-tu-test h1 {
                    font-size: 36px;
                    text-align: left;
                }
                .bg-menu {
                    background: #000;
                    min-height: 120px;
                }
                .bg-section-1 {
                    min-height: 656px;
                    background-position: left top;
                }
                .logo {
                    padding-top: 27px;
                    margin-left: 0px;
                }
                .social-pad {
                    padding-bottom: 10px;
                }
                .form-news {
                    width: 70%;
                    margin-left: 0;
                    margin-bottom: 0;
                }
                .footer .titulo {
                    padding-bottom: 20px;
                    font-size: 16px;
                    text-align: left;
                }
                .footer .ayuda {
                    font-size: 12px;
                    text-align: left;
                    padding-bottom: 0;
                }
                .lo-quiero {
                    font-size: 50pt;
                    color: white;
                    text-align: left;
                }
                .color-text-01-position {
                    margin-top: 66px;
                    text-align: left;
                    padding-bottom: 0;
                }
                .bg-section-2 {
                    background-position: left top;
                    background-size: contain;
                }
                .neg-top {
                    margin-top: -143px;
                }
                .texto-descriptivo {
                    color: #fff;
                    padding: 3%;
                    font-size: 12px;
                    text-align: justify;
                    font-weight: 700;
                }
                .border-left {
                    border-left: 1px solid #fff;
                }
                .left-35 {
                    margin-left: 40px;
                }
                .neg-top {
                    margin-top: -143px;
                }
                .box-text {
                    background-color: rgba(240, 198, 15, 0.7);
                    width: 55%;
                    font-size: 15px;
                    color: #ffffff;
                    text-align: left;
                    padding: 2% 2% 2% 7%;
                    bottom: 220px;
                    right: 0;
                }
                .text-razones {
                    font-size: 19pt;
                    color: #000;
                    text-align: left;
                    margin-top: 3%;
                    padding: 0;
                    line-height: 1;
                    font-weight: 600;
                    text-align: center;
                }
                .bici-box {
                    padding-top: 25px;
                    padding-bottom: 18px;
                    margin-bottom: 25px;
                }
                .bici-box h2 {
                    font-size: 25px;
                    text-align: center;
                }
                .bici-box p {
                    font-size: 18px;
                    text-align: center;
                }
                .logo-in-form {
                    margin-top: 50px;
                    background: none;
                    padding: 0;
                }
            }
        </style>

        <script>

            function envio() {
                if ($('#nombre').val() == '') {
                    $('.alerts-wrap').html('Ingrese Nombre y Apellido');
                    return false;
                }
                if ($('#telefono').val() == '') {
                    $('.alerts-wrap').html('Ingrese T&eacute;fono de contacto');
                    return false;
                }

                if ($('#email').val() == '') {
                    $('.alerts-wrap').html('Ingrese correo electronico valido');
                    return false;
                }

                $.ajax({
                    type: "POST",
                    data: {
                        'nombre': $("#nombre").val(),
                        'telefono': $("#telefono").val(),
                        'email': $("#email").val(),
                        'comentario': $("#comentario").val(),
                        'modelo': 'GT-FORCE',
                        'csrf_token': $("input[name=csrf_token]").val(),
                    },
                    dataType: 'json',
                    url: '<?php echo base_url() ?>jekill/registro',
                    beforeSend: function () {
                        //$('#btn-sb').attr("disabled","disabled");
                    },
                    success: function (data) {
                        if (data.succes == 'succes') {
                            $('.alerts-wrap').html(data.msg);
                            $("#nombre").val('');
                            $("#telefono").val('');
                            $("#email").val('');
                            $("#comentario").val('');
                        } else {

                            if (data.nombre != '') {
                                $('.alerts-wrap').html(data.nombre);
                                return false;
                            }
                            if (data.telefono != '') {
                                $('.alerts-wrap').html(data.telefono);
                                return false;
                            }
                            if (data.email != '') {
                                $('.alerts-wrap').html(data.email);
                                return false;
                            }
                            //$('.alerts-wrap').html('Error,  intentelo nuevamente mas tarde').delay(5000).fadeOut();
                            $("#nombre").val('');
                            $("#telefono").val('');
                            $("#email").val('');
                            $("#comentario").val('');
                        }
                    },
                })
            }







        </script>   
    </head>

    <body>
        <div class="container">
            <div class="col-lg-12  bg-menu  ">
                <div class="col-lg-3 col-xs-6 logo"><img src="assets/frontend/img/landing/force/gt-logo.png" class="img-responsive"></div>
                <div class="col-lg-3 col-xs-6 logo" style="float: right;"><img src="assets/frontend/img/landing/force/force-logo.png" class="img-responsive" style="float: right;"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 no-padding bg-section-3 alternate-bg " style=" background: #fff !important;">
                <div class="pide-tu-test">
                    <h1>El nuevo Enduro! All new FORCE !</h1> 
                    <div class="video-container">
                        <iframe frameborder="0" width="560" height="315" src="https://www.youtube.com/embed/_bO3uVdUA8A?rel=0&autoplay=1" rebordeador="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="clearfix"></div>
                <style>
                    .h1,.h2,.h3,.h4,.h5,.h6{
        font-weight: 700;
    }
                    .carousel-caption-six {

                        position: absolute;
                        right: 75%;
                        bottom: 0;
                        left: 0;
                        top:0;
                        z-index: 10;
                        padding-top: 20%;
                        padding-bottom: 0px;
                        color: #fff;
                        text-align: center;
                        text-shadow: 0 1px 2px rgba(0,0,0,.6);
                        background: rgba(0,0,0,0.5);


                    }

                    .carousel-caption-six-r {

                        position: absolute;
                        right: 0;
                        bottom: 0;
                        left: 75%;
                        top:0;
                        z-index: 10;
                        padding-top: 20%;
                        padding-bottom: 0px;
                        color: #fff;
                        text-align: center;
                        text-shadow: 0 1px 2px rgba(0,0,0,.6);
                        background: rgba(0,0,0,0.5);

                    }

                    .legales {

                        font-size: 11px;
                        position: absolute;
                        bottom: 0;
                        padding: 5px;
                    }


                </style>
                <!-- c --->
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active" style="position:relative"> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/force/banner-1.jpg"> 
                            <div class="box-text">
                                <p class="box-text-01">ALL-NEW FORCE CARBON</p>
                                <p class="box-text-02">DESARROLLADA PARA PILOTOS QUE BUSCAN GRANDES LOGROS Y LA EMOCIÓN DE GRAVEDAD. LA RENOVADA FORCE ESTÁ CONSTRUIDA PARA TODO</p>
                            </div>
                             <div class="carousel-caption-six hidden-xs hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$1.999.999</div>
                                <div class="h5">Versión Al Comp.</div>
                                <div class="h2">PRUEBALA</div>
                                <div class="h4">Y pide tu</div>
                                <div class="h2">DESCUENTO</div>
                                <div class="h4">Exclusivo</div>
                                <div class="legales">
                                    <p>Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item"> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/force/banner-2.jpg" />
                            <div class="box-text">
                                <p class="box-text-01">ALL-NEW FORCE CARBON</p>
                                <p class="box-text-02" style="text-transform:uppercase">Ideal para quienes disfrutan el Enduro.</p>
                            </div>

                             <div class="carousel-caption-six hidden-xs hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$1.999.999</div>
                                <div class="h5">Versión Carb Ultegra</div>
                                <div class="h2">PRUEBALA</div>
                                <div class="h4">Y pide tu</div>
                                <div class="h2">DESCUENTO</div>
                                <div class="h4">Exclusivo</div>
                                <div class="legales">
                                    <p>Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                                </div>
                            </div>

                        </div>
                        <div class="item "> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/force/banner-3.jpg"> 
                            <div class="box-text">
                                <p class="box-text-01">ALL-NEW FORCE CARBON</p>
                                <p class="box-text-02" style="text-transform:uppercase">Ideal para enduro, all new design y nuevos colores.</p>
                            </div>
                             <div class="carousel-caption-six hidden-xs hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$1.999.999</div>
                                <div class="h5">Versión Carb Ultegra</div>
                                <div class="h2">PRUEBALA</div>
                                <div class="h4">Y pide tu</div>
                                <div class="h2">DESCUENTO</div>
                                <div class="h4">Exclusivo</div>
                                <div class="legales">
                                    <p>Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- fin c -->

                <div class="caption-mobile hidden-lg hidden-md">
                    <div class="h4 text-center">Precio desde</div>
                    <div class="h2 text-center">$1.999.999</div>
                    <div class="h5 text-center">Versión Al Comp. </div>
                    <div class="h2 text-center">PRUEBALA</div>
                    <div class="h4 text-center">Y pide tu</div>
                    <div class="h2 text-center">DESCUENTO</div>
                    <div class="h4 text-center">Exclusivo</div>
                    <div class="text-center">
                        <p style="font-size: 10px">Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                    </div>
                </div>


                <div class="col-lg-12 bg-section-2 no-padding">
                    <div class="col-lg-8 hidden-xs hidden-md hidden-sm">
                        <div class="col-lg-9 text-razones">PIDE TU DEMO</div>
                        <div class="col-lg-3"><img src="<?php echo base_url() ?>assets/frontend/img/landing/force/logo_new-2019-modelo.png" alt="" class="img-responsive center-block"></div>
                        <div class="the_box" style="margin-bottom:325px">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-1.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 ">
                                <p class="text-img">Nuevo sistema LTS (Linkage Tuned Suspension) con Flip Chip que permite ajuste de geometría. Recorrido delantero 160 mm, recorrido trasero 150 mm.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="the_box" style="margin-bottom:175px">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-2.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 text-img">
                                <p>Ideal para iniciarse en el Enduro</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="the_box" style="margin-bottom:150px">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-3.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 text-img">
                                <p>Nuevo tubo acanalado, las líneas van ocultas, cambios y frenos. Permitiendo una mecánica más fácil y un cuadro más robusto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-12   animated bounceInRight">
                        <div class="neg-top">
                            <div class="bg-form text-center">
                                <p>CONSULTAS</p>
                            </div>
                            <div class="bg-fields">
                                <p class="text-center" style="font-size: 15px"> CONTÁCTANOS Y OBTÉN UN BENEFICIO. EXCLUSIVO PARA INTERNET
                                    <br> <span>+ 56 9 3227 7391</span> </p>
                                <form>
                                    <input type="hidden" name="<?php echo $csfr['csrfName'] ?>" value="<?php echo $csfr['csrfHash'] ?>" style="display:none;" />
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input class="form-control" placeholder="Nombre" type="text" name="nombre" id="nombre" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input class="form-control" placeholder="Telefono Ej:912345678" type="text" name="telefono" id="telefono" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" placeholder="Email" type="email" name="email" id="email" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-comment-o" ></i></span>
                                            <textarea name="" class="form-control" id="comentario" name="comentario" cols="30" rows="5" placeholder="Mensaje"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" onclick="envio()" class="btn btn-default" style="background: #000 !important ;width: 100%">ENVIAR</button>
                                    <div class="clerfix"></div>
                                    <div class="col-lg-12 alerts-wrap" style="margin-top: 5px;"></div>
                                    <div class="clerfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-8  hidden-lg ">
                        <div class="col-lg-9 text-razones"> IDEAL PARA TRAIL ALL DAY / ALL MOUNTAINBIKE Y PARA QUIENES SE INICIAN EN EL ENDURO </div>
                        <div class="col-lg-3 col-xs-12" style="margin-top: 15px;margin-bottom: 15px;"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/logo_new-2019-modelo.png" alt="" class="img-responsive center-block"> </div>
                        <div class="clearfix"></div>
                        <div class="the_box">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-1.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 no-padding ">
                                <p class="text-img">Nuevo sistema LTS (Linkage Tuned Suspension) con Flip Chip exclusivo de GT que permite ajuste de geometría, más corta o más baja. Recorrido delantero 160 mm, recorrido trasero 150 mm.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="the_box">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-2.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 text-img no-padding">
                                <p>Ideal para Trail All Day / All Mountainbike y para Enduro de quienes se inician. All new design, nuevos colores.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="the_box">
                            <div class="col-lg-6 box no-padding"> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/detalle-3.jpg" alt="" class="img-responsive"> </div>
                            <div class="col-lg-6 text-img no-padding">
                                <p>Nuevo tubo acanalado, las líneas van ocultas, cambios y frenos. Permitiendo una mecánica más fácil y un cuadro más robusto.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--<div class="col-lg-12 bg-section-3 alternate-bg " style=" background: #fff !important;">
                    <div class="pide-tu-test">
                        <h1>PIDE TU DEMO TEST</h1> </div>
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/_bO3uVdUA8A?rel=0" rebordeador="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>-->
                <div class="clearfix"></div>
                <div class="col-lg-12 bg-section-3 alternate-bg pide-tu-test" style=" background: #fff !important;">
                    <div>
                        <h1>FORCE CARBON PRO</h1> </div>
                    <div> <img src="<?php echo base_url() ?>assets/frontend/img/landing/force/force_carbon_expert.png" class="img-responsive center-block" alt=""> </div>
                    <div class="text-center">
                        <!-- <button type="button" class="btn btn-primary btn-lg">LA QUIERO</button> -->
                    </div>
                </div>
                <style>
                    .bag {
                        background: #0098CA;
                        border: 1px solid #fff;
                    }

                    .col-lg-off {
                        margin-left: 5%;
                    }
                </style>
                <div class="col-lg-12 no-padding ">
                    <div class="col-lg-12 no-padding footer">
                        <div class="col-lg-2"><img src="assets/frontend/img/landing/force/gt-logo.png" class="img-responsive"></div>
                        <div class="col-lg-6">
                            <a class="text-center" href="https://www.gtbicycles.com/lat_es/bikes/mountain-fullsuspension/all-mountain" target="_blank" style="font-size: 20px;  "> M&aacute;s informaci&oacute;n de este modelo aqu&iacute; </a>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="col-lg-12 no-padding" style="background: #242424">
                      <!--  <div class="footer-metodospago text-center" style="padding-top: 15px;"> <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/pagos_web.png" alt="" class="img-responsive center-block"> <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/logo-servipag.png" class="img-responsive center-block" alt="" width="80"> </div>
                        <div>
                            <p class="txt-footer-address"> © Intercycles <span id="currentYear">2018</span>, Chile. Se reserva el derecho a cambiar la información contenida en este sitio sin previo aviso, incluyendo precios, especificaciones e imágenes. </strong>
                                </a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- ./Footer -->
            <!-- jQuery -->
            <script src="<?php echo base_url() ?>assets/frontend/js/jquery-2.1.4.min.js"></script>
            <!-- Bootstrap JavaScript -->
            <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
            <!-- Bootstrap  -->
            <script src="<?php echo base_url() ?>assets/frontend/js/wow.min.js"></script>
            <script>
                                        new WOW().init();
            </script>
    </body>

</html>