<?php
  require_once("config.php");

  
  switch ($_GET["action"]) {
    case 'inscrever':
      $fone = $_POST["fone"];
      $dtnascimento = new DateTime($_POST["dtnascimento"]);
      $date = $dtnascimento->format("Y-m-d");
      $endereco = $_POST["endereco"];
      $nome = $_POST["nome"];
      $biografia = $_POST["biografia"];
      $idcurso = $_POST["curso"];
      $inscricao = new Inscricao();
      $inscricao->setAllInscricaoData($fone, $date, $endereco, $nome, $biografia, $idcurso);
      $inscricao->novaInscricao();
      header("Location: painel_organizador.php");
      break;
    case 'logar':
      $login = $_POST["login"];
      $senha = $_POST["senha"];
      $logar = new Usuario();
      $usuario = $logar->selectOneUsuario($login, $senha);
      if ($usuario[0]["tipo"] == "Organizador") {
        header("Location: painel_organizador.php");
      } else if ($usuario[0]["tipo"] == "Administrador"){
        header("Location: painel_administrador.php");
      }
      break;
    case 'registrar_usuario':
      $nome = $_POST["nome"];
      $login = $_POST["login"];
      $senha = $_POST["senha"];
      $tipo = $_POST["tipo"];
      $registrar = new Usuario();
      $resultados = $registrar->selectAllLogins();

      if (count($resultados) > 0) {
        foreach ($resultados as $resultado) {
          foreach ($resultado as $value) {
            $logins[] = $value;
          }
        }
        if(in_array($login, $logins)){
          echo "Esse login já existe";
        } else {
          $registrar->setAllUsuarioData($nome, $login, $senha, $tipo);
          $registrar->addUsuario();
          echo "Registro realizado com sucesso";
          break;
        }
      } else {
        $registrar->setAllUsuarioData($nome, $login, $senha, $tipo);
        $registrar->addUsuario();
        echo "Registro realizado com sucesso";
      }

      break;
    case 'registrar_estudante':
      $id = $_GET["idinscricao"];
      $registrar_estudante = new Usuario();
      $inscricao = $registrar_estudante->selectInscricaoById($id);
      $resultados_logins = $registrar_estudante->selectAllLogins();
      $resultados_rms = $registrar_estudante->selectAllRms();
      
      foreach ($resultados_logins as $resultado_login) {
        foreach ($resultado_login as $value) {
          $logins[] = $value;
        }
      }
      foreach ($resultados_rms as $resultado_rm) {
        foreach ($resultado_rm as $key => $value) {
          $rms[] = $value;
        }
      }

      foreach ($inscricao[0] as $key => $value) {
        $estudante[$key] = $value;
      }

      $nome = $estudante["nome"];
      $login = gerarLoginEstudante($nome);
      $senha = mt_rand(11111, 99999);
      $tipo = "Estudante";
      
      $registrar_estudante->setAllUsuarioData($nome, $login, $senha, $tipo);
      $ultimo_usuario = $registrar_estudante->insertAndReturnUsuario();

      foreach ($ultimo_usuario[0] as $key => $value) {
        $usuario[$key] = $value;
      }
      $idcurso = $estudante["idcurso"];
      $idusuario = $usuario["idusuario"];
      $fone = $estudante["fone"];
      $dtnascimento = $estudante["dtnascimento"];
      $endereco = $estudante["endereco"];
      $biografia = $estudante["biografia"];
      $rm = mt_rand(11111, 99999);
      $rm = checkRm($rm, $rms);

      $registrar_estudante->setAllInscricaoData($fone, $dtnascimento, $endereco, $nome, $biografia, $idcurso);
      $registrar_estudante->setAllEstudanteData($rm, $idusuario);
      $registrar_estudante->addEstudante();     
      
      
      break;
    case 'apagar_inscricao':
      $id = $_GET["idinscricao"];
      $inscricao = new Inscricao();
      $inscricao->deleteInscricaoById($id);
      break;
    case 'apagar_estudante':
      $idusuario = $_GET["idusuario"];
      $idestudante = $_GET["idestudante"];
      $estudante = new Usuario();
      $estudante->deleteEstudanteById($idestudante);
      $estudante->deleteUsuarioById($idusuario);
      break;
    case 'apagar_usuario':
      $idusuario = $_GET["idusuario"];
      $usuario = new Usuario();
      $usuario->deleteUsuarioById($idusuario);
      break;
    default:
      # code...
      break;
  }
