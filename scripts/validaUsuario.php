<?php
    $usuario = $_POST["user"];
    $pass = $_POST["password"];
    
    $passQuery = "SELECT user, password FROM passwords WHERE user='".$usuario."';";
    
    require "conexion.php";
    $consulta = mysqli_query($conecta, $passQuery);    
    $reg=mysqli_fetch_array($consulta, MYSQLI_NUM);
    $consulta = null;
    
    if($usuario == $reg[0] && sha1($pass) == $reg[1])
    {
        $userQuery="SELECT * FROM usuarios WHERE id='".$usuario."';";
        $consulta = mysqli_query($conecta, $userQuery);    
        $user=mysqli_fetch_array($consulta, MYSQLI_NUM);
        
        session_start();
        $_SESSION['userName'] = $user[1];
        //Admin
        if ($usuario == "admin@caoba.com" && sha1($pass) == $reg[1]) {
            
        }
        else { //Mortal
            $_SESSION['userLastName'] = $user[2];
            $_SESSION['userBirthday'] = $user[3];
        }       
    }
    else {
        echo "<script>
                alert('No seas farol');
                window.history.back();
            </script>";
    }
?>