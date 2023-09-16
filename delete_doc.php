<?php
/*
La funcion $client->delete es usada para eliminar documentos
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
//Si no se pudo realizar la conexión mostramos este otro mensaje y nos salimos
else{
    echo 'Conexión fallida</br>';
    exit;
}
//Cargamos el array con los parámetros del documento a borrar
$params = [
    //Nombre del index (bd)
    'index' => 'empresa',
    //Nombre del type (tabla)
    'type' => 'empleados',
    //Nombre del ID
    'id' => '65052c7986d9b'];
//Pasamos los parámetros a la funcion delete de elasticsearch
$response = $client->delete($params);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';