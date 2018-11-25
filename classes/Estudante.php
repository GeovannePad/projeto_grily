<?php

class Estudante extends Inscricao
{
  protected $rm;
  protected $idusuario;
  protected $imagem;

  public function setRm($rm){
    $this->rm = $rm;
  }
  public function setIdusuario($idusuario){
    $this->idusuario = $idusuario;
  }
  public function setImagem($imagem){
    $this->imagem = $imagem;
  }

  public function getRm(){
    return $this->rm;
  }
  public function getIdusuario(){
    return $this->idusuario;
  }
  public function getImagem(){
    return $this->imagem;
  }

  public function addEstudante(){
    $this->stmt->insert("INSERT INTO estudantes (idcurso, rm, idusuario, fone, dtnascimento, endereco, nome, biografia, imagem) VALUES (:IDCURSO, :RM, :IDUSUARIO, :FONE, :DTNASCIMENTO, :ENDERECO, :NOME, :BIOGRAFIA, :IMAGEM)", array(
      ":IDCURSO"=>$this->getIdcurso(),
      ":RM"=>$this->getRm(),
      ":IDUSUARIO"=>$this->getIdusuario(),
      ":FONE"=>$this->getFone(),
      ":DTNASCIMENTO"=>$this->getDtnascimento(),
      ":ENDERECO"=>$this->getEndereco(),
      ":NOME"=>$this->getNome(),
      ":BIOGRAFIA"=>$this->getBiografia(),
      ":IMAGEM"=>$this->getImagem()
    ));
  }

  public function setAllEstudanteData($rm, $idusuario, $imagem){
    $this->setRm($rm);
    $this->setIdusuario($idusuario);
    $this->setImagem($imagem);
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
  public function selectEstudanteById($id){
    return $this->stmt->select("SELECT * FROM estudantes WHERE idestudante = :ID", array(
      ":ID"=>$id
    ));
  }
  public function updateImagem($imagem, $primeiro_nome, $idestudante){
    mb_internal_encoding("UTF-8");

    $image_tmp_name = $imagem["tmp_name"];
    $image_type = $imagem["type"];
    
    $tipo = $image_type;
    $tipolen = strlen($tipo);
    $pos_barra = strpos($tipo, "/") + 1;
    $type = mb_substr($tipo, $pos_barra, $tipolen);
    $nome = $primeiro_nome . $idestudante . "." . $type;

    move_uploaded_file($image_tmp_name, "midia/imagens_estudantes/" . $nome);
    $this->setImagem($nome);

    $this->stmt->update("UPDATE estudantes SET imagem = :IMAGEM WHERE idestudante = :ID", array(
      ":IMAGEM"=>$this->getImagem(),
      ":ID"=>$idestudante
      ));

    return $nome;
    }
    
  public function alterarDados($nome, $dtnacimento, $endereco, $fone, $biografia, $idestudante){
    return $this->stmt->update("UPDATE estudantes SET nome = :NOME, dtnascimento = :DTNASCIMENTO, endereco = :ENDERECO, fone = :FONE, biografia = :BIOGRAFIA WHERE idestudante = :IDESTUDANTE", array(
      ":NOME"=>$this->getNome(),
      ":DTNASCIMENTO"=>$this->getDtnascimento(),
      ":ENDERECO"=>$this->getEndereco(),
      ":FONE"=>$this->getFone(),
      ":BIOGRAFIA"=>$this->getBiografia(),
      ":IDESTUDANTE"=>$idestudante
    ));
    }
  }
