<!DOCTYPE html>
<html lang="">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CANNONDALE - SYSTEMSIX </title>
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Fonts CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/frontend/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css?family=Ruda:400,700,900" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url() ?>assets/frontend/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/frontend/js/plugins/slick/slick.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/frontend/js/plugins/slick/slick-theme.css" rel="stylesheet" />
        <style>
            body{
                font-family: 'Ruda', sans-serif;
            }
            .no-padding {
                padding-left: 0px;
                padding-right: 0px;
            }
            .logo {
                padding-top: 0px;
                margin-left: 0px;
            }
            .clear {
                clear: both;
            }
            .bg-menu {
                background: #000;
                min-height: 83px;
            }
            .bg-section-1 {
                min-height: 410px;
                background-position: -625px;
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

            .box-text-02{
                color: #000;
                font-size: 16px;
                text-align: center;
            }

            .box-text .h2 {
                color:#E6FD36;
                font-weight: 700;
            }

            .form-news {
                width: 70%;
                margin-left: 33px;
                margin-bottom: 20px;
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

                padding: 15px 15px 53px 15px;

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

                margin-top:30px;

            }

            .titulo-from{

                font-size: 20pt;

            }

            .footer {

                padding-top: 35px;

                padding-bottom: 0px;

                color: #fff;

                background: #000;

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



            .slick-prev-img, .slick-next-img {

                background: transparent none repeat scroll 0 0;

                border: medium none;

                color: transparent;

                cursor: pointer;

                display: block;

                font-size: 0;

                height: 70px;

                line-height: 0;

                outline: medium none;

                padding: 0;

                position: absolute;

                top: 40%;

                transform: translate(0px, -50%);

                width: 14px;

                z-index: 10;

            }

            .slick-prev-img img, .slick-next-img img {

                width: 25px;

                height: 50px;

            }

            .slick-next-img {

                right: 15px;

                z-index: 150;

            }



            .lefty-titulo{

                font-size: 30px;

                text-align: center;

            }

            .lefty-box{

                position: relative;top:0;right: 0;width: 100%;

            }  

            .lefty-tetx {

                text-align: center;

                font-size: 18px;

                margin-top: 35px;

            }  



            .si_title{

                font-size: 46px;

                position: absolute;

                color: #fff;

                top: 0;

                padding: 0 15px 0 15px;

            }

            .si_campeon {

                font-size: 17px;

                position: absolute;

                color: #fff;

                top: 30%;

                padding: 0 15px 0 15px;

                left: 10%;

            }



            .scalpel_title {



                font-size: 37px;

                color: #000;

                text-align: center;

                padding: 0 15px 0 15px;



            }

            .scalpel_text{

                font-size: 18px;

                color: #000;

                text-align: center;

                padding: 0 15px 0 15px;

            }

            .scalpel_text_02 {

                font-size: 13px;

                color: #000;

                text-align: center;

                padding: 0 15px 0 15px;

            }



            .h1, h1 {

                font-size: 22px;

            }



            .left-btn-btn{

                border-radius:25px;padding-left: 50px;padding-right: 50px;margin-bottom: 20px;

            }



            .system-form {

                float: right;position: relative;right: 1%;bottom:  -2%;z-index: 500;

                margin-bottom: 30px;;

            }



            .padding-row-top-bot {

                padding-top: 50px;

                padding-bottom: 50px;

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



            }

            /* Medium Devices, Desktops */

            @media only screen and (min-width : 992px) {

            }

            /* Large Devices, Wid Screens */

            @media only screen and (min-width : 1200px) {

                .padding-row-top-bot {

                    padding-top: 50px;

                    padding-bottom: 50px;

                }

                .slick-prev-img img, .slick-next-img img {

                    width: 25px;

                    height: 50px;

                }



                .ficha-proyectos-plantas .slick-prev-img {

                    left: -62px;

                }

                .slick-next-img {

                    right: 0px;

                    z-index: 150;

                }



                .slick-prev-img, .slick-next-img {

                    background: transparent none repeat scroll 0 0;

                    border: medium none;

                    color: transparent;

                    cursor: pointer;

                    display: block;

                    font-size: 0;

                    height: 70px;

                    line-height: 0;

                    outline: medium none;

                    padding: 0;

                    position: absolute;

                    top: 40%;

                    transform: translate(0px, -50%);

                    width: 14px;

                    z-index: 10;

                }

                .box-text-01 {

                    font-size: 28px;

                    color: #000;

                }

                .box-text-02{

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

                    margin-bottom: 3%;

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

                .bg-section-1{

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

                    margin-top: 0;

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

                .left-35{

                    margin-left: 40px;

                }



                .box-text {

                    background-color: rgba(240, 198, 15, 0.7);

                    width: 55%;

                    font-size: 15px;

                    color: #ffffff;

                    text-align: left;

                    padding: 2% 2% 2% 7%;

                    bottom: 220px;

                    right:  0;

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

                .lefty-titulo{

                    font-size: 30px;

                    text-align: center;

                }

                .lefty-box{

                    width: 100%;

                    margin-top: 15% ;

                }  

                .lefty-tetx {

                    text-align: center;

                    font-size: 18px;

                    margin-top: 35px;

                }  

                .lefty-btn {

                    position: absolute;

                    top: 60%;

                    right: 10%;

                    width: 12%;

                }

                .left-btn-btn{

                    border-radius:25px;padding-left: 50px;padding-right: 50px;margin-bottom: 20px;

                }



                .si_title{

                    font-size: 42px;

                    position: absolute;

                    color: #fff;

                    top: 0;

                    padding: 0 15px 0 15px;

                    text-align: center;

                }

                .si_campeon {

                    font-size: 17px;

                    position: absolute;

                    color: #fff;

                    top: 30%;

                    padding: 0 15px 0 15px;

                    left: 10%;

                }



                .scalpel_title{

                    font-size: 90px;

                    color: #000;

                    text-align: center;

                    padding: 0 15px 0 15px;

                }

                .scalpel_text{

                    font-size: 26px;

                    color: #000;

                    text-align: left;

                    padding: 0 15px 0 15px;

                }

                .scalpel_text_02{

                    font-size: 16px;

                    color: #000;

                    text-align: center;

                    padding: 15px 15px 0 15px;

                }

                .h1, h1 {

                    font-size: 36px;

                }



                .system-form {

                    float: right;position: absolute;right: 1%;bottom:  -2%;z-index: 500;

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

                        'modelo': 'Cannondale SystemSix',

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

        <style type="text/css" media="screen">



        </style>  

    </head>



    <body>

        <div class="container">

            <div class="col-lg-12  bg-menu  ">

                <div class="col-lg-3 col-xs-12 logo "><img src="<?php echo base_url() ?>assets/frontend/img/landing/fsi/logo-cannondale.png" class="img-responsive"></div>

            </div>

            <div class="col-lg-12 no-padding bg-section-3 alternate-bg " style=" background: #fff !important;">

                <div class="pide-tu-test">

                    <h1>La bicicleta de ruta más rápida del mundo (Aprobado por la UCI.)

                    </h1> </div>

                <div class="video-container">

                    <iframe frameborder="0" width="560" height="315" src="https://www.youtube.com/embed/iippxzyrm8A?rel=0&autoplay=1" rebordeador="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                </div>

            </div>



            <div class="col-lg-12 no-padding padding-row-top-bot">

                <div class="col-lg-8 no-padding ">

                    <div class="col-lg-12 no-padding">

                        <img src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/detalle-1.jpg" alt="" class="img-responsive">

                    </div>

                    <div class="col-lg-12">

                        <p class="scalpel_text_02 ">

                            Un diseño totalmente system-integration que entrega potencia en cualquier situación, dejará satisfechos incluso a los más fanáticos de la velocidad.



                        </p>

                    </div>

                    <div class="col-lg-12 no-padding">

                        <img src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/detalle-2.jpg" alt="" class="img-responsive">

                    </div>

                    <div class="col-lg-12">

                        <p class="scalpel_text_02 ">

                            TECNOLOGÍAS INTEGRADAS CANNONDALE, MANUBRIO-TEE, TUBO DE ASIENTO-CUADRO



                        </p>

                    </div>

                    <div class="col-lg-12 no-padding">

                        <img src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/detalle-3.jpg" alt="" class="img-responsive">

                    </div>



                    <div class="col-lg-12">

                        <p class="scalpel_text_02 ">

                            CABLEADO INTERNO, FÁCIL REGULACIÓN DE MANUBRIO, DISEÑO DE VANGUARDIA 



                        </p>

                    </div>

                </div>



                <div class="col-lg-4 col-xs-12   animated bounceInRight "   >

                    <div class="neg-top"  >

                        <div class="bg-form text-center">

                            <p>CONSULTAS</p>

                        </div>

                        <div class="bg-fields" >

                            <p class="text-center" style="font-size: 15px">

                                CONT&Aacute;CTANOS Y OBT&Eacute;N UN BENEFICIO.

                                EXCLUSIVO PARA INTERNET<br>

                                <span>+ 56 9  3227 7391</span>

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

                                        <input class="form-control" placeholder="Teléfono Ej:912345678" type="text" name="telefono" id="telefono" required>

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

            <div class="clearfix " > </div>

            <div class="col-lg-12 no-padding padding-row-top-bot">

                <!-- c --->

                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active"> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/Banner-systemsix-1.jpg"> 
                            <div class="carousel-caption-six hidden-xs hidden-xs  hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$3.599.000</div>
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
                        <div class="item"> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/Banner-systemsix-2.jpg" /> 
                            <div class="carousel-caption-six-r hidden-xs hidden-xs  hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$3.599.000</div>
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
                        <div class="item "> <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/Banner-systemsix-3.jpg"> 
                            <div class="carousel-caption-six hidden-xs hidden-sm">
                                <div class="h4">Precio desde</div>
                                <div class="h2">$3.599.000</div>
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
                <div class="caption-mobile hidden-lg hidden-md">
                    <div class="h4 text-center">Precio desde</div>
                    <div class="h2 text-center">$3.599.000</div>
                    <div class="h5 text-center">Versión Carb Ultegra</div>
                    <div class="h2 text-center">PRUEBALA</div>
                    <div class="h4 text-center">Y pide tu</div>
                    <div class="h2 text-center">DESCUENTO</div>
                    <div class="h4 text-center">Exclusivo</div>
                    <div class="text-center">
                        <p style="font-size: 10px">Precio corresponde solo al modelo y versión indicado y no necesariamente a la foto presentada que solo es de carácter referencial.<br>Precio válido hasta el 28 de febrero de 2019.</p>
                    </div>
                </div>


                <!-- fin c -->
            </div> 
            <div class="clearfix"></div>













            <div class="clearfix"></div>  

            <div class="col-lg-12 no-padding bg-section-3 alternate-bg " style=" background: #fff !important;position: relative;margin-bottom:20px;padding-top: 20px;">

                <div  class="pide-tu-test " style="background: #000;color:#fff;padding: 10px;">

                    <h1 style="text-align: center">SYSTEMSIX Ultegra Di2</h1>   

                </div> 

                <div class="col-lg-12" style="margin-top: 20px">

                    <img src="<?php echo base_url() ?>assets/frontend/img/landing/systemsix/Systemsix_DA_Di2.png" class="img-responsive" alt="">

                </div>



            </div>  

            <div class="clearfix"></div> 





            <style>

                .bag{

                    background:#0098CA ;

                    border:1px solid #fff;

                }



                .col-lg-off {

                    margin-left: 5%;

                }



            </style>



            <div class="col-lg-12 no-padding " >



                <div class="col-lg-12 no-padding footer" >



                    <div class="col-lg-3"><img src="assets/frontend/img/logo.png" class="img-responsive" /></div>



                    <div class="col-lg-6">

                        <a class="text-center" href="https://www.cannondale.com/es-ES/Latin%20America/Products/ProductCategory.aspx?nid=10b39029-ba06-4c65-bb06-162a3fd5afea" target="_blank" style="font-size: 20px;  "> Más información de este modelo aquí </a>

                    </div>

                    <div class="clearfix"></div>

                    <?php /* ?>

                      <div class="col-lg-2 col-lg-off ">



                      <div class="titulo">NOSOTROS</div>



                      <div class="ayuda"><a href="https://www.intercycles.cl/nuestras-tiendas">Nuestras Tiendas</a></div>



                      </div>







                      <div class="col-lg-2">



                      <div class="titulo">SERVICIO AL CLIENTE</div>



                      <div class="ayuda"><a href="https://www.intercycles.cl/contactanos">ContÃ¡ctanos</a></div>



                      </div>







                      <div class="col-lg-4">



                      <div class="titulo">NEWSLETTER</div>



                      <p>Registrate para recibir novedades y ofertas</p>



                      <div class="input-group input-group-sm form-news">



                      <input class="form-control" type="text">



                      <span class="input-group-btn">



                      <button type="button" class="btn btn-info btn-flat bag">Suscribirse</button>



                      </span>



                      </div>



                      <div class="clearfix"></div>



                      </div>



                      <div class="col-lg-3">



                      <div class="titulo">AYUDA</div>



                      <div class="ayuda"><i class="fa fa-phone" ></i>&nbsp;&nbsp;<a href="tel:+56976188913">Tienda Online +569 3 2277392</a></div>



                      <div class="ayuda"><i class="fa fa-phone" ></i>&nbsp;&nbsp;<a href="tel:+56981615090">Servicio al Cliente +569 81615090</a></div>



                      <div class="ayuda"><i class="fa fa-phone" ></i>&nbsp;&nbsp;<a href="tel:+562 2170501">Servicio TÃ©cnico +562 22170501</a></div>



                      <div class="ayuda"><i class="fa fa-clock-o" ></i>&nbsp;&nbsp; Horario Lunes a Viernes 10:00 a 20:00 Hrs.</div>



                      <div class="ayuda"><i class="fa fa-envelope" ></i>&nbsp;&nbsp;<a href="tel:+56976188913">Tienda Online +569 3 2277392</a></div>



                      </div>











                      <div class="clearfix"></div>







                      <div class="col-lg-3 social-pad" >



                      <div class="social"><a tittle="Intercycles Facebook" target="_blank" href="https://www.facebook.com/intercycles/"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></div>



                      <div class="social"><a tittle="Intercycles Instagram" target="_blank" href="https://www.instagram.com/intercycles/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>







                      </div>



                      <?php */ ?>



                </div>



                <div class="col-lg-12 no-padding" style="background: #242424">



                    <!--

    

                        <div class="footer-metodospago text-center" style="padding-top: 15px;">

    

                            <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/pagos_web.png" alt="" class="img-responsive center-block"> <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/logo-servipag.png" class="img-responsive center-block" alt="" width="80">

    

                        </div>

    

                        <div>

    

                            <p class="txt-footer-address">

    

                               © Intercycles <span id="currentYear">2018</span>, Chile. Se reserva el derecho a cambiar la información contenida en este sitio sin previo aviso, incluyendo precios, especificaciones e imagenes. </strong></a>

    

                            </p>

    

                        </div> -->



                </div>

            </div>

        </div>



        <!-- jQuery -->

        <script src="<?php echo base_url() ?>assets/frontend/js/jquery-2.1.4.min.js"></script>

        <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/frontend/js/wow.min.js"></script>

        <script src="<?php echo base_url() ?>assets/frontend/js/plugins/slick/slick.min.js"></script>

        <script>

                                    new WOW().init();



                                    $(function () {

                                        $('.responsive').slick({

                                            dots: true,

                                            infinite: false,

                                            speed: 300,

                                            slidesToShow: 2,

                                            slidesToScroll: 2,

                                            prevArrow: '<div  class="slick-prev-img slick-arrow"><img   src="<?php echo base_url() ?>/assets/frontend/img/sliderFlechaIzqGr.png"  ></div>',

                                            nextArrow: '<div  class="slick-next-img slick-arrow"><img  src="<?php echo base_url() ?>/assets/frontend/img/sliderFlechaDerGr.png"></div>',

                                            responsive: [

                                                {

                                                    breakpoint: 1024,

                                                    settings: {

                                                        slidesToShow: 3,

                                                        slidesToScroll: 3,

                                                        infinite: true,

                                                        dots: true,

                                                        rows: false,

                                                    }

                                                },

                                                {

                                                    breakpoint: 600,

                                                    settings: {

                                                        slidesToShow: 2,

                                                        slidesToScroll: 2,

                                                        rows: false,

                                                    }

                                                },

                                                {

                                                    breakpoint: 480,

                                                    settings: {

                                                        slidesToShow: 1,

                                                        slidesToScroll: 1,

                                                        arrows: false,

                                                    }

                                                }

                                                // You can unslick at a given breakpoint now by adding:

                                                // settings: "unslick"

                                                // instead of a settings object

                                            ]

                                        });

                                    });





        </script>

    </body>



</html>



