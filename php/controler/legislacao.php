<?php
/**
 * Created by PhpStorm.
 * User: Grinalda Soares
 * Date: 25/04/2017
 * Time: 13:44
 */

include '../conexao/CallMysql.php';
//include '../modelo/imagem.php';
// Falta Incluir Sessão

    $intent["RegLegislacao"] = function (){
        $call = new CallMysql();
        $call->functions("Func_AddLegislacao")
            ->addString($_POST["legislacao"]["titulo"])
            ->addObj($_POST["legislacao"]["legPDF"],"../../resources/documents/legislacao/")
            ->addString($_POST["legislacao"]["sumario"])
            ->addInt($_POST["legislacao"][1])
            ->addInt($_POST["legislacao"]["categoria"]);
        $call->execute();
        $resultado = $call->getValors();

        die(json_encode(array("legislacao -> $resultado")));
    };


    $intent["ListarLegislacao"] = function (){
        $call = new CallMysql();
        $call->select("ver_legislacao", "*");
        $call-> execute();
        $legislacoes = array();
        while($row = $call->getValors())
        {
            $legislacoes[count($legislacoes)] = $row;
        }

        $call->select("ver_categoria", "*");
        $call-> execute();
        $categoria = array();
        while($row = $call->getValors())
        {
            $categoria[count($categoria)] = $row;
        }
        die(json_encode(array("legislacao" => $legislacoes,"categoria" => $categoria)));

    };

$intent["UploadPDF"] = function (){

    include '../modelo/imagem.php';

    $imagem = new Imagem($_FILES["pdf"], "documents/legislacao/");

    die(json_encode(array("pdf" => $imagem->getCaminhoCompletoNewFileView(),
        "nomeFoto" => $imagem->getName(),
        "novoNome"=> $imagem->getNewFileName())));
};
    $intent[$_POST["intent"]]();