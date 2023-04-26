let tableTipoC;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableTipoC = $('#tableTipoC').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/TipoContenido/getTipoContenidos",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigotipoC"},
            {"data":"nombretipoC"},
            {"data":"descripcion"},
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

    if(document.querySelector("#formTContenido")){
        let formTContenido = document.querySelector("#formTContenido");
        formTContenido.onsubmit = function(e) {
            e.preventDefault();

            let intCodigo = document.querySelector('#txtCodigo').value;
            let strNombreTC = document.querySelector('#txtNombreTC').value;
            let strDescripcion = document.querySelector('#txtDescripcion').value;
   

            if(intCodigo == '' || strNombreTC == '' || strDescripcion == '')
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
            let ajaxUrl = base_url+'/TipoContenido/setTipoContenido'; 
            let formData = new FormData(formTContenido);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableTipoC.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = intCodigo;
                            rowTable.cells[2].textContent = strNombretipoC;
                            rowTable.cells[4].textContent = strDescripcion;
                            rowTable.cells[5].innerHTML = htmlStatus;
                            rowTable="";
                        }
                        $('#modalFormTContenido').modal("hide");
                        formTContenido.reset();
                        swal("Tipo Contenidos", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                return false;
            }
        }
    }
}, false);



window.addEventListener('load', function() {
}, false);



function openModal()
{
    document.querySelector('#idtipoC').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector("#formTContenido").reset();
    $('#modalFormTContenido').modal('show');
}