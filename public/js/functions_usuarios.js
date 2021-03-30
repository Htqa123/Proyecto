	////cargar la tabla de la usuarios
	var tableUsuarios;

	document.addEventListener('DOMContentLoaded',function(){
		////var formUsuarios = document.querySelector("formUsuarios");
		tableUsuarios = $('#tableUsuarios').DataTable({
			"aProcessing":true,
			"aServerSide":true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
			},
			"ajax":{
				"url": " "+base_url+"/Usuarios/getUsuarios",
				"dataSrc":""
			},
			"columns":[
			{"data":"persId"},
			{"data":"persNomb"},
			{"data":"persApel"},
			{"data":"roleNomb"},
			{"data":"status"},
			{"data":"options"}
			],
			"resonsieve":"true",
			"bDestroy":true,
			"iDisplayLength": 10,
			"order":[[0,"desc"]]
	});
		
		
				var formUsuarios = document.querySelector("#formUsuarios");
				formUsuarios.onsubmit = function(e) {
					e.preventDefault();
					var strIdentificacion = document.querySelector('#txtpersIden').value;
	     			var strNombre = document.querySelector('#txtpersNomb').value;
					var strApellido = document.querySelector('#txtpersApel').value;
					var strEmail = document.querySelector('#txtpersEmail').value;
					var intTelefono = document.querySelector('#txtpersTele').value;
					var intTipousuario = document.querySelector('#listRolid').value;
					var intStatus = document.querySelector('#listStatus').value;
					var strPassword = document.querySelector('#txtpersPass').value;

					if(strIdentificacion == '' || strNombre  == '' || strApellido == '' || strEmail == '' || intTelefono == '' || intTipousuario == '' || intStatus == ''|| strPassword=='')
					{
						swal("Atencion", "Todos los campos son obligatorios", "error");
						return false;
					}
					var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		        	var ajaxUrl = base_url+'/Usuarios/setUsuario';
					var formData = new FormData(formUsuarios);
					request.open("POST", ajaxUrl, true);
					request.send(formData);
					request.onreadystatechange = function(){
						if(request.readyState == 4 && request.status == 200){
							var objData = JSON.parse(request.responseText);
							if(objData.status)
							{
								$('#ModalUsuarios').modal('hide');
								formElement.reset();
								swal("Usuarios", objData.msg ,"success");
								tableUsuarios.api().ajax.reload(function(){
									fntRolesUsuarios();
	                            	fntViewUsuario();
									fntEditUsuario();
									fntDelUsuario();
								});
							}else{
								swal("Error", objData.msg , "error");
				            }
						}else{
							console.log("Error")
						}
					}
				}
		}, false);
	
	
	
	
	


	window.addEventListener('load', function(){
		fntRolesUsuarios();
		fntViewUsuario();
		fntEditUsuario();
		fntDelUsuario();
	}, false);

//funcion para traer roles de usuario
	function fntRolesUsuarios(){
		var ajaxUrl = base_url+'/Roles/getSelectRoles';
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		request.open("GET", ajaxUrl, true);
		request.send();

		request.onreadystatechange = function() {
			
			if(request.readyState == 4 && request.status == 200){
				document.querySelector('#listRolid').innerHTML = request.responseText;
				document.querySelector('#listRolid').value = 1;
				// $('#listRolid').selectpicker('refresh');
				// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
			}
		}
	}

	//fin funcion para traer roles de usuario

	function fntViewUsuario() {
		var btnViewUsuario = document.querySelectorAll(".btnViewUsuario");
		btnViewUsuario.forEach(function(btnViewUsuario){
			btnViewUsuario.addEventListener('click', function(){
			var persId = this.getAttribute("us");
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
			var ajaxUrl = base_url+'/Usuarios/getUsuario/'+persId;
			request.open("GET",ajaxUrl,true);
			request.send();
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){
					var objData = JSON.parse(request.responseText);
					if(objData.status){
						var estadoUsuario = objData.data.status == 1 ?
						'<span class="badge badge-success">Activo</span>' :
						'<span class="badge badge-danger">Inactivo</span>';
						
						document.querySelector("#celIdentificacion").innerHTML = objData.data.persIden;
						document.querySelector("#celNombres").innerHTML = objData.data.persNomb;
						document.querySelector("#celApellidos").innerHTML = objData.data.persApel;
						document.querySelector("#celTelefono").innerHTML = objData.data.persTele;
						document.querySelector("#celEmail").innerHTML = objData.data.persEmail;
						document.querySelector("#celTipoUsuario").innerHTML = objData.data.roleNomb;
						document.querySelector("#celEstado").innerHTML = estadoUsuario;
						document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
						$('#ModalViewUser').modal('show');

					}else{
						swal("Error", objData.msg , "error");
					}
				}
			}
			
			});
		});
	}


	function fntEditUsuario() {
		var btnEditUsuario = document.querySelectorAll(".btnEditUsuario");
		btnEditUsuario.forEach(function(btnEditUsuario){
		btnEditUsuario.addEventListener('click', function(){
				
		document.querySelector('#titleModal').innerHTML = "Actualizar usuario";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";
		
		var persId = this.getAttribute("us");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Usuarios/getUsuario/'+persId;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var objData = JSON.parse(request.responseText);
			if(objData.status)
			{
			document.querySelector("#idUsuario").value = objData.data.persId;
			document.querySelector("#txtpersIden").value = objData.data.persIden;
			document.querySelector("#txtpersNomb").value = objData.data.persNomb;
			document.querySelector("#txtpersApel").value = objData.data.persApel;
			document.querySelector("#txtpersTele").value = objData.data.persTele;
			document.querySelector("#txtpersEmail").value = objData.data.persEmail;
			document.querySelector("#listRolid").value = objData.data.idrol;
			document.querySelector("#listStatus").value = objData.data.status ;

			

			}
		}
			
		$('#ModalUsuarios').modal('show');

				
		}
		
		
			});
		});
	}

	function fntDelUsuario(idUsuario){
			var btnDelUsuario = document.querySelectorAll(".btnDelUsuario");
			btnDelUsuario.forEach(function(btnDelUsuario){
				btnDelUsuario.addEventListener('click', function(){
				var idUsuario = this.getAttribute('us');
				
			swal({
				title: "Eliminar Usuario",
				text: "¿Realmente quiere eliminar el Usuario?",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, cancelar!",
				closeOnConfirm: false,
				closeOnCancel: true
			}, function(isConfirm) {
				
				if (isConfirm) 
				{
					var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
					var ajaxUrl = base_url+'/Usuarios/delUsuario/';
					var strData = "idUsuario="+idUsuario;
					request.open("POST",ajaxUrl,true);
					request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					request.send(strData);
					request.onreadystatechange = function(){
						if(request.readyState == 4 && request.status == 200){
							var objData = JSON.parse(request.responseText);
							if(objData.status)
							{
								swal("Eliminar!", objData.msg , "success");
								tableUsuarios.api().ajax.reload(function(){
									fntRolesUsuarios();
									fntViewUsuario();
									fntEditUsuario();
									fntDelUsuario();
									
								});
							}else{
								swal("Atención!", objData.msg , "error");
							} 
						}
					
					}
				}
			});
		});

	   });
    }
		   




	function openModal()
	{
		document.querySelector('#idUsuario').value="";
		document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
		document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
		document.querySelector('#btnText').innerHTML = "Guardar";
		document.querySelector('#titleModal').innerHTML = "Nuevo usuario";
		document.querySelector("#formUsuarios").reset();

		$('#ModalUsuarios').modal('show');
	}