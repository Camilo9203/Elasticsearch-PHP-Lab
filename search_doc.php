<?php
/*
La funcion $client->search podemos hacer un consulta con DSL (Domain Specific Language)
*/
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
//Cargamos el array con los parámetros de la búsqueda
$params = [
    //Nombre del index (bd)
    'index' => 'empresa',
    //Nombre del type (tabla)
    'type' => 'empleados',
    //Le decimos que vamos a buscar dentro del cuerpo del documento
    'body' => [
        'query' => [
            //Donde debe coincidir el campo
            'match' => [
                'name' => 'Eugenio'
            ]
        ]
    ]
];
//Pasamos los parámetros a la funcion search de elasticsearch
$response = $client->search($params);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';