<?php

/**
 * Created by PhpStorm.
 * User: ahmedjorge
 * Date: 10/22/16
 * Time: 12:01 AM
 */
class Procedure
{
    private $call;
    private $name;

    /**
     * Procedure constructor.
     * @param $name
     */
    public function __construct($name, CallMysql $mysql)
    {
        $this->name = $name;
        $this->call = $mysql;
        $this->call->sql = "call ".$this->name."()";
    }

//    function addTimeStamp($value){
//        $this->addParam(TYPE::TIMESTAMP,$value);
//        return $this;
//    }

    function addString($value){
        $this->addParam(TYPE::VARCHAR,$value);
        return $this;
    }

    function addInt($value){
        $this->addParam(TYPE::INI,$value);
        return $this;
    }

    function  addObj($value,$caminho = "../../resources/savedFile/"){
         $name= $value;
        if($value != null)
        {
            $name = $caminho.Imagem::getFileName($value);
            file_put_contents($name,$_SESSION["file-uplaod"]);
            $name = Imagem::getFileName($value);
        }
        $this->addParam(TYPE::VARCHAR, $name);
        return $this;
    }

    function  addINOUT($value){
        $this->addParam(TYPE::OUTIN,$value);
        return $this;
    }

    function addBool($value){
        $aux = ($value)? 'true' : 'false';
        $this->addParam(TYPE::BOOLEAN, $aux);
        return $this;
    }

    function addDate($value, $format = '%d-%m-%Y')
    {
        $q = count($this->call->listParam);
        $this->call->listParam[$q] = $value;
        $q = count($this->call->listParam);
        $this->call->listParam[$q] = $format;
        if(count($this->call->listParam) == 1)
        {
            $this->call->sql.="(str_to_date(:".($q-1).", :".($q)."))";
        }else{
            $this->call->sql= substr($this->call->sql,0,strlen($this->call->sql)-1).", str_to_date(:".($q-1).", :".($q)."))";
        }
        return $this;
    }
//    function addChar($value){
//        $this->addParam(TYPE::CHARACTER,$value);
//        return $this;
//    }

//    function addFile($value){
//        $this->addParam(TYPE::BYTEA,$value);
//        return $this;
//    }


    private function addParam($type ,$value){
        $q = count($this->call->listParam);
        $this->call->listParam[$q] = array( $type , $value);
        if ($q == 0) {
            $this->call->sql = substr($this->call->sql, 0, strlen($this->call->sql) - 1) . ":" . $q . ")";
        } else {
            $this->call->sql = substr($this->call->sql, 0, strlen($this->call->sql) - 1) . ", :" . $q . ")";
        }
        return $this;
    }
}