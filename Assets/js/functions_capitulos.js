let tableCapitulos;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableCapitulos = $('#tableCapitulos').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Capitulos/getCapitulos",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigoCapitulos"},
            {"data":"nombreCapitulos"},
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
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3] 
                }
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
    if(document.querySelector("#formCapitulo")){
        let formCapitulo = document.querySelector("#formCapitulo");
        formCapitulo.onsubmit = function(e) {
            e.preventDefault();

            let intCodigo = document.querySelector('#txtCodigo').value;
            let strNombreC = document.querySelector('#txtNombreCapitulo').value; 
            let intTipounidad = document.querySelector('#listUnidadid').value;
   

            if(intCodigo == '' || strNombreC == '' || intTipounidad == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 

            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Capitulos/setCapitulo'; 
            let formData = new FormData(formCapitulo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableCapitulos.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = intCodigo;
                            rowTable.cells[2].textContent = strNombreC;
                            rowTable.cells[4].textContent = document.querySelector("#listUnidadid").selectedOptions[0].text;
                            rowTable.cells[5].innerHTML = htmlStatus;
                            rowTable="";
                        }
                        $('#modalFormCapitulo').modal("hide");
                        formCapitulo.reset();
                        swal("Capitulos", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                return false;
            }
        }
    }
}, false);
$('#tableCapitulos').DataTable();
function fntEditCapitulo(idCapitulos){
    document.querySelector('#titleModal').innerHTML ="Actualizar Capitulo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idCapitulos = idCapitulos;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'/Capitulos/getCapitulo/'+idCapitulos;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idCapitulos").value = objData.data.idCapitulos;
                document.querySelector("#txtCodigo").value = objData.data.codigoCapitulos;
                document.querySelector("#txtNombreCapitulo").value = objData.data.nombreCapitulos;
                

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
                $('#modalFormCapitulo').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }

}
function fntDelCapitulo(idCapitulos){
    var idCapitulos = idCapitulos;
    swal({
        title: "Eliminar Capitulo",
        text: "¿Realmente quiere eliminar el Capitulo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Capitulos/delCapitulo/';
            var strData = "idCapitulos="+idCapitulos;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        tableCapitulos.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }

                }
            }
        }

    });
}
window.addEventListener('load', function() {
    fntUnidades();
}, false);

function fntUnidades(){
    if(document.querySelector('#listUnidadid')){
        let ajaxUrl = base_url+'/Unidades/getSelectUnidades';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listUnidadid').innerHTML = request.responseText;
                $('#listUnidadid').selectpicker('render');
            }
        }
    }
}

function openModal(){

    document.querySelector('#idCapitulos').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Capítulo";
    document.querySelector("#formCapitulo").reset();
	$('#modalFormCapitulo').modal('show');
}