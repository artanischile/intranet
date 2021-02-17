$(document).ready(function(){
	
   $( "#msg-error" ).hide();
	$('#nombre').on('input',function(e){
	     alert('Changed!')
	    });
	

});


function ShowAddUser() {
	 $("#ttt").html("Creacion de Usuario");
	$("#enviar").show();
		$('.modal-body').load(base_url+'bo/user/add', function(result) {
			$('#mymodal').modal({
				show : true, 
				backdrop : 'static'

			});
		});

}


function ShowEditUser(id){
	 $("#ttt").html("Edicion de Usuario");
	$('.modal-body').load(base_url+'bo/user/edit/' + id,
			function(result) {
				$('#mymodal').modal({
					show : true,
					backdrop : 'static'

				});
			});
	
	
}

function ShowViewUser(id){
   $("#tt").html("Informacion de Usuario");
	$('.modal-body').load(base_url+'bo/user/view/' + id,
			function(result) {
				$('#mymodal2').modal({
					show : true,
					backdrop : 'static'

				});
				
			});
	
	
}

function ShowDeleteUser(id){
	 $("#ttt").html("Eliminacion de Usuario");
	$('.modal-body').load(base_url+'bo/user/delete/' + id,
			function(result) {
				$('#mymodal').modal({
					show : true,
					backdrop : 'static'

				});
			});
	
	
}



/*
 * else {
		

	}*/
    
    
function Activate(id){
   	$.ajax({
		type : "POST",
		url : '/administrador/bo/user/activate/'+id,
		data : $("#frmUser").serialize(),
		dataType : "json",
		success : function(data) {
			if (data['succes'] == "OK") {
				 $("#msg-error").html('Operacion Realizada con exito').fadeIn(1000).delay( 1000 ).slideUp();
				 table.ajax.reload();
				// setTimeout(function(){  $(location).attr('href',base_url+'bo/user/'); }, 3000);
			}else{
				$("#msg-error").html('Operacion fallida').fadeIn(1000).delay(2000).fadeOut();
			}
		}
	})
    
}    
    
    
	 	
function Validarform() {
   
	$.ajax({
		type : "POST",
		url : '/administrador/bo/user/save',
		data : $("#frmUser").serialize(),
		dataType : "json",
		success : function(data) {
			if (data['succes'] == "error") {
				
				if (data['user_first_name'] != "") {
					$('.UserFirstName').addClass('has-error');
					$(".eUserFirstName").html(data['user_first_name']).fadeIn();
					
				}
				
				if (data['user_last_name'] != "") {
					$('.UserLastName').addClass('has-error');
					$(".eUserLastName").html(data['user_last_name']).fadeIn();
					
				}
				
				
				
				if (data['user_email'] != "") {
					$('.UserEmail').addClass('has-error');
					$(".eUserEmail").html(data['user_email']).fadeIn();
					
				}
				
				if (data['user_name'] != "") {
					$('.UserName').addClass('has-error');
					$(".eUserName").html(data['user_name']).fadeIn();
					
				}
				
				if (data['user_password'] != "") {
					$('.UserPassword').addClass('has-error');
					$(".eUserPassword").html(data['user_password']).fadeIn();
					
				}
				
				if (data['user_profile'] != "") {
					$('.UserProfile').addClass('has-error');
					$(".eUserProfile").html(data['user_profile']).fadeIn();
					
				}
				
				if (data['user_status'] != "") {
					$('.UserStatus').addClass('has-error');
					$(".eUserStatus").html(data['user_status']).fadeIn();
					
				}
			}
			if (data['succes'] == "OK") {
				$('#mymodal').modal('hide');
				$("#msg-error").html('Operacion Realizada con exito').fadeIn(1000);

				table.ajax.reload();
				//setTimeout(function(){  $(location).attr('href',base_url+'bo/user/'); }, 3000);
				
			}
		}
	})
}

