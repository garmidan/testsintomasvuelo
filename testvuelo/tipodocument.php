<?php
    include 'conexion_mysql.php';
        $consulta = "SELECT * FROM tipodocumento";
	    $consulacedulas = mysqli_query($conex,$consulta);
?>