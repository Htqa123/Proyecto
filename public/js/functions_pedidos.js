////cargar la tabla de pedidos
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
		{"data":"prodPrec"},
		{"data":"prodStock"},
	// 	{"render": function(data, type, row) {
	// 		const resume = {
	// 			prodNomb: row.prodNomb,
	// 			prodPrec: row.prodPrec,
	// 			prodStock: row.prodStock,
	// 		}
	// 		return `<div class="col-xs-1 col-sm-1 col-md-1">
	// 					<div class="thumbnail">
	// 						<div class="caption">
	// 							<h6 style="text-center">${resume.prodNomb}</h6>
	// 							<p>Precio: $${resume.prodPrec}</p>
	// 							<p>Cantidad: ${resume.prodStock}</p>
	// 							<p class="text-center">
	// 								<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
	// 								<button value="" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
	// 							</p>
	// 						</div>
	// 					</div>
	// 	            </div>`; 
	//    }
	
    //},
{"data":"options"},
		],

		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
		
	});

	
	////insertar productos
	var formPedidos = document.querySelector("#formPedidos");
	formPedidos.onsubmit = function(e) {
	  e.preventDefault();
	   
	  //document.querySelector("#txtprodNomb").innerHTML = objData.data.prodNomb;
	  
	  var intCant = document.querySelector('#txtCant').value;
	  var intprodNomb = document.querySelector('#txtprodNomb').value;
	  var intprodPrec = document.querySelector('#txtprodPrec').value;
	  
		
	  
	  if( intCant == '')
	  {
		  swal("Atencion", "Todos los campos son obligatorios", "error");
		  return false;
	  }
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Pedidos/setPedidos';
		var formData = new FormData(formPedidos);
		request.open("POST", ajaxUrl, true);
		request.send(formData);

		request.onreadystatechange = function(){
			if(request.readyState == 4 && request.status == 200){
				var objData = JSON.parse(request.responseText);
				if(objData.status){
					$('#ModalPedido').modal('hide');
					formElement.reset();
					swal("Pedidos", objData.msg ,"success");
					tablepedido.api().ajax.reload(function(){

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
Z

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



