<!-- HOME SLIDER -->
<style>
.carousel-caption {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    text-align: center;
    text-shadow: 2px 3px 5px rgba(0, 0, 0, 1);
    color: #fff;
}

.fluid-width-video-wrapper {
    width: 100%;
    position: relative;
    padding: 0;
}

.fluid-width-video-wrapper iframe, .fluid-width-video-wrapper object, .fluid-width-video-wrapper embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url('assets/frontend/')?>img/slider/4.jpg" alt="Chania">
      <!--<div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>LA is always so much fun!</p>
      </div>-->
    </div>
  </div>
</div>
<!-- HOME SLIDER -->
<?php $this->load->view('frontend/layout/icons',  FALSE); ?>
<section class="about-page page fix"><!--Start About Area-->
	<div class="container">
       <div class="row">
			<div class="col-sm-6">
                <div class="about-title">
					<h2>Vida en Dorel Sport </h2>
					
				</div>
				<div class="about-text">
					<p>En Dorel Sports, la innovaci&oacute;n y el producto est&aacute;n en el coraz&oacute;n de lo que hacemos. Cada proyecto, cada reuni&oacute;n, cada momento es una oportunidad para crear el viaje perfecto para millones de consumidores en todo el mundo. Desde un paseo familiar el domingo hasta el Tour de France, los empleados de Dorel Sports est&aacute;n ayudando a personas de todo el mundo a realizar sus sue&ntilde;os</p>
					<p>Hacer lo que se dice.</p>
                    <p>El seguro de salud y un plan de ahorro para la jubilaci&oacute;n son solo el comienzo para nuestros empleados. Nuestra cultura es tan divertida y animada como las marcas de estilo de vida que representamos.</p>
                    
				</div>
			</div>
			<div class="col-sm-6">
				<div class="fluid-width-video-wrapper" style="padding-top: 56.25%;">
					<iframe src="https://www.youtube.com/embed/KBiBfe-LYYs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen="" id="fitvid827306"></iframe>    
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-page page fix"><!--Start About Area-->
	<div class="container">
       <div class="row">
			<div class="col-sm-4">
				<div class="about-text">
					<p class="p-coment">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, conse ctetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, consectetur adipiscing elit,ed do."</p>
              	</div>
                <div>
                    <span class="sr">- Nick Osieki, Gerente de Cuentas</span>
                </div>
			</div>
            
            <div class="col-sm-4">
				<div class="about-text">
					<p class="p-coment">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, conse ctetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, consectetur adipiscing elit,ed do."</p>
              	</div>
                <div>
                    <span class="sr">- Nick Osieki, Gerente de Cuentas</span>
                </div>
			</div>
            
            <div class="col-sm-4">
				<div class="about-text">
					<p class="p-coment">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, conse ctetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, consectetur adipiscing elit,ed do."</p>
              	</div>
                <div>
                    <span class="sr" >- Nick Osieki, Gerente de Cuentas</span>
                </div>
			</div>
		
		</div>
	</div>
</section>

<?php $this->load->view('frontend/layout/brands',  FALSE); ?>