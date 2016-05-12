<?php
    ini_set('display_errors', 'Off');
    session_start();
    if (isset($_SESSION['activeSession'])) {
        $nombre = $_SESSION['userName'];
        $apellido = $_SESSION['userLastName'];
        $id = $_SESSION['id'];
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Acceso de <?php echo $nombre;?></title>
        
        <link rel="stylesheet" href="../CSS/General.css">
        <link rel="stylesheet" href="../CSS/User.css">
    </head>
        
    <body>
        <header>
            <h1 id="saludo">Hola <?php echo $nombre;?></h1>
            <div>
                <h4 id="userId"><?php echo $id;?></h4>
                <a href="../scripts/cerrarSesion.php">Cerrar sesión</a>
            </div>
        </header>
        
        <section id="content">
            <h1><?php echo $nombre;?>, tu espacio está en <a href="../wip.html">costrucción</a> y pronto estará disponible.</h1>
        </section>
    </body>
</html>
<?php 
    }
    else {
        header("Location:../../login");
    }
?>