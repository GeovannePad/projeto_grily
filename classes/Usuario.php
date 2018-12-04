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
    return $this->stmt->select("SELECT nome, login, tipo, dtregistro, idusuario FROM usuarios WHERE tipo = :TIPO",array(
      ":TIPO"=>$tipo
    ));
  }

  public function selectUsuarioEstudanteById($id){
    return $this->stmt->select("SELECT usuarios.nome, login, dtregistro, estudantes.imagem FROM usuarios INNER JOIN estudantes ON usuarios.idusuario=estudantes.idusuario WHERE usuarios.idusuario = :IDUSUARIO;", array(
      ":IDUSUARIO"=>$id
    ));
  }

  public function selectUsuarioEstudante($login, $senha){
    $this->setLogin($login);
    $this->setSenha($senha);
    return $this->stmt->select("SELECT tipo, rm, login, estudantes.nome, dtnascimento, endereco, idcurso, fone, biografia, idestudante, imagem, usuarios.idusuario FROM estudantes INNER JOIN usuarios ON estudantes.idusuario=usuarios.idusuario WHERE usuarios.login = :LOGIN AND usuarios.senha = :SENHA", array(
      ":LOGIN"=>$this->getLogin(),
      ":SENHA"=>$this->getSenha()
    ));
  }

  public function selectOnlyUsuarioById($id){
    return $this->stmt->select("SELECT tipo FROM usuarios WHERE idusuario = :IDUSUARIO", array(
      ":IDUSUARIO"=>$id
    ));
  }

  public function alterarSenhaUsuario($idusuario, $novasenha){
    $this->setSenha($novasenha);
    $this->setIdusuario($idusuario);

    return $this->stmt->update("UPDATE usuarios SET senha = :SENHA WHERE idusuario = :IDUSUARIO;", array(
      ":SENHA"=>$this->getSenha(),
      ":IDUSUARIO"=>$this->getIdusuario()
    ));

  }
}
