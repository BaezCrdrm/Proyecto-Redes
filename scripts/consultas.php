<?php 
    function genSelect($query/*, $con = null*/)
    {
        require "conexion.php";
        
        $consulta = mysqli_query($conecta, $query);
        return $consulta;
    } 
    
    function muestraUsuarios(&$areas, &$departamentos)
    {
        // $areas;
        // $departamentos;
        
        obtieneAreasDep($areas, $departamentos);
    } 
    
    function obtieneAreasDep(&$areas, &$departamentos)
    {
        //require "conexion.php";
        //carga áreas
        $query = "SELECT * FROM areas;";
        $consulta = genSelect($query);
        $i = 0;
        while($reg = mysqli_fetch_array($consulta, MYSQLI_NUM))
        {
            $areas[$i][0] = $reg[0];
            $areas[$i][1] = $reg[1];
            $areas[$i][2] = $reg[2];
            $i++;            
        }
        
        //carga departamentos
        $reg = null;
        $i = 0;
        $query = "SELECT id, nombreDep, areaPert FROM departamentos;"; 
        $consulta = genSelect($query);
        while($reg = mysqli_fetch_array($consulta, MYSQLI_NUM))
        {
            //$output[]=array_map('utf8_encode', $row);
            $departamentos[$i][0] = $reg[0];
            $departamentos[$i][1] = $reg[1];
            $departamentos[$i][2] = $reg[2];
            $i++;
        }
    }  
?>