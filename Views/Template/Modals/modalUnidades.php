<!-- Modal Unidad -->
<div class="modal fade" id="modalFormUnidad" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nueva Unidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="tile-body">
					<form id="formUnidad" name="formUnidad">
						<input type="hidden" id="idUnidades" name="idUnidades" value="">
                        <div class="form-group">
							<label class="control-label">Código</label>
							<input class="form-control" id="txtCodigo" name="txtCodigo" placeholder="Código de la Unidad (Ejemplo: 100)"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Nombre Unidad</label>
							<input class="form-control" id="txtNombreU" name="txtNombreU" type="text" placeholder="Nombre de la unidad" >
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Estado</label>
							<select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
						<div class="tile-footer">
							<button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>