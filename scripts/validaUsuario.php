<?php
    $usuario = $_POST["user"];
    $pass = $_POST["password"];
    require "consultas.php";
    
    $passQuery = "SELECT user, password FROM passwords WHERE user='".$usuario."';";
    $reg=mysqli_fetch_array(genQuery($passQuery), MYSQLI_NUM);
    
    if($usuario == $reg[0] && sha1($pass) == $reg[1])
    {
        $userQuery="SELECT * FROM usuarios WHERE id='".$usuario."';";
        $user=mysqli_fetch_array(genQuery($userQuery), MYSQLI_NUM);
        
        session_start();
        $_SESSION['userName'] = $user[1];
        $_SESSION['activeSession'] = true;
        $direccion = "";
        //Admin
        if ($usuario == "admin@caoba.com" && sha1($pass) == $reg[1]) {
            $direccion .= "admin";
        }
        else { //Mortal
            $_SESSION['userLastName'] = $user[2];
            $_SESSION['userBirthday'] = $user[3];
        }
        header("Location:../users/".$direccion);     
    }
    else {
        echo "<script>
                alert('No seas farol');
                window.history.back();
            </script>";
    }
?>