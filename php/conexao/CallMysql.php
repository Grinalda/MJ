<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "Procedure.php";
include_once "Funtions.php";
include_once "Select.php";
include_once "Conectar.php";
/**
 * Description of CallMysql
 *
 * @author AhmedJorge
 */
class CallMysql {
    public $sql;
    /**
     * @var PDOStatement
     */
    public  $rs;
    public $numRow;
    public $valors;
    public $con;
    public $connec;
    public $listCondition = array();
    public $listParam = array();
    public $returnQuery;

    function __construct() {
        $this->connec = new Conectar();
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @return String contêm os valores do requisição feita para a <b>BD</b>
     * @example <b>1º</b> CallMysql::getSql() Exemplo "select * from nameTable"
     *  @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     */
     function getSql() {
        return $this->sql;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @return $rs contêm os valores do requisição feita para a <b>BD</b>
     * @example <b>1º</b> CallMysql::getRs()
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     */
     function getRs() {
        return $this->rs;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @return INTEGER retorna o numero de linha da selecão
     * @example <b>1º</b> CallMysql::getNumRow()
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     */
    function getNumRow()
    {
        $this->numRow = $this->rs->rowCount();
        return count($this->valors);
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @return Conectar retorna conexao
     * @example <b>1º</b> CallMysql::getCon()
     * @author JIGAsoft <jigasoft_stp@hotmail.com>
     */
     function getCon() {
        return $this->con;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @return mixed retorna um array
     * @example <b>1º</b> CallMysql::getValors()[0]
     * @example <b>1º</b> CallMysql::getValors()["NAME"]
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     */
    function getValors()
    {
        $this->valors = $this->rs->fetch($this->returnQuery);
        return $this->valors;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @param $procedureName - o nome da funcão a ser usada
     * @example <b>1º</b> CallMysql::simplesProcedure("nameProcedure",NULL);
     * @example <b>2º</b> CallMysql::simplesProcedure("nameProcedure",array());
     * @example <b>3º</b> CallMysql::simplesProcedure("nameProcedure",array($param1,$param2,$param3,$param4));
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     * @return Procedure
     */
    function procedure($procedureName)
    {
        $this->returnQuery = PDO::FETCH_ASSOC;
        $this->listCondition = array();
        $this->listParam = array();
        $pd = new Procedure($procedureName, $this);
        return $pd;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @param $funcionName - o nome da funcão a ser usada
     * @example <b>1º</b> CallMysql::simplesFuncion("nameFuncion",NULL);
     * @example <b>2º</b> CallMysql::simplesFuncion("nameFuncion",array());
     * @example <b>3º</b> CallMysql::simplesFuncion("nameFuncion",array($param1,$param2,$param3,$param4));
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     * @return Funtions
     */
    function functions($funcionName)
    {
        $this->returnQuery = PDO::FETCH_NUM;
        $this->listCondition = array();
        $this->listParam = array();
        $ft = new Funtions($funcionName, $this);
        return $ft;
    }

    /**
     * (PHP 4, PHP 5)<br/>
     * @param $table - o nome da Table or Veiw a ser usada
     * @param $selectValor - parametos da View or Table a ser Visualisado
     * @example <b>1º</b> CallMysql::simplesSelect("nameViewOrTable","*");
     * @example <b>2º</b> CallMysql::simplesSelect("nameViewOrTable","param1,param2,param3","param1 > 40");
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     * @return Select
     */
    function select($table, $selectValor)
    {
        $this->returnQuery = PDO::FETCH_ASSOC;
        $this->listCondition = array();
        $this->listParam = array();
        $se = new Select($table, $selectValor, $this);
        return $se;
    }


    /**
     * @param $hostorName
     * @param $user
     * @param $password
     * @param $bdName
     * @return mysqli
     */
//        header('Content-type: text/html; charset=UTF-8');
    /**
     * (PHP 4, PHP 5)<br/>
     * @example CallMysql::executeQurey();
     * @author JIGAsoft STP <jigasoft_stp@hotmail.com>
     */
    public function execute()
    {
        $pdo = new PDO("mysql:host=".$this->connec->host.";dbname=".$this->connec->bd, $this->connec->user, $this->connec->pwd);
        $pdo->exec("SET CHARACTER SET utf8");
        $stmt = $pdo->prepare($this->sql);
        $list = array_merge($this->listParam,$this->listCondition);
        foreach ($list as $key => $value) {
            if (is_array($value)) {
                $stmt->bindValue(":" . $key, $value[1], $value[0]);
            } else
                $stmt->bindValue(":".$key,$value);
        }
        $stmt->execute();
        $this->rs = $stmt;
        $erro = $stmt->errorInfo();
        if($erro[2] != null)
            die(json_encode(array($erro[2], $stmt->queryString, "param" => $list)));
    }



    public function closeConexao()
    {
        mysqli_close($this->con);
    }

//    private function fileToBite($_file){
////        $file = file_get_contents($_file);
////        $file = mysqli_real_escape_string($co, $file);
//        return fopen($_file);
//    }
}
