<?php
/**
 * La funcion $client->get llamamos los datos del index (bd)
 * 
 * */
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
//Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
else{
    echo 'Conexión fallida</br>';
    exit;
}
//Cargamos el array con los parámetros de la consulta
$params = [
    //Nombre del INDEX (bd) a llamar
    'index' => 'empresa',
    //Nombre del type (tabla)
    'type' => 'empleados',
    //Nombre del ID del documento autogenerado
    'id' => '65052c7986d9b'
];
//Pasamos los parámetros a la funcion get de elasticsearch
$response = $client->get($params);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';