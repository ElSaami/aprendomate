var tableUnidades;

document.addEventListener('DOMContentLoaded', function(){

	tableUnidades = $('#tableUnidades').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Unidades/getUnidades",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigoUnidad"},
            {"data":"nombreUnidad"},
            {"data":"status"},
            {"data":"options"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"asc"]]  
    });
    //NUEVO ROL
    var formUnidad = document.querySelector("#formUnidad");
    formUnidad.onsubmit = function(e) {
        e.preventDefault();

        var intIdUnidades = document.querySelector('#idUnidades').value;
        var intCodigo = document.querySelector('#txtCodigo').value;
        var strNombreU = document.querySelector('#txtNombreU').value;
        var intStatus = document.querySelector('#listStatus').value;        
        if(intCodigo == '' || strNombreU == '' || intStatus == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Unidades/setUnidad'; 
        var formData = new FormData(formUnidad);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormUnidad').modal("hide");
                    formUnidad.reset();
                    swal("Unidades", objData.msg ,"success");
                    tableUnidades.api().ajax.reload();
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
        }

        
    }
    
});

$('#tableUnidadses').DataTable();

function openModal(){

    document.querySelector('#idUnidades').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Unidad";
    document.querySelector("#formUnidad").reset();
	$('#modalFormUnidad').modal('show');
}

window.addEventListener('load', function() {
    /*fntEditRol();
    fntDelRol();
    fntPermisos();*/
}, false);

function fntEditUnidad(idUnidades){
    document.querySelector('#titleModal').innerHTML ="Actualizar Unidad";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idUnidades = idUnidades;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Unidades/getUnidad/'+idUnidades;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idUnidades").value = objData.data.idUnidades;
                document.querySelector("#txtCodigo").value = objData.data.codigoUnidad;
                document.querySelector("#txtNombreU").value = objData.data.nombreUnidad;
                

                if(objData.data.status == 1)
                {
                    var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                }else{
                    var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                }
                var htmlSelect = `${optionSelect}
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                                `;
                document.querySelector("#listStatus").innerHTML = htmlSelect;
                $('#modalFormUnidad').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}

function fntDelUnidad(idUnidades){
    var idUnidades = idUnidades;
    swal({
        title: "Eliminar Unidad",
        text: "¿Realmente quiere eliminar la Unidad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Unidades/delUnidad/';
            var strData = "idUnidades="+idUnidades;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    console.log(request.responseText);

                }
            }
        }

    });
}
