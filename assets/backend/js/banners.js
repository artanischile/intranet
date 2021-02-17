$(document).ready(function () {

   


	$('#frmBanners').submit(function (e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url: base_url + 'bo/banner/save',
			secureuri: false,
			fileElementId: 'banner_image',
			dataType: 'json',
			data: {
				'csrf_token'		: $('input[name=csrf_token]').val(),
				'banner_title'		: $('input[name=banner_title]').val(),
				'banner_text'		: $('input[name=banner_text]').val(),
				'banner_url'		: $('input[name=banner_url]').val(),
				'banner_target'		: $('select[name=banner_target]').val(),
				'banner_start'		: $('input[name=banner_start]').val(),
				'banner_end'		: $('input[name=banner_end]').val(),
				'banner_category'	: $('select[name=banner_category]').val(),
				'banner_status'		: $('select[name=banner_status]').val()
			},
			success: function (data, status) {
			

		    if (data['succes']=="ERR") {

				if (data['banner_title'] != "") {
					//$('.Nombre').addClass('has-error');
					$(".eBanner_title").html(data['banner_title']).fadeIn().delay(3000).fadeOut();
					
				};
				if (data['banner_category'] != "") {
					//$('.Nombre').addClass('has-error');
					$(".ebanner_category").html(data['banner_category']).fadeIn().delay(3000).fadeOut();
					
				};
				if (data['banner_status'] != "") {
					//$('.Nombre').addClass('has-error');
					$(".ebanner_status").html(data['banner_status']).fadeIn().delay(3000).fadeOut();
					
				};


			}else if (data['succes']=="OK"){
				
				$('#banners_modal').modal('toggle');
					swal({
						title: "Ajax request example",
						text: data['message'],
						type: "info",
						showCancelButton: false,
						closeOnConfirm: true,
						showLoaderOnConfirm: false
					}, function () {
						
					});
			}			


			//console.log(data);
			

				/*if (data.status != 'error') {
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);*/
			}
		});
		return false;
	});


});





function ShowAddBanner() {
	$("#ttt").html("Ingreso Banner");
	$("#enviar").show();
	$('.modal-body').load(base_url + 'bo/banner/add', function (result) {
		$('#banners_modal').modal({
			show: true,
			backdrop: 'static'

		});
	});

}


function ShowEditBanner(id) {
	$("#ttt").html("Edicion de Banner");
	$('.modal-body').load('/administrador/bo/productos/editar/' + id,
		function (result) {
			$('#mymodal').modal({
				show: true,
				backdrop: 'static'

			});
		});


}

function ShowViewProduct(id) {
	$("#tt").html("Informacion de un producto");
	$('.modal-body').load('/administrador/bo/productos/ver/' + id,
		function (result) {
			$('#mymodal2').modal({
				show: true,
				backdrop: 'static'

			});

		});


}

function ShowDeleteProduct(id) {
	$("#ttt").html("Eliminacion de un producto");
	$('.modal-body').load('/administrador/bo/productos/eliminar/' + id,
		function (result) {
			$('#mymodal').modal({
				show: true,
				backdrop: 'static'

			});
		});


}



/*
 * else {
		

	}*/

function Validarform() {

	$.ajax({
		type: "POST",
		url: base_url + 'bo/banner/save',
		data: $("#frmBanners").serialize(),
		dataType: "json",
		success: function (data) {



			if (data['succes'] == "error") {

				/*if (data['nombre'] != "") {
					$('.Nombre').addClass('has-error');
					$(".eNombre").html(data['nombre']).fadeIn();
					
				}
				
				if (data['email'] != "") {
					$('.Email').addClass('has-error');
					$(".eEmail").html(data['email']).fadeIn();
					
				}
				
				if (data['usuario'] != "") {
					$('.Usuario').addClass('has-error');
					$(".eUsuario").html(data['usuario']).fadeIn();
					
				}
				
				if (data['password'] != "") {
					$('.Password').addClass('has-error');
					$(".ePassword").html(data['password']).fadeIn();
					
				}
				
				if (data['perfil'] != "") {
					$('.Perfil').addClass('has-error');
					$(".ePerfil").html(data['perfil']).fadeIn();
					
				}
				
				if (data['estado'] != "") {
					$('.Estado').addClass('has-error');
					$(".eEstado").html(data['estado']).fadeIn();
					
				}*/
			}

			/*if (data['succes'] == "error") {
				// $('#error').html('<ul>'+data['rut']+data['abono']+'</ul>').fadeIn();
                
				if (data['rut'] != "") {
					$('.Rut').addClass('has-error');
					$("#msg-error").html(data['rut']).fadeIn();
					return false;
				}
				if (data['nombre'] != "") {
					$('.Nombre').addClass('has-error');
					$("#msg-error").html(data['nombre']).fadeIn();
					return false;
				}

				if (data['email'] != "") {
					$('.Email').addClass('has-error');
					$("#msg-error").html(data['email']).fadeIn();
					return false;
				}

				if (data['usuario'] != "") {
					$('.Usuario').addClass('has-error');
					$("#msg-error").html(data['usuario']).fadeIn();
					return false;
				}

				if (data['password'] != "") {
					$('.Password').addClass('has-error');
					$("#msg-error").html(data['password']).fadeIn();
					return false;
				}

				if (data['estado'] != "") {
					$('.Estado').addClass('has-error');
					$("#msg-error").html(data['estado']).fadeIn();
					return false;
				}

				$("#msg-error").fadeOut(5000);

			}*/

			if (data['succes'] == "OK") {
				$("#msg-error").html('Operacion Realizada con exito').fadeIn(1000);
				//setTimeout(function(){  $(location).attr('href',base_url+'bo/usuarios/'); }, 3000);

			} else {
				$("#msg-error").html('Operacion fallida').fadeIn(1000).delay(2000).fadeOut();
			}
		}
	})
}