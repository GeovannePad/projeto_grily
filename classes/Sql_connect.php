<?php

class Sql_connect extends PDO {

    private $conn;
    private $name;
    private $host;
    private $login;
    private $password;

    public function __construct($name, $host, $login, $password){
        $this->conn = new PDO("mysql:dbname=$name;host=$host", $login, $password, array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ));
    }
    public function select($query, $params=array()):array{
        $stmt = $this->query($query, $params);
        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
    public function insert($query, $params=array()){
        $verificar = $this->query($query, $params);
        if ($verificar) {
            return true;
        }
    }
    public function delete($query, $params=array()){
        $verificar = $this->query($query, $params);
        if ($verificar) {
            return true;
        }
    }
    public function update($query, $params=array()){
        $verificar = $this->query($query, $params);
        if ($verificar) {
            return true;
        }
    }

    public function query($query, $params = array()){
        $stmt = $this->conn->prepare($query);
        $this->setParams($stmt, $params);
        if ($stmt->execute()) {
            return $stmt;
        }
    }  
    private function setParams($stmt, $params = array()){
        foreach ($params as $key => $value) {
            $this->setParam($stmt, $key, $value);
        }
    }
    private function setParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }
}
