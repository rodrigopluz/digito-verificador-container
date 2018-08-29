<?php

/**
 * valida - digito verificador container
 * referencia - https://es.wikipedia.org/wiki/Contenedor
 * 
 * @author: Rodrigo Pereira da Luz
 * @version: 1.0
 */
class validarContainers 
{
    public $dbconn;

    public function db()
    {
        $hostname = '127.0.0.1';
        $database = 'sys_dvc';
        $root = 'root';
        $password = '';

        $this->dbconn = new PDO("mysql:host=127.0.0.1;dbname=sys_dvc",$root,$password);
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE, PDO::CASE_UPPER);
    }

    public function sql()
    {
        $query = "SELECT prefix_letra, prefix_numero FROM num_prefixo";
        $sql = $this->dbconn->query($query);
        $prefixos = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $prefixos;
    }

    public function validarContainers($request)
    {
        $dbconn = $this->db();
        $soma_letras = 0;
        $soma_numeros = 0;
        
        $numero = explode('-', $request);
        $arrays = str_split($numero[0]);

        $prefixos = $this->sql();        
        
        foreach ($arrays as $index => $array) {
            /*- calculo dos 4 primeiros digitos - que seriam as letras -*/
            foreach ($prefixos as $key => $pf) {
                if ($pf['prefix_letra'] == $array) {
                    $soma_letras += $pf['prefix_numero'] * pow(2, $index);
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

        if ($numero[1] == $digito) $status = 'ok';
        else $status = 'error';

        echo json_encode(['resultado' => $digito, 'status' => $status]);
        die;
    }
}