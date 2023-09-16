<?php
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
//Cargamos el array con los parámetros del index (bd) a crear
$params = [
    'index' => 'empresa',
    'body' => [
        'settings' => [
            'number_of_shards' => 5,
            'number_of_replicas' => 1
        ]
    ]
];
//Pasamos los parámetros a la funcion indices()->create de elasticsearch
$response = $client->indices()->create($params);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';