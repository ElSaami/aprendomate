let tableContenidos;
let rowTable = "";
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});
$('#tableContenidos').DataTable();
document.addEventListener('DOMContentLoaded', function(){
    tableContenidos = $('#tableContenidos').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Contenidos/getContenidos",
            "dataSrc":""
        },
        "columns":[
            {"data":"codigoContenidos"},
            {"data":"nombreContenido"},
            {"data":"status"},
            {"data":"textoContenido"},
            {"data":"nombretipoC"},
            {"data":"nombreCapitulos"},
            {"data":"options"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 3 ] },
                        { 'className': "textright", "targets": [ 4 ] },
                        { 'className': "textcenter", "targets": [ 5 ] }
                    ],       
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5] 
                }
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5] 
                }
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5] 
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                "exportOptions": { 
                    "columns": [ 0, 1, 2, 3, 4, 5] 
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    if(document.querySelector("#formContenidos")){
        let formContenidos = document.querySelector("#formContenidos");
        formContenidos.onsubmit = function(e) {
            e.preventDefault();

            let intCodigo = document.querySelector('#txtCodigo').value;
            let strNombreC = document.querySelector('#txtNombre').value;
            let strTexto = document.querySelector('#txtContenido').value;
            let intTipoId = document.querySelector('#listTipoContenido').value;
            let intCapituloId = document.querySelector('#listCapituloid').value;
            let strRuta = document.querySelector('#ruta').value;


            if(intCodigo == '' || strNombreC == '' || strTexto == '' || intTipoId == '' || intCapituloId == '' )
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
            let ajaxUrl = base_url+'/Contenidos/setContenido'; 
            let formData = new FormData(formContenidos);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableContenidos.api().ajax.reload();
                        }else{
                            htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = intCodigo;
                            rowTable.cells[2].textContent = strNombreC;
                            rowTable.cells[3].textContent = strTexto;
                            rowTable.cells[4].textContent = document.querySelector("#listTipoContenido").selectedOptions[0].text;
                            rowTable.cells[5].textContent = document.querySelector("#listCapituloid").selectedOptions[0].text;
                            rowTable.cells[6].innerHTML = htmlStatus;
                            rowTable="";
                        }
                        $('#modalFormContenidos').modal("hide");
                        formContenidos.reset();
                        swal("Contenidos", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                return false;
            }
        }
    }
}, false);

window.addEventListener('load',function(){
    fntTipoContenido();
    fntCapitulos();
}, false);

tinymce.init({
	selector: '#txtContenido',
	width: "100%",
    height: 400,    
    statubar: true,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
});

function fntTipoContenido(){
    if(document.querySelector('#listTipoContenido')){
        let ajaxUrl = base_url+'/TipoContenido/getSelectTContenidos';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listTipoContenido').innerHTML = request.responseText;
                $('#listTipoContenido').selectpicker('render');
            }
        }
    }

}

function fntCapitulos(){
    if(document.querySelector('#listCapituloid')){
        let ajaxUrl = base_url+'/Capitulos/getSelectCapitulos';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listCapituloid').innerHTML = request.responseText;
                $('#listCapituloid').selectpicker('render');
            }
        }
    }
}

function openModal()
{
    document.querySelector('#idContenidos').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Contenido";
    document.querySelector("#formContenidos").reset();
    $('#modalFormContenidos').modal('show');
}