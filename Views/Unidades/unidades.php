<?php 
    headerAdmin($data);
    getModal('modalUnidades',$data);
?>
    <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa-solid fa-folder-open"></i> <?= $data['page_tag']?> - <?=$data['page_tag2']?>
					<button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
				</h1>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="<?= base_url(); ?>/roles"><?= $data['page_title'] ?></a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="tile-body">
						<div class="table-responsive">
							<table class="table table-hover table-bordered" id="tableUnidades" style="width:100%">
								<thead>
									<tr>
                                        <th>Código</th>
										<th>Nombre Unidad</th>
                                        <th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </main>
<?php footerAdmin($data); ?>