<?php

class Estudante extends Inscricao
{
  protected $rm;
  protected $idusuario;

  public function setRm($rm){
    $this->rm = $rm;
  }
  public function setIdusuario($idusuario){
    $this->idusuario = $idusuario;
  }


  public function getRm(){
    return $this->rm;
  }
  public function getIdusuario(){
    return $this->idusuario;
  }

  public function addEstudante(){
    $this->stmt->insert("INSERT INTO estudantes (idcurso, rm, idusuario, fone, dtnascimento, endereco, nome, biografia) VALUES (:IDCURSO, :RM, :IDUSUARIO, :FONE, :DTNASCIMENTO, :ENDERECO, :NOME, :BIOGRAFIA)", array(
      ":IDCURSO"=>$this->getIdcurso(),
      ":RM"=>$this->getRm(),
      ":IDUSUARIO"=>$this->getIdusuario(),
      ":FONE"=>$this->getFone(),
      ":DTNASCIMENTO"=>$this->getDtnascimento(),
      ":ENDERECO"=>$this->getEndereco(),
      ":NOME"=>$this->getNome(),
      ":BIOGRAFIA"=>$this->getBiografia()
    ));
  }

  public function setAllEstudanteData($rm, $idusuario){
    $this->setRm($rm);
    $this->setIdusuario($idusuario);
  }
  public function selectAllEstudantes(){
    return $this->stmt->select("SELECT rm, nome, dtnascimento, endereco, fone, idcurso, biografia, idestudante, idusuario FROM estudantes");
  }

  public function selectAllRms(){
    return $this->stmt->select("SELECT rm FROM estudantes");
  }
  
  public function deleteEstudanteById($id){
    $this->stmt->delete("DELETE FROM estudantes WHERE idestudante = :ID", array(
      ":ID"=>$id
    ));
  }
  
}
