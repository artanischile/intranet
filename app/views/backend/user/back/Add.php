<script type="text/javascript">
/*$(document).ready(function(){
	$('#nombre, #email').on('input',function(e){
	      if( !$(this).val()==""){
	      }
    });
});*/
</script>
<?php 
$err="";
$data="";
?>
    <div class="box-body table-responsive no-padding">
            <div class="clearfix"></div>
            <div class="col-lg-12" style="padding-top: 15px">
     
                <div class="col-lg-2"><label>Nombre</label></div>
                <div class="UserFirstName col-lg-10 form-group">
                    <input
                        type="text"
                        placeholder="Ingrese Nombre"
                        id="user_first_name"
                        name="user_first_name"
                        class="form-control"
                        maxlength="35"
                        value="<?php echo isset($data['user_firs_name'])? $data['user_firs_name'] : '' ?>" />
                        <div class="clearfix"></div>
                        
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserFirstName  text-danger"></div>
                <div class="clearfix"></div>
                
                <div class="col-lg-2"><label>Apellido</label></div>
                <div class="UserLastName col-lg-10 form-group">
                    <input
                        type="text"
                        placeholder="Ingrese Apellido"
                        id="user_last_name"
                        name="user_last_name"
                        class="form-control"
                        maxlength="35"
                        value="<?php echo isset($data['user_last_name'])? $data['user_last_name'] : '' ?>" />
                        <div class="clearfix"></div>
                        
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserLastName  text-danger"></div>
                <div class="clearfix"></div>

                <div class="col-lg-2"><label >E-mail</label></div>
                <div class="UserEmail col-lg-10 form-group">
                    <input
                        type="text"
                        placeholder="Ingrese Email"
                        id="user_email"
                        name="user_email"
                        maxlength="50"
                        class="form-control"
                        value="<?php echo isset($data['user_email'])? $data['user_email'] :'' ?>" />
                    <div class="clearfix"></div>
                   
                </div>

				<div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserEmail  text-danger"></div>
                <div class="clearfix"></div>
                
                <div class="col-lg-2"><label >Usuario</label></div>
                <div class="UserName col-lg-10 form-group">
                    <input
                        type="text"
                        placeholder="Ingrese Usuario"
                        id="user_name"
                        name="user_name"
                        maxlength="50"
                        class="form-control"
                        value="<?php echo isset($data['user_name'])? $data['user_name'] :''  ?>" />
                        <div class="clearfix"></div>
                  
                </div>
				<div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserName text-danger"></div>
                <div class="clearfix"></div>
                
                <div class="col-lg-2"><label >Password</label></div>
                <div class="UserPassword col-lg-10 form-group">
                    <input
                        type="password"
                        placeholder="Ingrese Password"
                        id="user_password"
                        name="user_password"
                        class="form-control"
                        value="<?php echo isset($data['user_password'])? $this->enc->decode($data['user_password']) :'' ?>"
                        maxlength="10" />
                    <div class="clearfix"></div>
                   
                </div>
               <div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserPassword text-danger"></div>
                <div class="clearfix"></div>

                <div class="col-lg-2"><label >Perfil</label></div>
                <div class="UserProfile col-lg-10 form-group">
                    <select class="form-control" id="user_profile" name="user_profile">
                        <option value=""  >Seleccione</option>
                        <?php foreach ($profiles as $profile):?>
                            <option value="<?php echo $profile->profile_id?>"  <?php  //echo   $perfil->id==$data['perfil'] ? 'selected' :  ''    ?> ><?php echo $profile->profile_name?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="clearfix"></div>
            
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserProfile text-danger"></div>
                <div class="clearfix"></div>

                <div class="col-lg-2"><label >Estado</label></div>
                <div class="UserStatus col-lg-10 form-group">
                    <select class="form-control" id="user_status" name="user_status">
                        <option value=""  <?php //if ($data['estado']=="") echo "selected"  ?>>Seleccione</option>
                        <option value="1" <?php  //echo   $data['estado']=="1" ? 'selected' :  ''    ?>>Activo</option>
                        <option value="2" <?php  //echo   $data['estado']=="2" ? 'selected' :  ''    ?>>Inactivo</option>
                    </select>
                    <div class="clearfix"></div>
                    
                </div>	
                 <div class="clearfix"></div>
                <div class="col-lg-8 col-lg-offset-2 ms-error  eUserStatus text-danger"></div>
                <div class="clearfix"></div>
            </div>
			  <div class="clearfix"></div>
                <div id="msg-error" class="text-red" style="text-align: center; font-size: 16px; display: none;" ></div>
                <div class="clearfix"></div>
    




