////cargar la tabla de la categoria
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
		{"data":"idpersona"},
		{"data":"nombres"},
		{"data":"apellidos"},
		{"data":"nombrerol"},
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



window.addEventListener('load',function(){
	fntRolesUsuarios();
    fntViewUsuario();
}, false);


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

function fntViewUsuario() {
	var btnViewUsuario = document.querySelectorAll(".btnViewUsuario");
	btnViewUsuario.forEach(function(btnViewUsuario){
		btnViewUsuario.addEventListener('click', function(){
		var idpersona = this.getAttribute("us");
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
		request.open("GET", ajaxUrl, true);
		request.send();
		$('#ModalViewUser').modal('show');
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



