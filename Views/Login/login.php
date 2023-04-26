<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<title><?=$data['page_title']?></title>
    <link rel="shortcut icon" href="<?= media();?>/images/logo_dashboard.png">
  	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="shortcut icon" href="<?= media();?>/images/favicon.ico">
	<!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
  	<link rel="stylesheet" href="<?= media();?>/css/login.css">
	<link rel="stylesheet" href="<?= media();?>/scss/login.scss">
</head>
<style>
    .container{
        font-family: "Comic Sans MS";
        background: #add1ff;
    }
</style>
<body>
  	<main class="login-content d-flex align-items-center min-vh-100 py-3 py-md-0">
    	<div class="container">
    	  	<div class="card login-card">
    	    	<div class="row no-gutters">
    	      		<div class="col-md-5">
    	        		<img src="assets/images/pruebalogin.png" alt="login" class="login-card-img">
    	      		</div>
    	      		<div class="col-md-7">
    	      		  	<div class="card-body">
    	      		  	  	<div class="brand-wrapper">
								<div class="text-start mb-4">
									<a href="https://jhz.cl"><img src="<?= media(); ?>/images/Logo_JHZ.png" width="65" class="img-fluid rounded float-start" title="Centro Educacional Jorge Huneeus Zegers"></a>
									<a href="https://facultades.unab.cl/ingenieria/carreras/ingenieria-computacion-e-informatica/"><img src="<?= media(); ?>/images/fondo-transparente-logo-color-con-texto-azul-y-3-palabras.png" width="90" class="img-fluid rounded float-right" title="Carrera Ingeniería en Computación e Informática UNAB"></a>
								</div>
								<img src="assets/images/logoAprendoMate.svg" alt="logo" class="logo">
    	      		  	  	</div>
    	      		  	  	<p class="login-card-description font-weight-bold">Iniciar Sesión</p>
    	      		  	  	<form class="login-form" name="formLogin" id="formLogin" action="">
    	      		  	  	    <div class="form-group">
    	      		  	  	      	<label for="txtUsuario" class="sr-only">Usuario</label>
    	      		  	  	      	<input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuario">
    	      		  	  	    </div>
    	      		  	  	    <div class="form-group mb-4">
    	      		  	  	     	<label for="txtPassword" class="sr-only">Contraseña</label>
    	      		  	  	     	<input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="***********">
    	      		  	  	    </div>
    	      		  	  	    <div class="form-prompt-wrapper">
    	      		  	  	      	<div class="custom-control custom-checkbox login-card-check-box">
    	      		  	  	      		<input type="checkbox" class="custom-control-input" id="customCheck1">
    	      		  	  	  			<label class="custom-control-label" for="customCheck1">Recuérdame</label>
    	      		  	  			</div>
								</div>
								<input name="login" id="login" class="btn btn-block login-btn mt-4 mb-4" type="submit" value="Ingresar">
								<div id="alertLogin" class="text-center"></div>
								
    	      		  	  	</form>
						</div>
    	      		</div>
    	    	</div>
    	  	</div>
		</div>
  	</main>
	  	<script>
        	const base_url = "<?= base_url(); ?>";
    	</script>
	  	<!-- Essential javascripts for application to work-->
	  	<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
	  	<script src="<?= media(); ?>/js/popper.min.js"></script>
	  	<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
	  	<script src="<?= media(); ?>/js/fontawesome.js"></script>
	  	<script src="<?= media(); ?>/js/main.js"></script>
	  	<!-- The javascript plugin to display page loading on top-->
	  	<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
	  	<script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script>
	  	<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>

</body>
</html>
