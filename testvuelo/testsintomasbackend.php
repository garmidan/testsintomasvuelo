<?php
include 'conexion_mysql.php';
include 'preguntas.php';
if (isset($_POST['registrartest'])) {
    $si = 0;
    $no = 0;
    $qr = 0;
    foreach ($consultapreguntas as $elemento) {
        $idelement = $elemento["idtest"];
        if (isset($_POST["si$idelement"])) {
            $si = $si +1;
        }else{
            $no = $no +1;
        }
    }
    $consultaultimoregistro = "SELECT MAX(idusuario) AS idusuario FROM usuario";
    $idusuarioltimo = mysqli_query($conex, $consultaultimoregistro);
    if ($row = mysqli_fetch_row($idusuarioltimo)) {
        $id = trim($row[0]);
        if ($si >=2) {
            $qr = 1;
        } elseif($si==1){
            $qr = 2;
        }elseif($si == 0){
            $qr = 3;
        }
        $ahora = date("Y-m-d H:i:s");
        $qredit="UPDATE usuario SET fechaprueba = '$ahora', codigoqr = '$qr' WHERE usuario.idusuario = '$id'";
        $resultadosconsulta = mysqli_query($conex, $qredit);
        if ($resultadosconsulta) {
            ?>
			<script>
                localStorage.setItem('validar', '1');
				location.href = "mostrarresultado.php";
			</script>
			<?php
        } else {
            echo "Se ha producido un error";
        }
        
    }
    
}  
?>