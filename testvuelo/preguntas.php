<?php
    include 'conexion_mysql.php';
        $consulta = "SELECT * FROM preguntastest";
	    $consultapreguntas = mysqli_query($conex,$consulta);
?>