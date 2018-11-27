-<?php
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
      $usuario = $logar->selectUsuarioEstudante($login, $senha);
      if ($usuario[0]["tipo"] == "Organizador") {
        header("Location: painel_organizador.php");
      } else if ($usuario[0]["tipo"] == "Administrador"){
        header("Location: painel_administrador.php");
      } else {
        foreach ($usuario[0] as $key => $value) {
          if ($key == "dtnascimento") {
            $date = new DateTime($value);
            $data = $date->format("d/m/Y");
            $_SESSION["estudante"][$key] = $data;
            continue;
          }
          if ($key == "idcurso") { 
            if ($value == 1) {
              $_SESSION["estudante"][$key] = "Teatro";
            } else if ($value == 2){
              $_SESSION["estudante"][$key] = "Dança";
            } else if ($value == 3){
              $_SESSION["estudante"][$key] = "Música";
            } else {
              $_SESSION["estudante"][$key] = "Artes";
            }
            continue;
          }
          $_SESSION["estudante"][$key] = $value;
        } 
        header("Location: perfil_estudante.php");
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
      
      header("Location:");
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
      $registrar_estudante->deleteInscricaoById($inscricao[0]["idinscricao"]);
      header("Location: painel_estudantes.php");
      break;
    case 'apagar_inscricao':
      $id = $_GET["idinscricao"];
      $inscricao = new Inscricao();
      $inscricao->deleteInscricaoById($id);
      header("Location: painel_organizador.php");
      break;
    case 'apagar_estudante':
      $idusuario = $_GET["idusuario"];
      $idestudante = $_GET["idestudante"];
      $estudante = new Usuario();
      $estudante->deleteEstudanteById($idestudante);
      $estudante->deleteUsuarioById($idusuario);
      header("Location: painel_estudantes.php");
      break;
    case 'apagar_usuario':
      $idusuario = $_GET["idusuario"];
      $usuario = new Usuario();
      $usuario->deleteUsuarioById($idusuario);
      header("Location: painel_administrador.php");
      break;
    case 'alterar_imagem':
      $imagem_nova = $_FILES["imagem"];
      $imagem_antiga = $_SESSION["estudante"]["imagem"];
      if ($imagem_antiga == "user-icon.png") {
        $imagem_nome = $imagem_nova["name"];
        $imagem_tamanho = $imagem_nova["size"];
        $imagem_tipo = $imagem_nova["type"];
        if (!empty($imagem_nome)) {
          if ($imagem_tamanho < 20000000) {
            if ($imagem_tipo == "image/jpeg" || $imagem_tipo == "image/jpg" || $imagem_tipo == "image/png") {
              mb_internal_encoding("UTF-8");
              $nome = $_SESSION["estudante"]["nome"];
              $pos_primeiro = strpos($nome, " ");
              $primeiro_nome = mb_substr($nome, 0, $pos_primeiro);
              $idestudante = $_SESSION["estudante"]["idestudante"];
              $estudante = new Estudante();
              $_SESSION["estudante"]["imagem"] = $estudante->updateImagem($imagem_nova, strtolower($primeiro_nome), $idestudante);
              header("Location: perfil_estudante.php?mensagem=upload_imagem");
            } else {
              header("Location: perfil_estudante.php?err_imagem=tipo_errado");
            }
          } else {
            header("Location: perfil_estudante.php?err_imagem=grande");
          }
        } else {
          header("Location: perfil_estudante.php?err_imagem=vazio");
        }
      } else {
        $imagem_nome = $imagem_nova["name"];
        $imagem_tamanho = $imagem_nova["size"];
        $imagem_tipo = $imagem_nova["type"];
        if (!empty($imagem_nome)) {
          if ($imagem_tamanho < 20000000) {
            if ($imagem_tipo == "image/jpeg" || $imagem_tipo == "image/jpg" || $imagem_tipo == "image/png") {
              mb_internal_encoding("UTF-8");
              $nome = $_SESSION["estudante"]["nome"];
              $pos_primeiro = strpos($nome, " ");
              $primeiro_nome = mb_substr($nome, 0, $pos_primeiro);
              $idestudante = $_SESSION["estudante"]["idestudante"];
              unlink("midia/imagens_estudantes/" . $imagem_antiga);

              $estudante = new Estudante();
              $_SESSION["estudante"]["imagem"] = $estudante->updateImagem($imagem_nova, strtolower($primeiro_nome), $idestudante);
              header("Location: perfil_estudante.php?mensagem=upload_imagem");
            } else {
              header("Location: perfil_estudante.php?err_imagem=tipo_errado");
            }
          } else {
            header("Location: perfil_estudante.php?err_imagem=grande");
          }
        } else {
          header("Location: perfil_estudante.php?err_imagem=vazio");
        }
      }
      break;
    case 'alterar_dados':
      
      $nome = $_POST["nome"];
      $dtnascimento = $_POST["dtnascimento"];
      $endereco = $_POST["endereco"];
      $fone = $_POST["fone"];
      $biografia = $_POST["biografia"];
      $idestudante = $_SESSION["estudante"]["idestudante"];

      if (empty($nome) || empty($dtnascimento) || empty($endereco) || empty($fone) || empty($biografia)) {
        header("Location: perfil_estudante.php?err_dados=vazio");
      }
      $estudante = new Estudante();
      $estudante->setNome($nome);
      $estudante->setDtnascimento($dtnascimento);
      $estudante->setEndereco($endereco);
      $estudante->setFone($fone);
      $estudante->setBiografia($biografia);
      $verificar = $estudante->alterarDados($nome, $dtnascimento, $endereco, $fone, $biografia, $idestudante);
      $novosDados = $estudante->selectEstudanteById($idestudante);
      foreach ($novosDados[0] as $key => $value) {
        if ($key == "dtnascimento") {
          $date = new DateTime($value);
          $data = $date->format("d/m/Y");
          $_SESSION["estudante"][$key] = $data;
          continue;
        }
        if ($key == "idcurso") { 
          if ($value == 1) {
            $_SESSION["estudante"][$key] = "Teatro";
          } else if ($value == 2){
            $_SESSION["estudante"][$key] = "Dança";
          } else if ($value == 3){
            $_SESSION["estudante"][$key] = "Música";
          } else {
            $_SESSION["estudante"][$key] = "Artes";
          }
          continue;
        }
        $_SESSION["estudante"][$key] = $value;
      }
      if ($verificar) {
        header("Location: perfil_estudante.php?mensagem=upload_dados");
      } else {
        header("Location: perfil_estudante.php?err_dados=erro_alterar");
      }
      break;
    case 'deslogar':
      unset($_SESSION["estudante"]);
      session_destroy();
      header("Location: plogin.php");
      break;
    default:
      # code...
      break;
  }