<?php
session_start();
$errores = $_SESSION['errores'] ?? [];
$datos = $_SESSION['datos'] ?? [];
unset($_SESSION['errores']);
unset($_SESSION['datos']);
?>

<?php include_once '../../views/productos/templates/header.php'; ?>
<?php include_once '../productos/templates/navbar.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registro de Productos</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'guardado'): ?>
                        <div class="alert alert-success">
                            ¡Éxito! El producto ha sido guardado correctamente.
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($errores)): ?>
                        <div class="alert alert-danger">
                            Error:
                            <ul class="mb-0">
                                <?php foreach($errores as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <form action="../../controller/productos/guardar.php" method="POST">
                        <div class="mb-3">
                            <label for="producto_nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="producto_nombre" name="producto_nombre" 
                                   value="<?php echo $datos['producto_nombre'] ?? ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="producto_precio" class="form-label">Precio:</label>
                            <input type="number" step="0.01" class="form-control" id="producto_precio" name="producto_precio" 
                                   value="<?php echo $datos['producto_precio'] ?? ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../productos/templates/footer.php'; ?>