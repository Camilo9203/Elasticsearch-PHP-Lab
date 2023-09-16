<?php
/*
La funcion $client->indices()->delete Borra el indice que le pasemos
*/
//Cargamos las librerías
require 'vendor/autoload.php';
//Llamamos las librerías de elasticsearch
use Elasticsearch\ClientBuilder;
//Inicializamos el cliente de elasticsearch
$client = ClientBuilder::create()->build();
//Si la conexión fue exitosa mostramos este mensaje
if ($client) {
    echo 'Conexión exitosa</br>';
}
//Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
else{
    echo 'Conexión fallida</br>';
    exit;
}
//Cargamos el array con los parámetros del index (bd) a borrar
$deleteParams = [
    //Nombre del index (bd)
    'index' => 'customer'
];
//Pasamos los parámetros a la funcion indices()->delete de elasticsearch
$response = $client->indices()->delete($deleteParams);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';