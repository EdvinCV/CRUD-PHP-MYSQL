<?php

session_start();

    try {
        $conexion = new PDO('mysql:host=127.0.0.1; dbname=crud', 'root', '');

       // if(isset($conexion))
          //  echo "Conexion realizada correctamente.";
            
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }




?>