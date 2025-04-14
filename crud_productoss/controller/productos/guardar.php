<?php
include_once '../../modelos/producto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $producto = new Producto($_POST);
    

    $errores = [];
    
    if (empty($producto->producto_nombre)) {
        $errores[] = 'debe ingresar nombre del producto';
    }
    
    if (empty($producto->producto_precio)) {
        $errores[] = 'debe ingresar prrecio del producto';
    } elseif (!is_numeric($producto->producto_precio)) {
        $errores[] = 'ingrese por favor valor numerico';
    }
    
  
    if (empty($errores)) {
        $resultado = $producto->guardar();
        
        if ($resultado['resultado']) {
           
            header('Location: ../../views/productos/index.php?mensaje=guardado');
            exit;
        } else {
            $errores[] = 'Error al guardar en la base de datos';
        }
    }


    if (!empty($errores)) {
        session_start();
        $_SESSION['errores'] = $errores;
        $_SESSION['datos'] = $_POST;
        header('Location: ../../views/productos/index.php');
        exit;
    }
}
?>