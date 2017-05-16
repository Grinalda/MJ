<?php
/**
 * Created by PhpStorm.
 * User: Grinalda Soares
 * Date: 01/05/2017
 * Time: 16:55
 */

include '../conexao/CallMysql.php';
include '../modelo/user.php';
include '../modelo/Session.php';


 session_start();


    $intent ["Login"] = function (){
        $call = new CallMysql();
        $call -> procedure("funt_login")
            ->addString($_POST["email"])
            ->addString($_POST["pass"]);
        $call->execute();
        $resultado = $call->getValors();

        if($resultado != null){
            $user = new User();
            $user->setId($resultado["id"]);
            $user->setNome($resultado["nome"]);
            $user->setNomeAcesso($resultado["email"]);
            Session::newSession(Session::USER, $user);
            die(json_encode(array("result" => true)));
        }
        else
            die(json_encode(array("result" => false)));
    };

    $intent[$_POST["intent"]]();