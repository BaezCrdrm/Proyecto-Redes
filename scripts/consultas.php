<?php 
    function genQuery($query)
    {
        require "conexion.php";
        
        $consulta = mysqli_query($conecta, $query);
        return $consulta;
    } 
    
    function muestraUsuarios()
    {
        $query = "SELECT usuarios.id, usuarios.nombre, usuarios.apellidos, areas.nombreArea, departamentos.nombreDep FROM trabDeps INNER JOIN usuarios ON trabDeps.idTrab = usuarios.id INNER JOIN areas ON trabDeps.idArea=areas.id INNER JOIN departamentos ON trabDeps.idDep = departamentos.id;";
        
        $consulta = genQuery($query);
        $tabla = "<form action='../../users/detalles/' method='post'><table id='detalles'>
            <th>Correo / ID</th>
            <th>Nombre</th>
            <th>Area</th>
            <th>Departamento</th>
            <th></th>
            <th></th>";
        $i = 0;
        while ($reg=mysqli_fetch_array($consulta, MYSQLI_NUM)) {
            $tabla .= "<tr>
            <td id='idU".$i."'>".$reg[0]."</td>
            <td>".$reg[1]." ".$reg[2]."</td>
            <td>".$reg[3]."</td>
            <td>".$reg[4]."</td>
            <td><input type='submit' class='btnBorrar' value='Borrar' onclick=\"btnUsEsp(this, 'idU".$i."')\"/></td>
            <td><input type='submit' class='btnDetalles' value='Detalles' onclick=\"btnUsEsp(this, 'idU".$i."')\"/></td>
            </tr>";
            $i++;
            
            // <td><button class='btnBorrar' value='".$reg[0]."' onclick='btnUsEsp(this)'>Eliminar</button></td>
            // <td><button class='btnDetalles' value='".$reg[0]."' onclick='btnUsEsp(this)'>Detalles</button></td>
        }
        $tabla .= "
                <input type='hidden' name='accion' id='hiddenAction' value=''/>
                <input type='hidden' name='cuenta' id='hiddenCuenta' value=''/>
                <input type='hidden' name='password' id='hiddenPass' value=''/>
            </table>
        </form>";
        return $tabla;
    } 
    
    function obtieneAreasDep(&$areas, &$departamentos)
    {
        //carga áreas
        $query = "SELECT * FROM areas;";
        $consulta = genQuery($query);
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
        $consulta = genQuery($query);
        while($reg = mysqli_fetch_array($consulta, MYSQLI_NUM))
        {
            $departamentos[$i][0] = $reg[0];
            $departamentos[$i][1] = $reg[1];
            $departamentos[$i][2] = $reg[2];
            $i++;
        }
    }  
    
    function consultaUsuario($id)
    {
        $query = "SELECT trabDeps.idTrab, trabDeps.idArea, trabDeps.idDep, trabDeps.descripcion, usuarios.nombre, usuarios.apellidos, usuarios.fechaNac from trabDeps inner join usuarios ON trabDeps.idTrab = usuarios.id WHERE usuarios.id='".$id."';";
        /*
            0->idTrab
            1->idArea
            2->idDep
            3->descripcion
            4->nombre
            5->apellidos
            6->fechaNac
        */
        
        $consulta = genQuery($query);
        $arreglo = array();
        if($reg = mysqli_fetch_array($consulta, MYSQLI_NUM))
        {
            for ($i=0; $i <count($reg) ; $i++) { 
                $arreglo[$i] = $reg[$i];
            }
            
            return $arreglo;
        }
    }
?>