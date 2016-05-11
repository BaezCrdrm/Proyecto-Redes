<?php
    ini_set('display_errors', 'Off');
    session_start();
    if (isset($_SESSION['activeSession'])) {
        
?>
<html>
    <head>
        <title>Acceso</title>
    </head>
        
    <body>
        <h1>Hola mortal</h1>
    </body>
</html>
<?php 
    }
    else {
        header("Location:../../login");
    }
?>