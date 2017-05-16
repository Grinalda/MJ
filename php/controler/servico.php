<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 16/05/2017
 * Time: 16:00
 */

$intent["carregar_servico"] = function (){
    die( file_get_contents("../../resources/json/servico.json"));
};

$intent[$_POST["intent"]]();