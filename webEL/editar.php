<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['Id_empleadosL'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $Id_empleadosL= $_GET['Id_empleadosL'];

    $sentencia = $bd->prepare("select * from empleadosEL where Id_empleadosL = ?;");
    $sentencia->execute([$Id_empleadosL]);
    $empleadosEL = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $empleadosEL->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" required 
                        value="<?php echo $empleadosEL->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $empleadosEL->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtTelefono" autofocus required
                        value="<?php echo $empleadosEL->telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $empleadosEL->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha_ingreso: </label>
                        <input type="text" class="form-control" name="txtFecha_ingreso" required 
                        value="<?php echo $empleadosEL->fecha_ingreso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto: </label>
                        <input type="text" class="form-control" name="txtPuesto" required 
                        value="<?php echo $empleadosEL->puesto; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="Id_empleadosL" value="<?php echo $empleadosEL->Id_empleadosL; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>