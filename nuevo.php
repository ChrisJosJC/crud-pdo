<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$comando = $con->prepare("SELECT id,`nombre` FROM `departamento` WHERE 1");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar empleados</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevos empleados</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">

                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required autofocus>
                        </div>

                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Edad</label>
                            <input type="number" id="edad" name="edad" class="form-control" required autofocus>
                        </div>
                        <div class="col-md-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" required autofocus>
                        </div>
                        <div class="col-md-8">
                            <label for="descripcion" class="form-label">Direccion</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Salario</label>
                            <input type="number" id="salario" name="salario" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <label for="descripcion" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <select class="col-md-4" name="genero" id="genero">
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                        </select>
                        <select class="col-md-4" name="departamento" id="departamento">
                            <?php var_dump($resultado);
                            foreach ($resultado as $row) {
                                echo $row["nombre"]; ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="index.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>