<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CANNONDALE - SCALPEL</title>

        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/frontend/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ruda:400,700,900" rel="stylesheet">

       
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
    background-image: url('assets/frontend/img/scapel/BG.png');
    background: #000;
    min-height: 120px;
}





.bg-section-1 {
    background-image: url('assets/frontend/img/scalpel/BAN-01.jpg');
    min-height: 410px;
    background-position: -625px;
}




.bg-section-2 {
    background-image: url('assets/frontend/img/scalpel/BANN-02.jpg');
    min-height: 702px;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
}

.bg-section-3{
    /*background-image: url('assets/frontend/img/jekill/bg-section-3.png');*/
    background: #018196;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;  
    
}

.bg-section-3-par{
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

/*.logo {
    padding-top:10px;
    padding-top: 25px;
}*/

.logo {
    padding-top: 60px;
    margin-left: 46px;
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


.color-text-01{
    color: rgb(89, 89, 91);
    font-weight: 700;
}

.color-text-white{
    color:#fff;
}


.social-pad {
    padding-bottom: 53px;
}

/*.box-text {
    background-color: rgba(0, 0, 0, 0.7);
    width: 40%;
    font-size: 30pt;
    color: #ffffff;
    text-align: center;
    margin-top: 17%;
    padding: 4%;
}*/

.box-text {
    background-color: rgba(0, 0, 0, 0.7);
    width: 100%;
    font-size: 10pt;
    color: #ffffff;
    text-align: center;
    padding: 4%;
    position: absolute;
    bottom: 0;
}

.form-news {
    width: 70%;
    margin-left: 33px;
    margin-bottom: 20px;
   
}


.text-razones {
    font-size: 25pt;
    color: #ffffff;
    text-align: center;
    margin-top: 3%;
    padding: 4%;
    line-height: 1;
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
    width: 100%;
    background: #94BB1E !important;
    color: #fff !important;
    font-size: 18px;
}

.left-35{
    margin-left: 0;
}

.bg-form {
    /*background: url('assets/frontend/img/jekill/bg-form.png') no-repeat;*/
    font-size: 20pt;
    padding-top: 10px;
    padding-bottom: 5px;
    background: #94BB1E;
    color: #fff;
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



         /*==========  Mobile First Method  ==========*/

    /* Custom, iPhone Retina */ 
    @media only screen and (min-width : 320px) {

    }

    /* Extra Small Devices, Phones */ 
    @media only screen and (min-width : 480px) {

    }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {
        .bg-section-1 {
            background-image: url('assets/frontend/img/scalpel/BAN-01.jpg');
            min-height: 410px;
            background-position: -274px;
        }

    }

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px) {

    }

    /* Large Devices, Wid Screens */
    @media only screen and (min-width : 1200px) {
        
        .bg-section-1 {
            background-image: url('assets/frontend/img/scalpel/BAN-01.jpg');
            min-height: 410px;
            background-position: left top;
        }
        
        .bg-section-1{
            background-image: url('assets/frontend/img/scalpel/BAN-01.jpg');
            min-height: 656px;
            
        }
        
        .logo {
            padding-top: 27px;
            margin-left: 82px;
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
        

        .color-text-01-position{
            margin-top: 120px;
            text-align: left;
            padding-bottom: 0;
        }

        .bg-section-2 {
           
            background-position: left top;
            background-size: contain;
           
        }

        .neg-top {
            margin-top:-143px;

        }


        .texto-descriptivo {
            color:#fff;
            padding: 3%;
            font-size: 12px;
            text-align: justify
            
        }

        .border-left {
            border-left: 1px solid #fff;
        }
        
        .left-35{
            margin-left: 40px;
        }



        .neg-top {
            margin-top:-143px;

        }
        
       .box-text {
          
            background-color: rgba(0, 0, 0, 0.7);
            width: 40%;
            font-size: 15px;
            color: #ffffff;
            text-align: left;
            padding: 2% 2% 2% 7%;
            bottom: 259px;
            left: 0;
        }
        
        .text-razones {
            font-size: 25pt;
            color: #ffffff;
            text-align: left;
            margin-top: 0%;
            padding: 4%;
            line-height: 1;
        }
        
        .bici-box {
          padding-top: 50px;
          padding-bottom: 18px;  
          margin-bottom: 25px; 
        }
        
        .bici-box h2 {
            font-size: 18px;
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
    function envio(){
       if ($('#nombre').val()==''){
            $('.alerts-wrap').html('Ingrese Nombre y Apellido');
            return false;
       }
       if ($('#telefono').val()==''){
        $('.alerts-wrap').html('Ingrese T&eacute;fono de contacto');
        return false;
       }
       
       if ($('#email').val()==''){
        $('.alerts-wrap').html('Ingrese correo electronico valido');
        return false;
       }
       
       
       

       $.ajax({
        	  type : "POST", 
        	  data : { 
                  'nombre'     :    $("#nombre").val(),
                  'telefono'   :    $("#telefono").val(),
                  'email'      :    $("#email").val(),
                  'comentario' :    $("#comentario").val(),
                  'modelo'     :    'Cannondale Scalpel',
                  'csrf_token': $("input[name=csrf_token]").val() ,  
              },
              dataType : 'json',
        	  url : '<?php echo base_url()?>jekill/registro',
        	  
        		beforeSend : function() {
        			 //$('#btn-sb').attr("disabled","disabled");
        		},
        		success : function(data) {
        	
        		
                    if(data.succes=='succes'){
                 		$('.alerts-wrap').html(data.msg);
        			    $("#nombre").val('');
                        $("#telefono").val('');
                        $("#email").val('');
                        $("#comentario").val('');
        				
        			}else{
        			    
                        if(data.nombre!=''){
                            $('.alerts-wrap').html(data.nombre);
                            return false;
                        }
                        if(data.telefono!=''){
                            $('.alerts-wrap').html(data.telefono);
                            return false;
                        }
                        
                        if(data.email!=''){
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
                 <div class="col-lg-3 logo">
                        <img src="assets/frontend/img/scalpel/logo-mini.png" class="img-responsive">
                 </div>
                 <div class="col-lg-5 h4 color-text-01-position no-padding"> 
                     <span class="color-text-white"></span>
                 </div>   
            </div>
            
            
            <div class="col-lg-12 bg-section-1  no-padding " style="position: relative;">
                   <div class="box-text">
                       <div class="h2">LA BICI DEFINITIVA <br /> PARA EL CROSS <br />COUNTRY MODERNO</div>
                   </div>
                
            </div>

            <div class="col-lg-12 logo-inter ">
                    <div>
                        <img src="assets/frontend/img/jekill/logo-intercicles.png" class="img-responsive" />
                    </div>
                </div>
          
            <div class="col-lg-12 bg-section-2 ">
                
                  <div class="col-lg-6 left-35">
                      <div class="text-razones ">
                        YA ES HORA DE <br /> AÑADIR OTRA X AL XC.
                      </div> 
                      <div class="col-lg-6 no-padding texto-descriptivo ">
                        <p>DISEÑADA PARA XXC</p>
                        <p>La bici de carreras definitiva para la dura realidad del Cross Country moderno. La doble Cross Country más ligera y más rígida del planeta, la nueva geometría XC permite dominar las escaladas, controlar los descensos y aniquilar a tus tiempos.</p>
                      </div>
                      <div class="col-lg-6 no-padding texto-descriptivo border-left">
                        <p>UN EQUILIBRIO ENTRE AGILIDAD XC Y ESTABILIDAD ALL MOUNTAIN.</p>
                        <p>La Geometría de Dirección Out-Front te concede lo mejor de ambos mundos: estabilidad y holgura en los descensos frenéticos, y agilidad y rapidez en el resto de los tramos.</p> 
                      </div>
                      <div class="clear"></div>
                      <div class="col-lg-6 no-padding texto-descriptivo border-top">
                        <p>RIGIDEZ EXPLOSIVA </p>
                        <p>Simplemente NO a la flexión que malgasta los vatios. La Scalpel Si (Scalpel sistema integrado) es la doble de XC más rígida que existe gracias a su rueda trasera Ai, vainas súper cortas, ejes desbloqueo Lock-R y la construcción de carbono Ballis-Tec.</p>  
                      </div>
                      
                      <div class="col-lg-6 no-padding texto-descriptivo border-top">
                            <p>UNA TRACCIÓN DISPARATADA, SIN CONCESIONES </p>
                            <p>La tecnología patentada Ai Drive-train ofrece vainas súper cortas para un ágil manejo y una tracción de escalada insuperable, mucho espacio libre para el barro y para una línea de cadena para estos tiempos.</p>  
                      </div>
                      
                      <div class="clear"></div>
                      
                      <div class="col-lg-6 no-padding texto-descriptivo border-top">
                            <p>LA MEJOR HORQUILLA XC.</p>
                            <p>Increíblemente rígida y precisa: la Lefty tiene un mejor comportamiento en curvas, maniobrabilidad y aceleración que sus flexibles competidoras de Cross Country. El offset extra largo de la horquilla hace posible nuestra Geometría de Dirección Out-Front.</p>  
                      </div>
                      <div class="col-lg-6 no-padding texto-descriptivo border-top">
                            <p>PESO ULTRALIGERO</p>
                            <p>Cuadro, horquilla, bielas basadas en la tecnología de Integración de sistemas y tirantes Zero Pivot, más unión es menos…peso. Nueva Scalpel-Si, la doble de XC más ligera del mercado.</p>  
                      </div>

                     

                  </div>
                  <div class="col-lg-4 col-xs-12 col-lg-offset-1 no-padding">
                   <div class="neg-top">
                      <div class="bg-form text-center">
                        <p>CONSULTAS</p>
                      </div>

                      <div class="bg-fields">
                           <p class="text-center" style="font-size: 15px">
                                CONTÁCTANOS Y OBTÉN UN BENEFICIO.
                                EXCLUSIVO PARA INTERNET<br>
                                <span>+569 3 2277392</span>

                           </p>
                            <form>
                            <input type="hidden" name="<?php echo $csfr['csrfName']?>" value="<?php echo $csfr['csrfHash']?>" style="display:none;" />
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

                                <button type="button" onclick="envio()"  class="btn btn-default">ENVIAR</button>
                                <div class="clerfix"></div>
                                <div class="col-lg-12 alerts-wrap" style="margin-top: 5px;"></div>
                                <div class="clerfix"></div>
                            </form>
                      </div>  
                      
                      
                      <div class="logo-in-form" >
                        <img src="assets/frontend/img/scalpel/logo-mini.png" class="img-responsive center-block" />
                      </div>
                
                      
                   </div>
                </div>
                
            </div>

            <div class="clearfix"></div>    


            <div class="col-lg-8 col-lg-push-2" style="margin-top: 25px ;  margin-bottom: 40px">
                <img src="assets/frontend/img/scalpel/BICI.jpg" class="center-block img-responsive" >
            </div>
            
            
            
            
            <div class="clearfix"></div>    

            <div class="col-lg-12 bg-section-3 alternate-bg " style="padding-top:8%">
               <div class="col-lg-8 lo-quiero" ><span class=" ">LA QUIERO AHORA</span></div>
               <div class="col-lg-3 " style="padding-top: 30px"><a href="https://www.intercycles.cl/scalpel" target="_blank" type="button" class="btn btn-default">COMPRAR</a></div>
            </div>
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
                      <div class="col-lg-3"><img src="assets/frontend/img/jekill/logo-inter-blanco.png" class="img-responsive" /></div>
                      <div class="clearfix"></div>
                          <div class="col-lg-2 col-lg-off ">
                            <div class="titulo">NOSOTROS</div>
                            <div class="ayuda"><a href="https://www.intercycles.cl/nuestras-tiendas">Nuestras Tiendas</a></div>
                          </div>
                          
                          <div class="col-lg-2">
                            <div class="titulo">SERVICIO AL CLIENTE</div>
                            <div class="ayuda"><a href="https://www.intercycles.cl/contactanos">Contáctanos</a></div>
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
                            <div class="ayuda"><i class="fa fa-phone" ></i>&nbsp;&nbsp;<a href="tel:+562 2170501">Servicio Técnico +562 22170501</a></div>
                            <div class="ayuda"><i class="fa fa-clock-o" ></i>&nbsp;&nbsp; Horario Lunes a Viernes 10:00 a 20:00 Hrs.</div>
                            <div class="ayuda"><i class="fa fa-envelope" ></i>&nbsp;&nbsp;<a href="tel:+56976188913">Tienda Online +569 3 2277392</a></div>
                          </div>
                          
                          
                         <div class="clearfix"></div> 
                         
                         <div class="col-lg-3 social-pad" >
                         <div class="social"><a tittle="Intercycles Facebook" target="_blank" href="https://www.facebook.com/intercycles/"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></div>
                         <div class="social"><a tittle="Intercycles Instagram" target="_blank" href="https://www.instagram.com/intercycles/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>    
                            
                         </div>
                          
                    </div>
                    <div class="col-lg-12 no-padding" style="background: #242424">
                    
                    <div class="footer-metodospago text-center" style="padding-top: 15px;">
                        <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/pagos_web.png" alt="" class="img-responsive center-block"> <img src="https://d2qwly2q594uhj.cloudfront.net/media/wysiwyg/logo-servipag.png" class="img-responsive center-block" alt="" width="80">
                    </div>
                    <div>
                        <p class="txt-footer-address">
                            © Intercycles <span id="currentYear">2018</span>, Chile. Se reserva el derecho a cambiar la información contenida en este sitio sin previo aviso, incluyendo precios, especificaciones e imágenes. </strong></a>
                        </p>
                    </div>
                    
                    </div>
            </div>

         

        </div>
        
        
   
	<!-- ./Footer -->
        
 


        <!-- jQuery -->
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    </body>
</html>
