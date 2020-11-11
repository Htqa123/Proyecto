////cargar la tabla de la categoria
var tableCategorias;

document.addEventListener('DOMContentLoaded', function() {
	tableCategorias = $('#tableCategorias').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Categorias/getCategorias",
			"dataSrc":""
		},
		"columns":[
		{"data":"cateCodi"},
		{"data":"cateNomb"},
		{"data":"cateFech"},
		{"data":"cateDesc"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

////fin cargar la tabla de la categoria

var formCategorias = document.querySelector("#formCategorias");
formCategorias.onsubmit = function(e) {
	e.preventDefault();

    var intIdcate = document.querySelector('#cateCodi').value;
	var strcateNomb = document.querySelector('#txtcateNomb').value;
	var strcateDesc = document.querySelector('#txtcateDesc').value;
	var intStatus = document.querySelector('#listStatus').value;
	if(strcateNomb == '' || strcateDesc == '' || intStatus == '')
	{
		swal("Atención", "Todos los campos son obligatorios", "error");
		return false;
	}
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl =  base_url+'/Categorias/setCategoria';
	var formData = new FormData(formCategorias);
	request.open("POST", ajaxUrl,true);
	request.send(formData);
	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200)
		{
           var objData = JSON.parse(request.responseText);
           
           if(objData.status)
           {
           	$('#modalCategorias').modal("hide");
           	formCategorias.reset();
           	swal("Categoria de producto", objData.msg ,"success");
           	tableCategorias.api().ajax.reload(function() {
             fntEditRol();
           	});
           }else{
           	swal("Error", objData.msg , "Error");
           }
		}
		
	}
}

});

$('#tableCategorias').DataTable();

function openModal()
{
	document.querySelector('#cateCodi').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nueva Categoría";
	document.querySelector("#formCategorias").reset();

	$('#modalCategorias').modal('show');
}


window.addEventListener('load', function(){
	fntEditRol();
	fntDelRol();
}, false);

function fntEditRol(){

	var btnEditCate = document.querySelectorAll(".btnEditCate");
	btnEditCate.forEach(function(btnEditCate) {
		btnEditCate.addEventListener('click', function(){

			document.querySelector('#titleModal').innerHTML = "Actualizar Categoría";
			document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
			document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
			document.querySelector('#btnText').innerHTML = "Actualizar";

         var cateCodi = this.getAttribute("rl");
         var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	      var ajaxUrl =  base_url+'/Categorias/getCategoria/'+cateCodi;
	      request.open("GET", ajaxUrl,true);
	      request.send();

	      request.onreadystatechange = function() {
		
			if(request.readyState == 4 && request.status == 200)
			{
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
              document.querySelector("#cateCodi").value = objData.data.cateCodi;
              document.querySelector("#txtcateNomb").value = objData.data.cateNomb;
              document.querySelector("#txtcateDesc").value = objData.data.cateDesc;
            
            if(objData.data.status == 1)
            {
            	var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
            }else{

            	var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
            }
            var htmlSelect = `${optionSelect}
                               <option value="1">activo</option>
                               <option value="2">Inactivo</option>
                               `;
           document.querySelector("#listStatus").innerHTML = htmlSelect;
           $('#modalCategorias').modal('show');
           }else{
           	swal("Error", objData.msg , "Error");
           }
		   }
      }
   });
});
}

function fntDelRol(){
	var btnDelRol = document.querySelectorAll(".btnDelRol");
	btnDelRol.forEach(function(btnDelRol) {
		btnDelRol.addEventListener('click', function(){
          var idrol = this.getAttribute("rl");
          
          swal({
          	title: "Eliminar rol",
          	text: "¡Quieres eliminar realmente el rol",
          	type: "warning",
          	showCancelButton: true,
          	confirmButtonText: "Si eliminar",
          	cancelButtonText: "No cancelar",
          	closeOnConfirm: false,
          	closeOnCancel: true
          }, function(isConfirm){
          	if(isConfirm)
          	{
       		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
       		var ajaxUrl = base_url+'/Categorias/delCategorias/';
       		var strData = "cateCodi="+cateCodi;
       		request.open("POST", ajaxUrl, true);
       		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       		request.sent(strData);
       		request.onreadystatechange = function(){
       			if(request.readyState == 4 && request.status == 200){
       				var objData = JSON.parse(responseText);
       				if(objData.status)
       				{
       					swal("Eliminar", objData.msg , "success");
       					tableCategorias.api().ajax.reload(function(){
       						fntEditRol();
       						fntDelRol();

       					});
       				}else{
       					swal("Atencion", objData.msg , "error");
       				}
       			}
       		}
          }

          });
		});
	});
}