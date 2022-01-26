<?php
    require 'conexion.php';
    //session_start();

    class fun{
        
        function consultarTodo(){
            $query="Select * from dispositivos ";
            $consulta=mysqli_query($conexion,$query);
            $respuesta=mysqli_fetch_array($consulta);
            echo 'Consulta exitosa';
            echo '';
            echo '<pre>';
            var_dump ($respuesta);
            echo '</pre>';
        }
        
        function modificar(){
            $query="UPDATE 'dispositivos'
                    SET  'Valor'='$Nvalor'
                    WHERE 'Id_Medida'= '$IdMedida'";
            $consulta=mysqli_query($conexion,$query);
            $respuesta=mysqli_fetch_array($consulta); 
            echo 'Modificacion exitosa';
       }       
          
        
   }
    
    //$func =new fun();
   // $func->consultarTodo();
?>