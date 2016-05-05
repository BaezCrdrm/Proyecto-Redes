<?php 
    function genSelect($query)
    {
        require "conexion.php";
        
        $consulta = mysqli_query($conecta, $query);
        return $consulta;
    } 
    
    function muestraUsuarios()
    {
        //$query = "SELECT "
    }   
?>