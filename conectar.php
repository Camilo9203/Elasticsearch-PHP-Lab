<?php
//Cargamos las librerías
require 'vendor/autoload.php';
//Llamamos las librerías de elasticsearch
use Elasticsearch\ClientBuilder;
//Inicializamos el cliente de elasticsearch
$client = ClientBuilder::create()->build();
//Si la conexion fue exitosa mostramos este mensaje
if ($client) {
    echo 'Conexión exitosa</br>';
}
//Si no se pudo realizar la conexión mostramos este otro mensaje y nos salimos
else{
    echo 'Conexión fallida</br>';
    exit;
}