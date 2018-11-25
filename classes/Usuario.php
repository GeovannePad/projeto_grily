<?php

require_once("config.php");

class Usuario extends Estudante
{
  protected $nome;
  protected $login;
  protected $senha;
  protected $tipo;


  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setLogin($login){
    $this->login = $login;
  }
  public function setSenha($senha){
    $this->senha = $senha;
  }
  public function setTipo($tipo){
    $this->tipo = $tipo;
  }


  public function getNome(){
    return $this->nome;
  }
  public function getLogin(){
    return $this->login;
  }
  public function getSenha(){
    return $this->senha;
  }
  public function getTipo(){
    return $this->tipo;
  }

  public function setAllUsuarioData($nome, $login, $senha, $tipo){
    $this->setNome($nome);
    $this->setLogin($login);
    $this->setSenha($senha);
    $this->setTipo($tipo);
  }

  public function addUsuario(){
    return $this->stmt->insert("INSERT INTO usuarios (nome, login, senha, tipo) VALUES (:NOME, :LOGIN, :SENHA, :TIPO);", array(
      ":NOME"=>$this->getNome(),
      ":LOGIN"=>$this->getLogin(),
      ":SENHA"=>$this->getSenha(),
      ":TIPO"=>$this->getTipo(),
    )); 
  }

  public function selectAllLogins(){
    return $this->stmt->select("SELECT login FROM usuarios");
  }
  public function selectOneUsuario($login, $senha){
    $this->setLogin($login);
    $this->setSenha($senha);
    return $this->stmt->select("SELECT * FROM usuarios WHERE login = :LOGIN AND senha = :SENHA;", array(
      ":LOGIN"=>$this->getLogin(),
      ":SENHA"=>$this->getSenha()
    ));
  }
  public function insertAndReturnUsuario(){
    return $this->stmt->select("CALL return_last_insert_id(:NOME, :LOGIN, :SENHA, :TIPO)", array(
      ":NOME"=>$this->getNome(),
      ":LOGIN"=>$this->getLogin(),
      ":SENHA"=>$this->getSenha(),
      ":TIPO"=>$this->getTipo()
    ));
  }

  public function deleteUsuarioById($id){
    $this->stmt->delete("DELETE FROM usuarios WHERE idusuario = :ID",array(
      ":ID"=>$id
    ));
  }

  public function selectUsuariosByTipo($tipo){
    return $this->stmt->select("SELECT nome, login, senha, tipo, dtregistro, idusuario FROM usuarios WHERE tipo = :TIPO",array(
      ":TIPO"=>$tipo
    ));
  }

  public function selectUsuarioEstudante($login, $senha){
    $this->setLogin($login);
    $this->setSenha($senha);
    return $this->stmt->select("SELECT rm, login, estudantes.nome, dtnascimento, endereco, idcurso, fone, biografia, idestudante, imagem FROM estudantes INNER JOIN usuarios ON estudantes.idusuario=usuarios.idusuario WHERE usuarios.login = :LOGIN AND usuarios.senha = :SENHA", array(
      ":LOGIN"=>$this->getLogin(),
      ":SENHA"=>$this->getSenha()
    ));
  }
}
