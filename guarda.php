<?php

require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$departamento = $_POST['departamento'];
$salario = $_POST['salario'];
$telefono = $_POST['telefono'];
if (isset($_POST['id'])) {
    
    
    $id = $_POST['id'];
    
    $query = $con->prepare(
    "UPDATE productos SET (:nombre, :direccion, :telefono, :edad, :genero,:email,:departamento,:salario)");
    $query->bindParam(":nombre", $nombre);
    $query->bindParam(":direccion", $direccion);
    $query->bindParam(":telefono", $telefono);
    $query->bindParam(":edad", $edad);
    $query->bindParam(":genero", $genero);
    $query->bindParam(":email", $email);
    $query->bindParam(":departamento", $departamento);
    $query->bindParam(":salario", $salario);
    $resultado = $query->execute();

    if ($resultado) {
        $correcto = true;
    }
} else {
    // $nombre = $_POST['nombre'];
    // $descripcion = $_POST['descripcion'];
    // $stock = $_POST['stock'];
    // $inventariable = isset($_POST['inventariable']) ? $_POST['inventariable'] : 0;

    // if ($stock == '') {
    //     $stock = 0;
    // }

    $query = $con->prepare("INSERT INTO `empleado`(`nombre`, `direccion`, `telefono`, `edad`, `genero`, `email`, `departamento`, `salario`) VALUES (:nombre, :direccion, :telefono, :edad, :genero,:email,:departamento,:salario)");
    $query->bindParam(":nombre",$nombre);
    $query->bindParam(":direccion",$direccion);
    $query->bindParam(":telefono",$telefono);
    $query->bindParam(":edad",$edad);
    $query->bindParam(":genero",$genero);
    $query->bindParam(":email",$email);
    $query->bindParam(":departamento",$departamento);
    $query->bindParam(":salario",$salario);
    // array('cod' => $nombre, 'descr' => $descripcion, 'inv' => $inventariable, 'sto' => $stock)
    $resultado = $query->execute();

    if ($resultado) {
        $correcto = true;
        echo $con->lastInsertId();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Registro guardado</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>