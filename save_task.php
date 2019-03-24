<?php

    include("db.php");
    if(isset($_POST['save_task'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];

        $query = $conexion->prepare("INSERT INTO task(Title,Description) VALUES (?,?);");
        $resultado = $query->execute([$title,$desc]);

        if($resultado)
            echo "Ingresado correctamente";
        else 
            echo "No se ha podido ingresar.";

        $_SESSION['mensaje'] = 'Task Saved Succesfully';
        $_SESSION['message_type'] = 'success';
         header("Location:  index.php");   
    }

 
?> 