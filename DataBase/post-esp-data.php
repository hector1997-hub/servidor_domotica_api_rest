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

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $Id_Sensor = $Sensor = $Valor = $Fecha = $Hora = "a";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $Id_Sensor = test_input($_POST["Id_Sensor"]);
        $Sensor = test_input($_POST["Sensor"]);
        $Valor = test_input($_POST["Valor"]);
        $Fecha = test_input($_POST["Fecha"]);
        $Hora = test_input($_POST["Hora"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $cadDt="$Id_Sensor,$Sensor,$Valor,"; 
        $cadFH="CURRENT_DATE,CURRENT_TIME";
        $cad=$cadDt.$cadFH;
        $sql = "INSERT INTO dispositivos (Id_Sensor,Sensor,Valor,Fecha, Hora)
        VALUES ($cad)";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
