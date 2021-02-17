<?php 
$errors=$this->session->flashdata ( 'errors' );
$data=$this->session->flashdata ( 'data' );

$attributes = array( 'id' => 'frmLoginCustomer');
?>

<style>.overlay {
    background: #2e6da4;
}

.login input[type="submit"] {
    background: #2e6da4 none repeat scroll 0 0;
}
</style>

<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2>Acceso Clientes</h2>
	</div>
</div><!--End Title-->
<?php if (count($errors) && $errors['succes']=="error"):?>
<div class="col-lg-10 col-lg-offset-1">
    <div class="alert alert-danger" style="margin-top: 20px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error!</strong> <?php echo $errors['message'];?>
    </div>
</div>
<?php endif;?>
<div class="clearfix"></div>
<?php echo form_open(base_url('clientes/login'),$attributes);?>
<div class="login-page page fix"><!--start login Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-5">
				<div class="login">
					<form id="login-form" action="#">
						<h2>Iniciar Sesión</h2>
						<p>Bienvenido a tu cuenta</p>
						
						<label>E-mail <span>*</span></label>
						<input type="text" id="customer_email" name="customer_email" />
                        <div class="text-danger small e_enterprise_city"><?php echo $errors['customer_email'] ?></div>
                        
						<label>Contraseña<span>*</span></label>
						<input type="password" id="customer_password" name="customer_password" />
                        <div class="text-danger small e_enterprise_city"><?php echo $errors['customer_password'] ?></div>
						<div class="remember">
							<a href="<?php echo base_url()?>">Perdiste tu contraseña ?</a>
						</div>
						<input type="submit" value="login" />
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
	</div>
</div><!--End login Area-->
<?php echo form_close(); ?>	