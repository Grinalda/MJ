<?php
    include '../conexao/CallMysql.php';
    include '../modelo/imagem.php';
    include '../modelo/Session.php';
    include '../modelo/user.php';

    session_start();
    $intent["Uploadfoto"] = function (){
        $imagem = new Imagem($_FILES["image"]);

        die(json_encode(array("foto" => $imagem->getCaminhoCompletoNewFileView(),
            "nomeFoto" => $imagem->getName(),
            "novoNome"=> $imagem->getNewFileName())));
    };

    $intent["ListarNoticia"] = function (){
       $call = new CallMysql();
       $call->select("ver_noticia","*");
       $call->execute();
        $noticias = array();

        while($row = $call->getValors())
        {
            $row["Noticia_foto"] =Imagem::getPhoto($row["Noticia_id"],$row["Noticia_foto"],"../resources/images/loadImage/" );
            $noticias[count($noticias)] = $row;
        }

        die(json_encode(array("noticias" => $noticias)));

   };

    $intent["News"] = function (){
        $call = new CallMysql();
        $call->select("ver_noticia","*");
        $call->execute();
        $noticias = array();

        while($row = $call->getValors())
        {
            $row["Noticia_foto"] =Imagem::getPhoto($row["Noticia_id"],$row["Noticia_foto"],"resources/images/loadImage/" );
            $noticias[count($noticias)] = $row;
        }
        die(json_encode(array("noticias" => $noticias)));
    };

   $intent["RegNotice"] = function (){
       $call = new CallMysql();
       $call->functions("Func_AddNotice")
           ->addString($_POST["noticia"]["titulo"])
           ->addDate($_POST["noticia"]["dataStart"])
           ->addString($_POST["noticia"]["resumo"])
           ->addObj($_POST["noticia"]["img"], "../../resources/images/loadImage/")
           ->addString($_POST["noticia"]["conteudo"])
           ->addInt(Session::getUserLogado()->getId());
       $call->execute();

       $Resultado = $call->getValors();

       die(json_encode(array("noticia" => $Resultado)));
   };

    $intent["RegVideo"] = function (){
        $call = new CallMysql();
        $call->functions("Func_AddMultimedia")
            ->addString($_POST["video"]);
        $call->execute();

        $Resultado = $call->getValors();

        die(json_encode(array("video" => $Resultado)));
    };

    $intent["ListarVideo"] = function (){
        $call = new CallMysql();
        $call->select("ver_multimedia","*");
        $call->execute();
        $video = array();
        while($row = $call->getValors())
        {
            $video[count($video)] = $row;
        }

        die(json_encode(array("videos" => $video)));

    };


   $intent[$_POST["intent"]]();
