<?php

	$conexion=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if (!$conexion) {
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	/*print($dbhost);
	print('</br>');
	print($dbuser);
	print('</br>');
	print($dbpass);
	print('</br>');
	print($dbname);
	print('</br>');*/

    function getSelectV($conexion, $Query){
        $conexion->query("SET NAMES 'utf8'");
        $conexion->query("SET CHARACTER SET utf8");
        $conexion->query("SET SESSION collation_connection = 'utf8_unicode_ci'");
        //die($Query);
        $result = mysqli_query($conexion,$Query);
        $i=0;
        $res=array();

        while($row = mysqli_fetch_array($result)) {
            array_push($res,$row);
            $i++;
        }
        mysqli_free_result($result);
        return $res;
    }
?>