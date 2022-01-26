<?php
   include 'conexion.php';
   $query = "SELECT * FROM dispositivos ORDER BY Fecha,Hora";
   $result = mysqli_query($conexion,$query);  
    $json =array();
    
    while($row=mysqli_fetch_array($result)){
        $json[]= array(
            'id'=>$row['Id_Medida'],
            'sensor'=> $row['Sensor'],
            'medida'=> $row['Valor'],
            'fecha'=> $row['Fecha'],
            'hora'=> $row['Hora']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring; 
  
?>
