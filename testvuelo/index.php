<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/css/index.css">
    <title>Test Sintomas</title>
</head>

<body>
    <?php 
    include 'tipodocument.php';
    include 'registro.php';
    ?>
    <div id="content">
        <h1>Test de verificación de sintomas diaria</h1>
        <h6>Las personas deben diligenciar diariamente la encuesta de síntomas antes de subirse a su vuelo</h6>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">nombres</label>
                    <input type="text" name="nombres" class="form-control" required id="nombres">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required id="apellidos">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipocedula">Tipo Documento</label>
                    <select id="tipocedula" required name="tipodocumento" class="form-control" >
                        <option >Seleccione</option>
                        <?php
						foreach ($consulacedulas as $elemento) { ?>
							<option value="<?php echo $elemento['iddocumento'] ?>"><?php echo $elemento['tipodocumento'] ?></option>
						<?php
						}
						?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="numerodocumento">Numero Documento</label>
                    <input type="number" required class="form-control" id="numerodocumento" name="numerodocumento">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="correo">Correo</label>
                    <input type="email" required class="form-control" id="correo" name="correo">
                </div>
                <div class="form-group col-md-6">
                    <label for="celular">Numero Celular</label>
                    <input type="number" required class="form-control" id="celular" name="celular">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>