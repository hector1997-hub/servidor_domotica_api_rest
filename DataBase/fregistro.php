<?php
    include 'conexion.php';
    session_start();
    if(isset($_POST)){
        $name=$_POST['inputFirstName'];
        $lastname= $name=$_POST['inputLastName'];
        $nick=$_POST['inputUser'];
        $email=$_POST['inputEmailAddress'];
        $pass1=$_POST['inputPassword'];
        $pass2=$_POST['inputConfirmPassword'];

        if($name == "" || $lastname=="" || $nick=="" || $email=="" || $pass1=="" || $pass2=="" )
        {
            echo   "Faltan datos";
            return "Faltan Datos";
        }
        else{
        
        if ($pass1==$pass2){
            $query="Select count(*) as Cant from usuarios where Nickname='$nick'";
            $consulta=mysqli_query($conexion,$query);
            $resultado=mysqli_fetch_array($consulta); 
            if($resultado['Cant']>0){
                echo    'Usuario ya existe';
                return 'Usuario ya existe';
            }else{
                $query="Select count(*) as Cant from usuarios where Email='$email'";
                $consulta=mysqli_query($conexion,$query);
                $resultado=mysqli_fetch_array($consulta); 
                if($resultado['Cant']>0){
                    echo 'Correo ya usado';
                    return 'Correo ya usado';
                }else{
                    $query="INSERT INTO usuarios (Nombre, Apellido, Nickname, Email, Password, Id_Rol)
                            VALUES ('$name', '$lastname', '$nick', '$email','$pass1', '2');";
                    $consulta=mysqli_query($conexion,$query);
                    if(!$consulta){
                        die('Consulta fallida');
                    }
                    else{
                        echo 'Ha sido registrado con exito';
                        return 'Ha sido registrado con exito';
                        //header("location:../dist/login.php");
                    }     
                }
            }
            
        }else{
            echo 'Las contraseñas no coinciden';
        }
    }

    }
    
   


        

    
?>