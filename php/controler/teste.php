<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 20/04/2017
 * Time: 15:38
 */

include '../conexao/CallMysql.php';
include '../modelo/imagem.php';

    $call = new CallMysql();
    $call->select("ver_noticia","*");
    $call->execute();
    $noticias = array();


//       foreach ($call->getValors() as $value)
//       {
//           print_r( $value["Noticia_foto"]);
//       }
        while($row = $call->getValors())
        {
            $noticias[count($noticias)] = $row;
        }



       print_r($noticias);