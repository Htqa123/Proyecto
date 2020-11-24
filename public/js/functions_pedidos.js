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
	
	formPedidos.onsubmit = function(e) {
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
					$('#ModalPedido').modal('hide');
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
	fntViewProductos();
	fntCarritoProductos();
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


///funcion para cargar select  carrito

function fntCarritoProductos() {
	var btnCarrito = document.querySelectorAll(".btnCarrito");
	btnCarrito.forEach(function(btnCarrito){
	btnCarrito.addEventListener('click', function(){

	var prodCodi = this.getAttribute("pr");
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
	var ajaxUrl = base_url+'/Pedidos/getAgregar/'+prodCodi;
	request.open("GET",ajaxUrl,true);
	request.send();
	request.onreadystatechange = function(){
	if(request.status == 200){
		var objData = JSON.parse(request.responseText);
		if(objData.status){
		
		document.querySelector("#txtprodNomb").innerHTML = objData.data.prodNomb;
		document.querySelector("#txtprodPrec").innerHTML = objData.data.prodPrec;
		document.querySelector("#txtprodStock").innerHTML = objData.data.prodStock;
		
		$('#ModalAgregar').modal('show');

	}else{
		swal("Error", objData.msg , "error");
			}
		}
				
	}
	
		});
	});
}


//////funcion para ver producto ok

function fntViewProductos() {
	var btnViewProductos = document.querySelectorAll(".btnViewProductos");
	btnViewProductos.forEach(function(btnViewProductos){
		btnViewProductos.addEventListener('click', function(){
		var prodCodi = this.getAttribute("pr");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Pedidos/getProducto/'+prodCodi;
		request.open("GET",ajaxUrl,true);
		request.send();
		request.onreadystatechange = function(){
			if(request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					var estadoUsuario = objData.data.status == 1 ?
					'<span class="badge badge-success">Activo</span>':
					'<span class="badge badge-danger">Inactivo</span>';
					document.querySelector("#celIdentificacion").innerHTML = objData.data.cateNomb;
					document.querySelector("#celNombres").innerHTML = objData.data.prodNomb;
					document.querySelector("#celApellidos").innerHTML = objData.data.prodPrec;
					document.querySelector("#celTelefono").innerHTML = objData.data.prodMode;
					document.querySelector("#celEmail").innerHTML = objData.data.prodStock;
					document.querySelector("#celEstado").innerHTML = estadoUsuario;
					document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
					$('#ModalViewProductos').modal('show');

				}else{
					swal("Error", objData.msg , "error");
				}
			}
		}
		
		});
	});

}









  function openModal(){
	document.querySelector('#idproductos').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Agregar al carrito";
	document.querySelector("#formPedidos").reset();

	$('#ModalPedidos').modal('show');
}



