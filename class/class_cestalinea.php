<?php
include("../conectar.php");
$bd = new BaseDatos();
$conexion= $bd->conectar(BaseDatos::$db_ud04);
class CestaLinea{

    private $idCestaLinea;
    private $idCesta;
    private $idProducto;
    private $cantidad;
    
    public function __construct($idCestaLinea, $idCesta, $idProducto, $cantidad){

        $this->idCestaLinea=$idProduidCestaLineacto;
        $this->idCesta=$idCesta;
        $this->idProducto=$idProducto;
        $this->cantidad=$cantidad;       
    }

    public static function obtenerProductosCesta($id){

        global $bd;
        $data=[];
        $sql="SELECT p.idProducto, p.ProductoNombre, p.idTipoProducto, p.Unidad, p.Descripcion, p.pvpUnidad, p.Descuento, cl.cantidad FROM producto p, cesta_lineas cl WHERE p.idProducto = cl.idproducto AND cl.idcesta = $id";
        $resultado=$bd->seleccionar($sql);

        while ($prod = mysqli_fetch_assoc($resultado)) {
             $data[]=$prod;
        }
        $var= json_encode($data);
       
        echo $var;

    }


    



    public function getIdCestaLinea() {
        return $this->idCestaLinea;
    }
    public function setIdCestaLinea($idCestaLinea) {
       $this->idCestaLinea=$idCestaLinea;

    }

    public function getIdCesta() {
        return $this->idCesta;
    }
    public function setIdCesta($idCesta) {
       $this->idCesta=$idCesta;

    }

    public function getIdProducto() {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto) {
       $this->idProducto=$idProducto;

    }

    public function getCantidad() {
        return $this->cantidad;
    }
    public function setCantidad($cantidad) {
        $this->cantidad=$cantidad;
    }

    


}