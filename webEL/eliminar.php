<?php 
    if(!isset($_GET['Id_empleadosL'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $Id_empleadosL = $_GET['Id_empleadosL'];

    $sentencia = $bd->prepare("DELETE FROM empleadosEL where Id_empleadosL = ?;");
    $resultado = $sentencia->execute([$Id_empleadosL]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>