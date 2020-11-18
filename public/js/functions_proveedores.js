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


/////insertar proveedores
formProveedor.onsubmit = function(e) {
	  e.preventDefault();
	  
	  var strIdentificacion = document.querySelector('#txtprovNit').value;
	  var strNombre = document.querySelector('#txtprovNomb').value;
	  var strApellido = document.querySelector('#txtprovDire').value;
	  var intTelefono = document.querySelector('#txtprovTele').value;
	  var strEmail = document.querySelector('#txtprovEmail').value;
	  var strprovDeta = document.querySelector('#txtprovDeta').value;
	  var intTipousuario = document.querySelector('#listStatus').value;

	  if(strIdentificacion == '' || strNombre  == '' || strApellido == '' || strEmail == '' || intTelefono == '' || strprovDeta == "" || intTipousuario == '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Proveedores/setProveedor';
		var formData = new FormData(formProveedor);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalProveedor').modal('hide');
					formElement.reset();
					swal("Proveedor", objData.msg ,"success");
					tableproveedores.api().ajax.reload(function(){

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
	btnViewProveedor();
	fntEditProveedor();
}, false);


function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getSelectproveedores';
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




function btnViewProveedor() {
	var btnViewProveedor = document.querySelectorAll(".btnViewProveedor");
	btnViewProveedor.forEach(function(btnViewProveedor){
		btnViewProveedor.addEventListener('click', function(){
		var provCodi = this.getAttribute("pv");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Proveedores/getProveedor/'+provCodi;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var estadoUsuario = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celprovNit").innerHTML = objData.data.provNit;
					document.querySelector("#celprovNomb").innerHTML = objData.data.provNomb;
					document.querySelector("#celprovDire").innerHTML = objData.data.provDire;
					document.querySelector("#celprovTele").innerHTML = objData.data.provTele;
					document.querySelector("#celprovEmail").innerHTML = objData.data.provEmail;
					document.querySelector("#celprovDeta").innerHTML = objData.data.provDeta;
					document.querySelector("#celEstado").innerHTML = estadoUsuario;
					document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
					$('#ModalViewProveedor').modal('show');

				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});
}


function fntEditProveedor() {
	var btnEditProveedor = document.querySelectorAll(".btnEditProveedor");
	btnEditProveedor.forEach(function(btnEditProveedor){
		btnEditProveedor.addEventListener('click', function(){
			
		document.querySelector('#titleModal').innerHTML = "Actualizar Proveedor";
		document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
		document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
		document.querySelector('#btnText').innerHTML = "Actualizar";
		

	var provCodi = this.getAttribute("pv");
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
	var ajaxUrl = base_url+'/Proveedores/getProveedor/'+provCodi;
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
	if(request.status == 200){
		var objData = JSON.parse(request.responseText);
		if(objData.status)
		{
		document.querySelector("#idproveedor").value = objData.data.provCodi;
		document.querySelector("#txtprovNit").value = objData.data.provNit;
		document.querySelector("#txtprovNomb").value = objData.data.provNomb;
		document.querySelector("#txtprovDire").value = objData.data.provDire;
		document.querySelector("#txtprovTele").value = objData.data.provTele;
		document.querySelector("#txtprovEmail").value = objData.data.provEmail;
		document.querySelector("#txtprovDeta").value = objData.data.provDeta;
		document.querySelector("#listStatus").value = objData.data.status;
		

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



