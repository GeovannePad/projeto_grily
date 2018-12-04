<?php

  require_once("config.php");

  class Inscricao extends Sql_connect
  {
    protected $fone;
    protected $dtnascimento;
    protected $endereco;
    protected $nome;
    protected $biografia;
    protected $idcurso;

    public function __construct(){
      $this->stmt = new Sql_connect("dbgrilyofficial", "localhost", "root", "");      
    }


    public function setFone($fone){
      $this->fone = $fone;
    }
    public function setDtnascimento($dtnascimento){
      $this->dtnascimento = $dtnascimento;
    }
    public function setEndereco($endereco){
      $this->endereco = $endereco;
    }
    public function setNome($nome){
      $this->nome = $nome;
    }
    public function setBiografia($biografia){
      $this->biografia = $biografia;
    }
    public function setIdcurso($idcurso){
      $this->idcurso = $idcurso;
    }


    public function getFone(){
      return $this->fone;
    }
    public function getDtnascimento(){
      return $this->dtnascimento;
    }
    public function getEndereco(){
      return $this->endereco;
    }
    public function getNome(){
      return $this->nome;
    }
    public function getBiografia(){
      return $this->biografia;
    }
    public function getIdcurso(){
      return $this->idcurso;
    }

    public function setAllInscricaoData($fone, $dtnascimento, $endereco, $nome, $biografia, $idcurso){
      $this->setFone($fone);
      $this->setDtnascimento($dtnascimento);
      $this->setEndereco($endereco);
      $this->setNome($nome);
      $this->setBiografia($biografia);
      $this->setIdcurso($idcurso);
    }

    public function novaInscricao(){
      $this->stmt->insert("INSERT INTO inscricoes(fone, dtnascimento, endereco, nome, biografia, idcurso) VALUES (:FONE, :DTNASCIMENTO, :ENDERECO, :NOME, :BIOGRAFIA, :IDCURSO)", array(
        ":FONE"=>$this->getFone(),
        ":DTNASCIMENTO"=>$this->getDtnascimento(),
        ":ENDERECO"=>$this->getEndereco(),
        ":NOME"=>$this->getNome(),
        ":BIOGRAFIA"=>$this->getBiografia(),
        ":IDCURSO"=>$this->getIdcurso()
      ));
    }

    public function selectAllInscricoes(){
      return $this->stmt->select("SELECT nome, dtnascimento, endereco, fone, idcurso, biografia, idinscricao FROM inscricoes");
    }

    public function selectInscricaoById($id){
      return $this->stmt->select("SELECT * FROM inscricoes WHERE idinscricao = :ID", array(
        ":ID"=>$id
      ));
    }

    public function deleteInscricaoById($id){
      $this->stmt->delete("DELETE FROM inscricoes WHERE idinscricao = :ID", array(
        ":ID"=>$id
      ));
    }
  }
  