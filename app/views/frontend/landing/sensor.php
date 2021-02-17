<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GT - ALL-NEW SENSOR CARBON PRO</title>
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

            body{
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





            .form-news {
                width: 70%;
                margin-left: 33px;
                margin-bottom: 20px;
            }

            .logo-inter{
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
            .border-rigth{
                border-right: 1px solid #fff;
            }
            .border-top{
                border-top:  1px solid #fff;   
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
            .btn, btn:hover{
                border-radius: 0;


                color: #fff !important;
                font-size: 18px;
            }
            .left-35{
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
                padding: 15px 15px 20px 15px;
                background: rgb(216, 217, 218);
            }

            .bg-fields p{
                font-size: 20px;
                font-weight: 700;
                padding: 5px;
            }

            .bg-fields p span {
                font-size: 22px;
                font-weight: 700;
            }
            .neg-top {
                margin-top:20px;
            }
            .titulo-from{
                font-size: 20pt;
            }
            .footer {
                padding-top: 35px;
                padding-bottom: 35px;
                color: #fff;
                background: #0098CA;
            }
            .footer a {
                color:#fff
            }
            .footer img {
                padding-bottom: 25px;
            }
            .footer .ayuda{
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
            .alerts-wrap{
                color:red;
                font-size: 11px;
            }     
            .color-text-grey {
                color:#403F41
            } 
            .alternate-bg{
                background:  rgb(63, 64, 65);
                padding-bottom: 50px;
            }

            .video-container {
                position: relative;
                padding-bottom: 56.25%;
                padding-top: 30px;
                height: 0;
                overflow: hidden;
            }

            .video-container iframe, .video-container object, .video-container embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }



            .sensor-title {
                font-size: 25px;
                padding-top: 15px;
                text-align: center;
            }

            .sensor-titulo{
                font-size: 30px;
                text-align: center;
            }
            .sensor-box{
                position: absolute;top:0;right: 0;width: 80%;
            }  
            .sensor-text {
                text-align: left;
                font-size: 14px;
                margin-top: 10px;
            }  

            .new-logo-2019{
                width:30%; 
            }

            .img-bici{
                margin: 10px 0 10px 0;

            }

            .btn {
                margin: 15px 0 15px 0;
                border-radius: 50px;
                width: 100%;
            }

            .box-text {
                background-color: rgba(240, 198, 15, 0.7);
                width: 100%;
                font-size: 15px;
                color: #ffffff;
                text-align: left;
                top: 35%;
                right: 0;
                position: relative;
                padding-right: 7px;
                color: #000;

            }

            .box-text-01 {
                font-size: 20px;
                text-align: center;    
            }   

            .box-text-02 {
                font-size: 16px;
                text-align: center;
                margin-top: 0px;
            }

            .price-box{
                background-color: rgba(0, 0, 0, 0.2);
                width: 50%;
                font-size: 15px;
                color: #fff;
                text-align: left;
                top: 55%;
                right: 0;
                position: absolute;
                padding-right: 7px;
                color: #000;
            } 

            .price-box p {
                color: #fff;
            }

            /*==========  Mobile First Method  ==========*/
            /* Custom, iPhone Retina */ 
            @media only screen and (min-width : 320px) {
            }
            /* Extra Small Devices, Phones */ 
            @media only screen and (min-width : 480px) {
            }
            /* Small Devices, Tablets */
            @media only screen and (min-width : 768px) {

                .bg-menu {
                    background: #000;
                    min-height: 85px;
                }
            }
            /* Medium Devices, Desktops */
            @media only screen and (min-width : 992px) {
            }
            /* Large Devices, Wid Screens */
            @media only screen and (min-width : 1200px) {
                .sensor-title {
                    font-size: 40px;
                    padding-top: 15px;
                    text-align: left;

                }

                .neg-top {
                    margin-top:-50px;
                }
                .new-logo-2019{

                    width: 20%;
                    padding-top: 10px;
                }

                .box-text {

                    background-color: rgba(240, 198, 15, 0.7);
                    width: 69%;
                    font-size: 15px;
                    color: #ffffff;
                    text-align: left;

                    top:35%;
                    right: 0;
                    position: absolute;
                    padding-right: 7px;

                }
                .box-text-01 {
                    font-size: 46px;
                    text-align: right;    
                }
                .box-text-02 {
                    font-size: 16px;
                    text-align: right;
                    margin-top: -20px;
                }

            }





        </style>

    </head>

    <body>
        <div class="container">
            <div class="col-lg-12  bg-menu  ">
                <div class="col-lg-3 col-xs-6 logo"><img src="assets/frontend/img/landing/sensor/logo-GT.png" class="img-responsive"></div>
                <div class="col-lg-3 col-xs-6 logo" style="float: right;"><img src="assets/frontend/img/landing/sensor/logo-sensor.png" class="img-responsive" style="float: right;"></div>
            </div>
            <div class="col-lg-12 no-padding">
                <div class="col-lg-12 sensor-title"> El nuevo MTB Trail! All new SENSOR ! </div>
                <div class="col-lg-12 no-padding" style="height: 20px;background:#FFD101; "> </div> 
                <div class="col-lg-12 no-padding ">  
                    <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/hwL7Tcs7sLk?rel=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>

                </div>

            </div> 
            <div class="col-lg-12 no-padding" style="height: 20px;background:#FFD101; "> </div>


            <div class="col-lg-12 no-padding">
                <div class="col-lg-12" style="height: 20px;background:#FFD101; "> 

                    &nbsp;
                </div> 

                <div class="col-lg-6 ">
                    <div class="col-lg-8 sensor-title">PIDE TU DEMO </div>
                    <div class="col-lg-4 new-logo-2019 center-block ">
                        <img src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/logo_new-2019-modelo.png" alt="" class="img-responsive">
                    </div>
                    <div class="clearfix"></div>
                    <div  class="lefty-box">

                        <div class="sensor-text">
                            <li> All New Design, aro 29”, nuevo tubo acanalado, las líneas de freno y cambio van ocultas permitiendo una mantención más fácil.</li>
                        </div>
                        <div class="sensor-text">
                            <li> Recorrido 130 x 130 mm (Delantero y Trasero), ideal para Trail Puro.
                        </div>
                        <div class="sensor-text">
                            <li> Nuevo sistema LTS (Linkage Tuned Suspension) que aumenta la performance de frenado, mejora la absorción de impactos y la tracción.</li>
                        </div>
                        <div class="sensor-text">
                            <li> Flip Chip que permite ajuste de la geometría</li>
                        </div>


                    </div>

                </div>  
                <div class="col-lg-4 col-xs-12 col-lg-offset-2   animated bounceInRight"  >
                    <div class="">
                        <div class="bg-form text-center">
                            <p>CONSULTAS</p>
                        </div>
                        <div class="bg-fields">
                            <p class="text-center" style="font-size: 15px">
                                CONTÁCTANOS Y OBTÉN UN BENEFICIO.
                                EXCLUSIVO PARA INTERNET<br>
                                <span>+ 56 9 3227 7391</span>
                            </p>
                            <form>
                                <input type="hidden" name="<?php echo $csfr['csrfName'] ?>" value="<?php echo $csfr['csrfHash'] ?>" style="display:none;" />
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" placeholder="Nombre" type="text" name="nombre" id="nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control" placeholder="Telefono Ej:912345678" type="text" name="telefono" id="telefono" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input class="form-control" placeholder="Email" type="email" name="email" id="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-comment-o" ></i></span>
                                        <textarea name="" class="form-control" id="comentario" name="comentario" cols="30" rows="5" placeholder="Mensaje"></textarea>
                                    </div>
                                </div>

                                <button type="button" onclick="envio()"  class="btn btn-default" style="background: #000 !important ;width: 100%">ENVIAR</button>
                                <div class="clerfix"></div>
                                <div class="col-lg-12 alerts-wrap" style="margin-top: 5px;"></div>
                                <div class="clerfix"></div>
                            </form>
                        </div>  

                    </div>
                </div>

                <!--
                <div class="col-lg-8 no-padding">
                    <div class="col-lg-12 sensor-title ">
                        <span>IDEAL PARA TRAIL PURO</span>
                    </div>
                    <div class="col-lg-12 no-padding">
                        <div id="carousel-id" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/slider-1.jpg" width="100%" />
                                </div>
                                <div class="item">
                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/slider-2.jpg" width="100%"/>
                                </div>
                                <div class="item ">
                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/slider-3.jpg" width="100%" />
                                </div>
                            </div>
                            
                            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                </div>-->

            </div>
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
                    top:50%;
                    z-index: 10;
                    padding-top: 0%;
                    padding-bottom: 0px;
                    color: #fff;
                    text-align: center;
                    text-shadow: 0 1px 2px rgba(0,0,0,.6);
                    background: rgba(0,0,0,0.3);

                }

                .legales {

                    font-size: 11px;
                    position: absolute;
                    bottom: 0;
                    padding: 5px;
                }


            </style>
            <div class="clearfix"></div>
            <div class="col-lg-12 no-padding">  
                <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/all-new-sensor.jpg" alt="">
                <div class="box-text">
                    <p class="box-text-01">ALL-NEW SENSOR CARBON</p>
                    <p class="box-text-02">REDISEÑADA COMPLETAMENTE PARA EL TRAIL DE HOY <br/> PERMITE IR RÁPIDO Y ADEMÁS PASARLO BIEN </p>

                </div>
                <div class="carousel-caption-six-r hidden-xs hidden-xs  hidden-sm">
                    <div class="h4">Precio desde</div>
                    <div class="h2">$1.499.000</div>
                    <div class="h5">Versión Al Sport    </div>
                    <div class="h2">PRUEBALA</div>
                    <div class="h4">Y pide tu</div>
                    <div class="h2">DESCUENTO</div>
                    <div class="h4">Exclusivo</div>
                    <div class="legales">
                        <p>Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                    </div>
                </div>
            </div>

            <div class="caption-mobile hidden-lg hidden-md">
                <div class="h4 text-center">Precio desde</div>
                <div class="h2 text-center">$1.499.000</div>
                <div class="h5 text-center">Versión Al Sport </div>
                <div class="h2 text-center">PRUEBALA</div>
                <div class="h4 text-center">Y pide tu</div>
                <div class="h2 text-center">DESCUENTO</div>
                <div class="h4 text-center">Exclusivo</div>
                <div class="text-center">
                    <p style="font-size: 10px">Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-lg-12 no-padding">
                <div class="col-lg-12 sensor-title center-block " style="text-align: center;">
                    <span>ALL NEW DESIGN</span>
                </div>


                <div class="col-lg-12 img-bici ">
                    <img src="<?php echo base_url() ?>assets/frontend/img/landing/sensor/sensor_carbon_elite.png" alt="" class="img-responsive center-block">
                </div>  


            </div>
            <div class="clearfix"></div>         
            <div class="col-lg-12 no-padding " >

                <div class="col-lg-12 no-padding footer">
                    <div class="col-lg-2"><img src="assets/frontend/img/landing/force/gt-logo.png" class="img-responsive"></div>
                    <div class="col-lg-6">
                        <a class="text-center" href="https://www.gtbicycles.com/lat_es/bikes/mountain-fullsuspension/trail" target="_blank" style="font-size: 20px;  "> M&aacute;s informaci&oacute;n de este modelo aqu&iacute; </a>
                    </div>
                    <div class="clearfix"></div>

                </div>



            </div>
        </div>


        <!-- jQuery -->

        <script src="<?php echo base_url() ?>assets/frontend/js/jquery-2.1.4.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
        <!-- Bootstrap  -->
        <script src="<?php echo base_url() ?>assets/frontend/js/wow.min.js"></script>
        <script>
                                    new WOW().init();
        </script>

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

                        'modelo': 'GT-SENSOR',

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
    </body>

</html>

