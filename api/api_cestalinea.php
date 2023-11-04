<?php
header("Content-Type: application/json");
include_once("../class/class_cestalinea.php"); //incluimos clase cliente


$_POST=json_decode(file_get_contents('php://input'),true); //decodificar el json


switch($_SERVER['REQUEST_METHOD']){
    
    case 'GET':
        if (isset($_GET['id'])){
            CestaLinea::obtenerProductosCesta($_GET['id']);       
        }
        break;
}
?>