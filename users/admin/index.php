<?php 
    ini_set('display_errors', 'Off');
    session_start();
    if (isset($_SESSION['activeSession'])) {
        //$val hace referencia al menú que se mostrará
        $val = $_POST['seleccionAdmin'];
        $areas = array();
        $departamentos = array();
        
        switch ($val) {
            case 1:
                require "../../scripts/consultas.php";
                muestraUsuarios($areas, $departamentos);
                break;
                
            case 2:
                # code...
                break;
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Acceso administrador</title>
        
        <link rel="stylesheet" href="../../CSS/General.css">
        <link rel="stylesheet" href="../../CSS/Admin.css">
    </head>
        
    <body>
        <header>
            <h1 id="saludo">Hola admin</h1>
            
            <a href="../../scripts/cerrarSesion.php">Cerrar sesión</a>
        </header>
        
        <aside>
            <h2>Menú</h2>
            
            <h3>Usuarios</h3>
            <form action="" method="post">
                <ul>
                    <li id="u1" onclick="evUsuarios(this)"><input type="submit" value="Registrar usuario"/></li>
                    <li id="u2" onclick="evUsuarios(this)"><input type="submit" value="Usuarios registrados"/></li>
                    <input type="hidden" id="hiddenSelection" name="seleccionAdmin" value="-1" />
                </ul>
            </form>
        </aside>
        
        <section id="content">
               
        </section>
            <script type="text/javascript" src="../../scripts/interfaz.js"></script>
            <!--Este script tiene es exclusivo para eventos relacionado con php-->
            <script type="text/javascript">
                if(<?php echo $val ?> == 1)
                {
                    var areas = <?php echo json_encode($areas); ?>;
                    var departamentos = <?php echo json_encode($departamentos); ?>;
                    
                    generaFormAlta(areas, departamentos);
                }                
            </script>
        
        <footer>
            
        </footer>
    </body>
    <script type="text/javascript" src="../../scripts/jsUser.js"></script>
</html>

<?php
    }
    else {
        header("Location:../../login");
    }
?>