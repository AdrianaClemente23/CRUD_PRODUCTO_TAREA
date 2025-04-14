<?php
include_once 'conexion.php';

class Producto extends Conexion {
    public $producto_id; 
    public $producto_nombre;
    public $producto_precio; 
    public $producto_situacion; 

    public function __construct($args = []) {
        $this->producto_id = $args['producto_id'] ?? null;
        $this->producto_nombre = $args['producto_nombre'] ?? '';
        $this->producto_precio = $args['producto_precio'] ?? '';
        $this->producto_situacion = $args['producto_situacion'] ?? '1'; 
    }
    
    public function guardar() {
        $sql = "INSERT INTO productos(producto_nombre, producto_precio, producto_situacion)
                VALUES ('$this->producto_nombre', '$this->producto_precio', '$this->producto_situacion')";
        $data = $this->ejecutar($sql);
        return $data;
    }

    public function listar() {
        $sql = "SELECT * FROM productos WHERE producto_situacion = '1'";
        $datos = $this->traer($sql);
        return $datos;
    }
}
?>