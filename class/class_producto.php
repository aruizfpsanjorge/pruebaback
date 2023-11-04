<?php
include("../conectar.php");
$bd = new BaseDatos();
$conexion= $bd->conectar(BaseDatos::$db_ud04);

class Producto{

    private $idProducto;
    private $nombre;
    private $idTipoProducto;
    private $unidad;
    private $descripcion;
    private $pvpUnidad;
    private $descuento;

    public function __construct($idProducto, $nombre, $idTipoProducto, $unidad, $descripcion, $pvpUnidad, $descuento){

        $this->idProducto=$idProducto;
        $this->nombre=$nombre;
        $this->idTipoProducto=$idTipoProducto;
        $this->unidad=$unidad;
        $this->descripcion=$descripcion;
        $this->pvpUnidad=$pvpUnidad;
        $this->descuento=$descuento;
    }

    public function guardarProducto(){

        global $bd;
        $sql = "INSERT INTO producto (ProductoNombre,idTipoProducto,Unidad,Descripcion,pvpUnidad,Descuento) 
        VALUES ('$this->nombre',$this->idTipoProducto,$this->unidad,'$this->descripcion',$this->pvpUnidad,$this->descuento)";

        $bd->insertar($sql);
    }

    public function actualizarPrecio(){

        global $bd;
        $sql = "UPDATE producto SET pvpUnidad = $this->pvpUnidad WHERE idProducto = $this->idProducto";
        $bd->update($sql);
    }

    public static function obtenerProductos(){

        global $bd;
        $data=[];
        $sql="SELECT * FROM producto";
        $resultado=$bd->seleccionar($sql);

        while ($prod = mysqli_fetch_assoc($resultado)) {
             $data[]=$prod;
        }
        $var= json_encode($data);
       
        echo $var;

    }


    public static function eliminarProducto($id){
        global $bd;
        $sql="DELETE FROM producto where idProducto='".$id."'";
        $resultado=$bd->eliminar($sql);
    }



    public function getIdProducto() {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto) {
       $this->idProducto=$idProducto;

    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre=$nombre;
    }

    public function getIdTipoProducto() {
        return $this->idTipoProducto;
    }
    public function setIdTipoProducto($idTipoProducto) {
       $this->idTipoProducto=$idTipoProducto;

    }

    public function getUnidad() {
        return $this->unidad;
    }
    public function setUnidad($unidad) {
        $this->unidad=$unidad;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion=$descripcion;
    }
    public function getPVPUnidad() {
        return $this->pvpUnidad;
    }
    public function setPVPUnidad($pvpUnidad) {
        $this->pvpUnidad=$pvpUnidad;
    }
    public function getDescuento() {
        return $this->descuento;
    }
    public function setDescuento($descuento) {
        $this->descuento=$descuento;
    }
}