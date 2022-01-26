<?php
    require 'conexion.php';
    session_start();         

    $user=$_POST['inputUser'];
    echo($user);
    $pass=$_POST['inputPassword'];
    echo($pass);

    $query="Select count(*) as Cant,Nickname,Id_Rol  from usuarios where (Nickname='$user' or Email='$user') and Password='$pass'";
    $consulta=mysqli_query($conexion,$query);
    $resultado=mysqli_fetch_array($consulta);

    if($resultado['Cant']==1){

        $_SESSION["Nickname"]=$resultado['Nickname'];
        $_SESSION["RolUsuario"]=$resultado['Id_Rol'];        
        
        header("location:../dist/index.php");
    }else{
        header("location:../dist/login.php");      
    }  
        

    
?>