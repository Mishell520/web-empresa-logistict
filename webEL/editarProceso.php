<?php
    print_r($_POST);
    if(!isset($_POST['Id_empleadosL'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $Id_empleadosL = $_POST['Id_empleadosL'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $edad = $_POST['txtEdad'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $fecha_ingreso= $_POST['txtFecha_ingreso'];
    $puesto = $_POST['txtPuesto'];


    $sentencia = $bd->prepare("UPDATE empleadosEL SET nombre = ?, apellido= ?,edad = ?,telefono = ?,direccion= ?,fecha_ingreso = ?, puesto= ? where Id_empleadosL = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $edad, $telefono, $direccion, $fecha_ingreso, $puesto, $Id_empleadosL]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>