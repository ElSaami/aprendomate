<!-- Modal Tipo de Contenido -->
<div class="modal fade" id="modalFormTContenido" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Nuevo Capitulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formTContenido" name="formTContenido" class="form-horizontal">
                <input type="hidden" id="idtipoC" name="idtipoC" value="">
                <p class="text-primary">Todos los campos son obligatorios.</p>
                <div class="form-group">
					<label class="control-label">Código</label>
					<input class="form-control" id="txtCodigo" name="txtCodigo" placeholder="Código del Capítulo (Ejemplo: 1000)"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label">Tipo de Contenido</label>
					<input class="form-control" id="txtNombreTC" name="txtNombreTC" type="text" placeholder="Nombre del Tipo de contenido." >
				</div>
                <div class="form-group">
                    <label class="control-label">Descripción</label>
                    <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Descripción del tipo de contenido."></textarea>
                </div>
                <div class="form-group">
                    <label for="listStatus">Status</label>
                    <select class="form-control selectpicker" id="listStatus" name="listStatus" required >
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="tile-footer">
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>