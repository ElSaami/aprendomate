<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="description" content="Software educativo para matematicas 3°Básico Centro Educacional Jorge Huneeus Zegers.">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Cristian San Martin">
        <title><?=$data['page_title']?></title>
        <link rel="shortcut icon" href="<?= media();?>/images/logo_dashboard.png">
        <!-- Main CSS-->
        <!-- Agrega estas líneas en la sección head de tu página -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?=media();?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?=media();?>/css/style.css">
        <style>
            body{
                background: #add1ff;
                
            }
            .container{
                font-family: "Comic Sans MS";
                background: #add1ff;
                
            }
        </style>
    </head>
    <body>
    <div class="container bg-light mt-4 mb-4 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col p-5 rounded-end">
                <!--Logos-->
                <div class="text-start mb-4">
                    <a href="https://jhz.cl"><img src="<?= media();?>/images/Logo_JHZ.png" width="60" class="img-fluid rounded float-start" title="Centro Educacional Jorge Huneeus Zegers"></a>
                    <a href="https://facultades.unab.cl/ingenieria/carreras/ingenieria-computacion-e-informatica/"><img src="<?= media();?>/images/fondo-transparente-logo-color-con-texto-azul-y-3-palabras.png" width="80" class="img-fluid rounded float-right" title="Carrera Ingeniería en Computación e Informática UNAB"></a>
                </div>