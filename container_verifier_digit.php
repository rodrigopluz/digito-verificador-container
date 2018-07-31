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
set_include_path(get_include_path() . PATH_SEPARATOR .  './lib/');

$hostname = '127.0.0.1';
$database = 'sys_dvc';
$root = 'root';
$password = '';

$dbconn = new PDO("mysql:host=127.0.0.1;dbname=sys_dvc;charset=utf8",$root,$password);
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE, PDO::CASE_UPPER);
var_dump($dbconn);
exit;

$request = strtoupper($_REQUEST['container']);
validarContainers($request);

function validarContainers(String $request)
{
    $soma_letras = 0;
    $soma_numeros = 0;
    
    $numero = explode('-', $request);
    $arrays = str_split($numero[0]);
    
    $query = "SELECT prefix_letra, prefix_numero FROM num_prefixo";
    // $sql = $dbconn->prepare($query);
    

    $prefixos = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($arrays as $index => $array) {
        /*- calculo dos 4 primeiros digitos - que seriam as letras -*/
        foreach ($prefixos as $key => $pf) {
            if ($pf->prefix_letra == $array) {
                $soma_letras += $pf->prefix_numero * pow(2, $index);
            }
        }

        /*- calculo dos demais digitos - que seriam os numeros -*/
        if ($index > 3) {
            $soma_numeros +=  $array * pow(2, $index);
        }
    }

    $soma = $soma_letras + $soma_numeros;
    $divide = ($soma / 11);
    $multiplica = (intval($divide) * 11);
    $resultado = ($soma - $multiplica);

    if ($resultado > 9) $digito = 0;
    else $digito = $resultado;

    return $digito;
}