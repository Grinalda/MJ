<?php

/**
 * Created by PhpStorm.
 * User: ahmedjorge
 * Date: 10/22/16
 * Time: 12:00 AM
 */
class Select
{
    private $table,$selectValor;
    private $call;

    /**
     * Select constructor.
     * @param $table
     * @param $selectValor
     */
    public function __construct($table, $selectValor, CallMysql $mysql)
    {
        $this->table = $table;
        $this->selectValor = $selectValor;
        $this->call = $mysql;

        $this->call->sql = "select ".$selectValor." from ".$table;
    }

    /**
     * @param $param
     * @param $value
     * @param $condition
     * @param null $join
     * @return $this
     */
    public function addCodition($param, $value, $condition, $join =null){
        $q = count($this->call->listCondition);
        $this->call->listCondition[$q] = $value;
        $this->call->sql .= (($join == null) ? " where " : " " .$join." " ). $param." ".$condition." :".$q;
        return $this;
    }


}