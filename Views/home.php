<?php 
    headerAprendoMate($data);
	session_start();
	// Configuración de la base de datos
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bd_aprendomate";

	// Crear una conexión PDO
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	// Preparar y ejecutar la consulta SQL para obtener las unidades
	$sql_unidades = "SELECT idUnidades, nombreUnidad, ruta FROM unidades";
	$stmt_unidades = $conn->prepare($sql_unidades);
	$stmt_unidades->execute();

	// Obtener los resultados de las unidades
	$resultados_unidades = $stmt_unidades->fetchAll();

?>
				<h1 class="fw-bold text-center py-4">Bienvenido (<?=$_SESSION['userData']['nombrerol'];?>)</h1>
				
				<!--Contenido-->
				<div class="h-auto" style="height: 75vh;">		
					<div class="row">		
						<div class="col">
							
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-header text-center" id="headingOne">
										<?php

											// Mostrar los resultados de las unidades y capítulos en pantalla
											foreach ($resultados_unidades as $resultado_unidad) {
												echo '<button class="btn btn-lg btn-primary mb-4 w-100 text-center" type="button" data-toggle="collapse" data-target="#unidades_' . $resultado_unidad['idUnidades'] . '">' . $resultado_unidad['nombreUnidad'] . '</button> <br>';
												echo '<div id="unidades_' . $resultado_unidad['idUnidades'] . '" class="collapse">';
												
												// Preparar y ejecutar la consulta SQL para obtener los capítulos de la unidad actual
												$sql_capitulos = "SELECT nombreCapitulos, ruta FROM capitulos WHERE unidadesId = ?";
												$stmt_capitulos = $conn->prepare($sql_capitulos);
												$stmt_capitulos->execute([$resultado_unidad['idUnidades']]);

												// Obtener los resultados de los capítulos
												$resultados_capitulos = $stmt_capitulos->fetchAll();
											
												// Mostrar los resultados de los capítulos en pantalla
												
												foreach ($resultados_capitulos as $resultado_capitulo) {
													$nombre_vista = $resultado_unidad['ruta'] . '/' . $resultado_capitulo['ruta'];
													echo '<a href="' . $nombre_vista . '" class="capituloboton btn btn-md btn-secondary mb-2 w-50">' . $resultado_capitulo['nombreCapitulos'] . '</a><br>';

												}
												
												echo '</div>';
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="contain">
							<img src="<?= media();?>/images/gifPortada.gif" height="100" class="img-fluid mt-2" alt="">
						</div>
						
					</div>
				</div>
            </div>
        </div>
    </div>
	<?php 
    	footerAprendoMate($data);
	?>