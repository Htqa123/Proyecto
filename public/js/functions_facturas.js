////cargar la tabla de la categoria
var tableFacturas;

document.addEventListener('DOMContentLoaded',function(){
	////var formUsuarios = document.querySelector("formUsuarios");
	tableFacturas = $('#tableFacturas').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Facturas/getFacturas",
			"dataSrc":""
		},
		"columns":[
		{"data":"provFactId"},
		{"data":"provNombEmpr"},
		{"data":"provNumeFact"},
		{"data":"provValoFact"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});


/////insertar facturas
formFacturas.onsubmit = function(e) {
	  e.preventDefault();
	  
	  
	  var listEmpresa = document.querySelector('#listEmpresa').value;
	  var intprovNumeFact = document.querySelector('#txtprovNombEmpr').value;
	  var intprovValoFact = document.querySelector('#txtprovValoFact').value;
	  var intStatus = document.querySelector('#listStatus').value;

	  if( listEmpresa == '' ||  txtprovNombEmpr  == '' || intprovValoFact == ''  || intStatus == '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Facturas/setFacturas';
		var formData = new FormData(formFacturas);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalFacturas').modal('hide');
					formElement.reset();
					swal("Facturas", objData.msg ,"success");
					tableFacturas.api().ajax.reload(function(){

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
	fntViewFacturas();
	fntEditFactura();
}, false);


function fntSelectProveedores(){
	var ajaxUrl = base_url+'/Proveedores/getSelectproveedores';
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200){
			document.querySelector('#listEmpresa').innerHTML = request.responseText;
			document.querySelector('#listEmpresa').value = 1;
			// $('#listRolid').selectpicker('refresh');
			// $('.selectpicker').addClass('col-lg-13').selectpicker('setStyle');
		}
	}
}

function fntViewFacturas() {
	var btnViewFacturas = document.querySelectorAll(".btnViewFacturas");
	btnViewFacturas.forEach(function(btnViewFacturas){
		btnViewFacturas.addEventListener('click', function(){
		var provFactId = this.getAttribute("pr");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Facturas/getFacturas/'+provFactId;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var status = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celprovNit").innerHTML = objData.data.provNombEmpr;
					document.querySelector("#celprovNomb").innerHTML = objData.data.provNumeEmpr;
					document.querySelector("#celprovDire").innerHTML = objData.data.prov;
					document.querySelector("#celprovTele").innerHTML = objData.data.provValoFact;
					document.querySelector("#celprovEmail").innerHTML = objData.data.provFactFech;
					document.querySelector("#celprovDeta").innerHTML = objData.data.status;
					$('#ModalViewFacturas').modal('show');

				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});
}


function fntEditFactura() {
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
		document.querySelector("#idfactura").value = objData.data.provCodi;
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
	
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Proveedor";
	document.querySelector("#formFacturas").reset();

	$('#ModalFacturas').modal('show');
}



