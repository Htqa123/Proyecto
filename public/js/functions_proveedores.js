////cargar la tabla de la categoria
var tableproveedores;

document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tableproveedores = $('#tableproveedores').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Proveedores/getProveedores",
			"dataSrc":""
		},
		"columns":[
		{"data":"provNit"},
		{"data":"provNomb"},
		{"data":"provTele"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});



	formUsuarios.onsubmit = function(e) {
	  e.preventDefault();
	  
	  var strIdentificacion = document.querySelector('#txtIdentificacion').value;
	  var strNombre = document.querySelector('#txtNombre').value;
	  var strApellido = document.querySelector('#txtApellido').value;
	  var strEmail = document.querySelector('#txtEmail').value;
	  var intTelefono = document.querySelector('#txtTelefono').value;
	  var intTipousuario = document.querySelector('#listRolid').value;
	  var strPassword = document.querySelector('#txtPassword').value;

	  if(strIdentificacion == '' || strNombre  == '' || strApellido == '' || strEmail == '' || intTelefono == '' || intTipousuario == '')
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
				if(objData.status){
					$('#ModalProveedor').modal('hide');
					formElement.reset();
					swal("Usuarios", objData.msg ,"success");
					tableUsuarios.api().ajax.reload(function(){

					});
				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
	}

}, false);



window.addEventListener('load', function(){
	fntSelectProveedores();
	fntViewUsuario();
	fntEditUsuario();
}, false);


function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getproveedor';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listNitProv').innerHTML = request.responseText;
			document.querySelector('#listNitProv').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}




function fntViewUsuario() {
	var btnViewUsuario = document.querySelectorAll(".btnViewUsuario");
	btnViewUsuario.forEach(function(btnViewUsuario){
		btnViewUsuario.addEventListener('click', function(){
		var idpersona = this.getAttribute("us");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var estadoUsuario = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
					document.querySelector("#celNombres").innerHTML = objData.data.nombres;
					document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
					document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
					document.querySelector("#celEmail").innerHTML = objData.data.email_user;
					document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
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
		

	var idpersona = this.getAttribute("us");
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
	var ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
	if(request.status == 200){
		var objData = JSON.parse(request.responseText);
		if(objData.status)
		{
		document.querySelector("#idUsuario").value = objData.data.idpersona;
		document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
		document.querySelector("#txtNombre").value = objData.data.nombres;
		document.querySelector("#txtApellido").value = objData.data.apellidos;
		document.querySelector("#txtTelefono").value = objData.data.telefono;
		document.querySelector("#txtEmail").value = objData.data.email_user;
		document.querySelector("#listRolid").value = objData.data.idrol;
		

		}
	}
		
	$('#ModalProveedor').modal('show');

			
	}
	
	
		});
	});
}

//////abre el modal para crear provvedor

function openModal()
{
	document.querySelector('#idproveedor').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Proveedor";
	document.querySelector("#formProveedor").reset();

	$('#ModalProveedor').modal('show');
}



