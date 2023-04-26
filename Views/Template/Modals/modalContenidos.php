<!-- Modal -->
<div class="modal fade" id="modalFormContenidos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Contenido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form id="formContenidos" name="formContenidos" class="form-horizontal">
                <input type="hidden" id="idContenidos" name="idContenidos" value="">
                <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label">Código</label>
                            <input class="form-control" id="txtCodigo" name="txtCodigo" placeholder="Código del Capítulo (Ejemplo: 111)"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nombre Contenido <span class="required">*</span></label>
                            <input class="form-control" id="txtNombre" name="txtNombre" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contenido</label>
                            <textarea class="form-control" id="txtContenido" name="txtContenido" ></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="listTipoContenido">Tipo Contenido <span class="required">*</span></label>
                                <select class="form-control" data-live-search="true" id="listTipoContenido" name="listTipoContenido" required=""></select>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="listCapituloid">Capitulo <span class="required">*</span></label>
                                <select class="form-control" data-live-search="true" id="listCapituloid" name="listCapituloid" required=""></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="listStatus">Estado <span class="required">*</span></label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                            </select>
                        </div>
                        <input type="hidden" id="ruta" name="ruta" value="">
                        <div class="row">
                        <div class="form-group col-md-6">
                            <button id="btnActionForm" class="btn btn-primary btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                        </div> 
                        <div class="form-group col-md-6">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                        </div> 
                        </div>  
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalViewProducto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">
        <div class="modal-header header-primary">
            <h5 class="modal-title" id="titleModal">Datos del Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
            <tbody>
                <tr>
                <td>Codigo:</td>
                <td id="celCodigo"></td>
                </tr>
                <tr>
                <td>Nombres:</td>
                <td id="celNombre"></td>
                </tr>
                <tr>
                <td>Precio:</td>
                <td id="celPrecio"></td>
                </tr>
                <tr>
                <td>Stock:</td>
                <td id="celStock"></td>
                </tr>
                <tr>
                <td>Categoría:</td>
                <td id="celCategoria"></td>
                </tr>
                <tr>
                <td>Status:</td>
                <td id="celStatus"></td>
                </tr>
                <tr>
                <td>Descripción:</td>
                <td id="celDescripcion"></td>
                </tr>
                <tr>
                <td>Fotos de referencia:</td>
                <td id="celFotos">
                </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>

