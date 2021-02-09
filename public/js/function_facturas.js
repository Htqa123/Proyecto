
var tableRoles;

document.addEventListener('DOMContentLoaded', function() {
	tableRoles = $('#tableFacturas').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url": " "+base_url+"/Roles/getRoles",
			"dataSrc":""
		},
		"columns":[
		{"data":"provFactCodi"},
		{"data":"provNumeFact"},
        {"data":"provValoFact"},
        {"data":"provFactFech"},
		{"data":"status"},
		{"data":"options"}
		],
		"resonsieve":"true",
		"bDestroy":true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});


var formRol = document.querySelector("#formRol");
formRol.onsubmit = function(e) {
	e.preventDefault();

    var intIdRol = document.querySelector('#roleId').value;
	var strNombre = document.querySelector('#txtroleNomb').value;
	var strDescripcion = document.querySelector('#txtroleDesc').value;
	var intStatus = document.querySelector('#listStatus').value;
	if(strNombre == '' || strDescripcion == '' || intStatus == '')
	{
		swal("Atención", "Todos los campos son obligatorios", "error");
		return false;
	}
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var ajaxUrl =  base_url+'/Roles/setRol';
	var formData = new FormData(formRol);
	request.open("POST", ajaxUrl,true);
	request.send(formData);
	request.onreadystatechange = function() {
		
		if(request.readyState == 4 && request.status == 200)
		{
           var objData = JSON.parse(request.responseText);
           
           if(objData.status)
           {
           	$('#ModalRoles').modal("hide");
           	formRol.reset();
           	swal("Roles de usuario", objData.msg ,"success");
           	tableRoles.api().ajax.reload(function() {
             fntEditRol();
           	});
           }else{
           	swal("Error", objData.msg , "Error");
           }
		}
		
	}
}

});

$('#tableRoles').DataTable();

function openModal()
{
	document.querySelector('#roleId').value="";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister"); 
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary"); 
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
	document.querySelector("#formRol").reset();

	$('#ModalRoles').modal('show');
}


window.addEventListener('load', function(){
	fntEditRol();
	fntDelRol();
}, false);

function fntEditRol(){

	var btnEditRol = document.querySelectorAll(".btnEditRol");
	 btnEditRol.forEach(function(btnEditRol) {
		btnEditRol.addEventListener('click', function(){

			document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
			document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate"); 
			document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info"); 
			document.querySelector('#btnText').innerHTML = "Actualizar";

         var roleId = this.getAttribute("rl");
         var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	      var ajaxUrl =  base_url+'/Roles/getRol/'+roleId;
	      request.open("GET", ajaxUrl,true);
	      request.send();

	      request.onreadystatechange = function() {
		
			if(request.readyState == 4 && request.status == 200)
			{
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
              document.querySelector("#roleId").value = objData.data.roleId;
              document.querySelector("#txtroleNomb").value = objData.data.roleNomb;
              document.querySelector("#txtroleDesc").value = objData.data.roleDesc;
            
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
           $('#ModalRoles').modal('show');
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
          var roleId = this.getAttribute("rl");
          
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
       		var ajaxUrl = base_url+'/Roles/delRol/';
       		var strData = "roleId="+roleId;
       		request.open("POST", ajaxUrl, true);
       		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       		request.sent(strData);
       		request.onreadystatechange = function(){
       			if(request.readyState == 4 && request.status == 200){
       				var objData = JSON.parse(responseText);
       				if(objData.status)
       				{
       					swal("Eliminar", objData.msg , "success");
       					tableRoles.api().ajax.reload(function(){
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