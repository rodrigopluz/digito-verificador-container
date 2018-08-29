<?php

/**
 * valida - digito verificador container
 * referencia - https://es.wikipedia.org/wiki/Contenedor
 * 
 * @author: Rodrigo Pereira da Luz
 * @version: 1.0
 */
error_reporting(E_ALL);
ini_set('display_errors', 'off');
date_default_timezone_set('America/Sao_Paulo');

require 'validarContainers.php';
$request = strtoupper($_REQUEST['container']);

$container = new validarContainers($request);
$container->validarContainers($request);
