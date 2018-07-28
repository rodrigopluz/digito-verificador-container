<?php

/**
 * valida - containers
 * referencia - https://es.wikipedia.org/wiki/Contenedor
 */

$hostname = 'localhost';
$database = 'sys_dvc';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);

// $conn = new mysqli($hostname, $database, $username, $password);
$request = $_REQUEST['digito'];

class DigitoVerificadorContainer 
{
    public function validarContainers(String $request)
    {
        $soma_letras = 0;
        $soma_numeros = 0;

        $numero = explode('-', $request);
        $arrays = str_split($numero[0]);
        
        var_dump($arrays);
        $sql = "SELECT * FROM num_prefixo";
        $stmt = $conn->prepare($sql)->execute();
        $prefixos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        var_dump($prefixos);
        exit;

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
}