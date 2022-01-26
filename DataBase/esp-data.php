<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "sensordb";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "1234";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `dispositivos`";
//Id_Medida	Id_Sensor	Sensor	Valor	Fecha	Hora

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>Id_Medida</td> 
        <td>Id_Sensor</td> 
        <td>Sensor</td> 
        <td>Valor</td> 
        <td>Fecha</td>
        <td>Hora</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_Id_Medida = $row["Id_Medida"];
        $row_Id_Sensor = $row["Id_Sensor"];
        $row_Sensor = $row["Sensor"];
        $row_Valor = $row["Valor"];
        $row_Fecha = $row["Fecha"]; 
        $row_Hora = $row["Hora"]; 
        //$row_reading_time = $row["reading_time"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_Id_Medida . '</td> 
                <td>' . $row_Id_Sensor . '</td> 
                <td>' . $row_Sensor . '</td> 
                <td>' . $row_Valor . '</td> 
                <td>' . $row_Fecha . '</td>
                <td>' . $row_Hora . '</td>                
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
