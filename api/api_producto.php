<?php
header("Content-Type: application/json");
include_once("../class/class_producto.php"); //incluimos clase cliente


$_POST=json_decode(file_get_contents('php://input'),true); //decodificar el json


switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        if (isset($_POST['ProductoNombre']) && isset($_POST['idTipoProducto']) && isset($_POST['Unidad'])
            && isset($_POST['Descripcion']) && isset($_POST['pvpUnidad']) && isset($_POST['Descuento']) ){

            $producto= new Producto(null,$_POST['ProductoNombre'],$_POST['idTipoProducto'], $_POST['Unidad'],$_POST['Descripcion'],$_POST['pvpUnidad'],$_POST['Descuento']);
            $producto->guardarProducto();
        }else{
            echo "Faltan datps";
        }
     
        break;        
    case 'GET':
        Producto::obtenerProductos();       
        break;

    case 'PUT':
        if (isset($_GET['id']) && isset($_GET['precio'])){
            $producto= new Producto($_GET['id'],null,null,null,null,$_GET['precio'],null);
            $producto->actualizarPrecio();
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])){
            Producto::eliminarProducto($_GET['id']);           
        }
        break;

    }
?>