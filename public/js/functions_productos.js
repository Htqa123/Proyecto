////cargar la tabla de la categoria
var tableProductos;

document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tableProductos = $('#tableProductos').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Productos/getProductos",
			"dataSrc":""
		},
		"columns":[
		{"data":"prodCodi"},
		{"data":"cateNomb"},
		{"data":"prodNomb"},
		{"data":"prodMode"},
		{"data":"prodStock"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

	////insertar productos
	
	formUsuarios.onsubmit = function(e) {
	  e.preventDefault();
	  
	  var intlistProd = document.querySelector('#listProd').value;
	  var strprodNomb = document.querySelector('#txtprodNomb').value;
	  var intprodPrec = document.querySelector('#txtprodPrec').value;
	  var strprodMode = document.querySelector('#txtprodMode').value;
	  var strprodMarc = document.querySelector('#txtprodMarc').value;
	  var intprodStock = document.querySelector('#txtprodStock').value;
	  var intlistNitprov = document.querySelector('#listNitprov').value;
	  var intStatus = document.querySelector('#listStatus').value;

	  if(intlistProd == '' || strprodNomb  == '' || intprodPrec == '' || 
	  strprodMode == '' || strprodMarc =='' || intprodStock == '' || intlistNitprov == ''|| intStatus== '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Productos/setProducto';
		var formData = new FormData(formUsuarios);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalUsuarios').modal('hide');
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
	fntSelectCategoria();
	fntViewUsuario();
	fntEditUsuario();
	fntSelectProveedores();
}, false);

///funcion para cargar select categorias

function fntSelectCategoria(){
	var ajaxUrl = base_url+'/Categorias/getSelectCategorias';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listProd').innerHTML = request.responseText;
			document.querySelector('#listProd').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}
///funcion para cargar select  provvedores

function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getSelectProveedores';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listNitprov').innerHTML = request.responseText;
			document.querySelector('#listNitprov').value = 1;
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
		
	$('#ModalUsuarios').modal('show');

			
	}
	
	
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



