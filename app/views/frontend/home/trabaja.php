<style>
.error {
    color: red;
    text-align: center;
}
</style>


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
.contact-form .submit {
    background: #2e6da4 none repeat scroll 0 0;
}
.contact-form input, .contact-form textarea {
    background: #ebebeb none repeat scroll 0 0;
    border: 1px solid #cccccc;
    margin-bottom: 7px;
    padding: 17px 10px;
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
<div class="contact-page page fix" style="padding-top: 25px !important;"><!--Start Contact Area-->
	<div class="container">
		<div class="row">
		
			
			<div class="contact-form col-sm-12">
				<h2>ENVIAR CURRICULUM</h2>
				<form  enctype="multipart/form-data" id="trabaja" name="trabaja"  method="post" accept-charset="utf-8">
					<div class="row">
						<div class="col-sm-6">
							<label for="name">Nombre*</label>
							<input type="text" id="name" name="name" value="<?php if(isset($error)) { echo $error['name'];};  ?>" />
							<label for="email">E-mail*</label>
							<input type="text" id="email" name="email" value="<?php if(isset($error)) { echo $error['email'];};  ?>" />
							<label for="phone">Telefono*</label>
							<input type="text" id="phone" name="phone" value="<?php if(isset($error)) { echo $error['phone'];};  ?>"/>
                            <label for="phone">Ciudad*</label>
							<input type="text" id="ciudad"  name="ciudad" value="<?php if(isset($error)) { echo $error['ciudad'];};  ?>" />
							<label for="subject">Curriculum*</label>
							<input type="file"  name="curri"/>
                            <input type="button" class="submit" value="ENVIAR"/>
                           <div class="clearfix"></div>
                           <div class="error"><?php if(isset($error)) { echo $error['msg'];};  ?></div>
						</div>
						
                        
                        
					</div>
				</form>
                <div></div>
			</div>
		</div>
	</div>
</div><!--End Contact Area-->