<style>
.overlay {
    background: #2e6da4;
}
.login input[type="submit"] {
    background: #2e6da4 none repeat scroll 0 0;
}
</style>

<?php 
    $errors=$this->session->flashdata ( 'errors' );
    $data=$this->session->flashdata ( 'data' );
    $attributes = array( 'id' => 'frmRegister');
?>

<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2>Acceso Clientes</h2>
	</div>
</div><!--End Title-->
<div class="login-page page fix"><!--start login Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-5">
				<div class="login">
					<form id="login-form" action="#">
						<h2>Iniciar Sesión</h2>
						<p>Bienvenido a tu cuenta</p>
						
						<label>E-mail <span>*</span></label>
						<input type="text" />
						<label>Contraseña<span>*</span></label>
						<input type="password" />
						<div class="remember">
							
							
							<a href="#">Perdiste tu contraseña ?</a>
						</div>
						<input type="submit" value="login" />
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>
	</div>
</div><!--End login Area-->