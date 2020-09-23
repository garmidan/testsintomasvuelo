<?php
include 'conexion_mysql.php';
if (isset($_POST['registrar'])) {
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $tipodocumento = trim($_POST['tipodocumento']);
    $numerodocumento = trim($_POST['numerodocumento']);
    $correo = trim($_POST['correo']);
    $celular = trim($_POST['celular']);

    $validarcedula = "SELECT * FROM usuario WHERE numerodocumento = '$numerodocumento'";
    $resultadovalidarcedula = mysqli_query($conex, $validarcedula);
    if ($row = mysqli_fetch_row($resultadovalidarcedula)) {
        foreach ($resultadovalidarcedula as $elemento){
            $fechaactual = date("Y-m-d H:i:s");
            $fechaprueba = $elemento["fechaprueba"];
            $timestamp1 = strtotime($fechaprueba);
            $timestamp2 = strtotime($fechaactual);
            $hour = abs($timestamp2 - $timestamp1)/(60*60) ;
            if ($hour >= 24) {
                $insertusuario = "INSERT INTO usuario (nombres, apellidos, iddocumento, numerodocumento,
                correo, celular) VALUES ('$nombres', '$apellidos', '$tipodocumento', '$numerodocumento', '$correo', '$celular')";
                $resultadosconsulta = mysqli_query($conex, $insertusuario);
                if ($resultadosconsulta) {
                ?>
                   <script>
                       location.href = "testsintomas.php";
                   </script>
               <?php
                } 
            } else {
               echo "Recuerda que debe pasar minimo 24 horas para volver hacer el test";
            }
        }
    }else {
        $insertusuario = "INSERT INTO usuario (nombres, apellidos, iddocumento, numerodocumento,
        correo, celular) VALUES ('$nombres', '$apellidos', '$tipodocumento', '$numerodocumento', '$correo', '$celular')";
        $resultadosconsulta = mysqli_query($conex, $insertusuario);
        if ($resultadosconsulta) {
        ?>
           <script>
            localStorage.setItem('validar', '1');
            location.href = "testsintomas.php";
           </script>
       <?php
        } 
    }
}
?>