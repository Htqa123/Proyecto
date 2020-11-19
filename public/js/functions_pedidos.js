////cargar la tabla de la categoria
var tablepedidos;

document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tablepedidos = $('#tablepedidos').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Pedidos/getPedidos",
			"dataSrc":""
		},
		"columns":[
		{"data":"prodCodi"},
		{"data":"prodNomb"},
		{"data":"prodMode"},
		{"data":"prodPrec"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

	////insertar productos
	
	formProductos.onsubmit = function(e) {
	  e.preventDefault();
	  
	  var intlistProd = document.querySelector('#listProd').value;
	  var strprodNomb = document.querySelector('#txtprodNomb').value;
	  var intprodPrec = document.querySelector('#txtprodPrec').value;
	  var strprodMode = document.querySelector('#txtprodMode').value;
	  var strprodMarc = document.querySelector('#txtprodMarc').value;
	  var intprodStock = document.querySelector('#txtprodStock').value;
	  var listNitProv = document.querySelector('#listNitProv').value;
	  var intStatus = document.querySelector('#listStatus').value;

	  if(intlistProd == '' || strprodNomb  == '' || intprodPrec == '' ||  strprodMode == '' || strprodMarc == '' || intprodStock == '' || listNitProv == ''|| intStatus== '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Productos/setProducto';
		var formData = new FormData(formProductos);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalProductos').modal('hide');
					formElement.reset();
					swal("Productos", objData.msg ,"success");
					tableProductos.api().ajax.reload(function(){

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
	///fntViewUsuario();
	fntEditProductos();
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


function fntEditProductos() {
	var btnEditProductos = document.querySelectorAll(".btnEditProductos");
	btnEditProductos.forEach(function(btnEditProductos){
		btnEditProductos.addEventListener('click', function(){
			
		document.querySelector('#titleModal').innerHTML = "Actualizar producto";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";
		

	var prodCodi = this.getAttribute("pr");
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
	var ajaxUrl = base_url+'/Productos/getProducto/'+prodCodi;
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
	if(request.status == 200){
		var objData = JSON.parse(request.responseText);
		if(objData.status)
		{
		document.querySelector("#idproductos").value = objData.data.prodCodi;
		document.querySelector("#listProd").value = objData.data.prodCodiCate;
		document.querySelector("#txtprodNomb").value = objData.data.prodNomb;
		document.querySelector("#txtprodPrec").value = objData.data.prodPrec;
		document.querySelector("#txtprodMarc").value = objData.data.prodMarc;
		document.querySelector("#txtprodStock").value = objData.data.prodStock;
		document.querySelector("#txtprodMode").value = objData.data.prodMode;
		document.querySelector("#listNitProv").value = objData.data.prodNitProv;
		document.querySelector("#listStatus").value = objData.data.status;
		

		}
	}
		
	$('#ModalProductos').modal('show');

			
	}
	
	
		});
	});
}






function openModal()
{
	document.querySelector('#idproductos').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo usuario";
	document.querySelector("#formProductos").reset();

	$('#ModalProductos').modal('show');
}



