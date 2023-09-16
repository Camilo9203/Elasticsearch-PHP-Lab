<?php
//Cargamos las librerías
require 'vendor/autoload.php';
//Llamamos las librerías de elasticsearch
use Elasticsearch\ClientBuilder;
//Inicializamos el cliente de elasticsearch
$client = ClientBuilder::create()->build();
//Si la conexion fue exitosa mostramos este mensaje
if ($client) :
    echo 'Conexión exitosa</br>';
//Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
else:
    echo 'Conexión fallida</br>';
    exit;
endif;
//Generamos un ID único para colocarlo como id de este documento
$idDocumento=uniqid();
//Cargamos el array con los parametros a insertar
$params = [
    //Nombre del index (bd) donde sea va a crear el documento
    'index' => 'empresa',
    //Nombre del type (tabla) donde sea va a crear el documento
    'type' => 'empleados',
    //Generamos un ID único con php con el que se identificara este documento
    'id' => $idDocumento,
    //Creamos el cuerpo del documento con los campos y valores correspondientes
    'body' => ['name' => 'Eugenio','age' => 36]
];
//Pasamos los parámetros a la funcion index de elasticsearch para crear el documento
$response = $client->index($params);
//Mostramos la respuesta
echo '<pre>';
print_r($response);
echo '</pre>';