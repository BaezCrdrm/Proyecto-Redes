<?php
    $area = $_POST["area"];
    $departamento = $_POST["deps"];
    $direccion = $_POST["direccion"];
    $subd = $_POST["subdominio"];
    $nombre = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];
    $id = $direccion."@".$subd;
    
    $query = "INSERT INTO usuarios (id, nombre, apellidos, fechaNac) values ('".$id."', '".$nombre."', '".$apellidos."', '".$fecha."'); "; 
 
    require "consultas.php";
    $myBool = genQuery($query);
    $query = "INSERT INTO trabDeps (idTrab, idArea, idDep) values ('".$id."', '".$area."', '".$departamento."');";
    $myBool = genQuery($query);
    
    echo "<script type='text/javascript'>";
    if ($myBool == true) {
        echo "alert('Se ha registrado correctamente al nuevo usuario');";
    }
    else {
        echo "alert('Hubo un problema al realizar la operación');";
    }
    echo "window.location.href='../users/admin';
    </script>";
?>