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
        $listar = new Usuario();
        $organizador = $logar->selectOneUsuario($login, $senha);
        $lista_usuarios = $listar->selectAllInscricoes();

        $_SESSION["lista_usuarios"] = $lista_usuarios;
        $_SESSION["organizador"] = $organizador[0];
        header("Location: painel_organizador.php");
      } else if ($usuario[0]["tipo"] == "Administrador"){
        $listar = new Usuario();
        $lista_usuarios = $listar->selectUsuariosByTipo("Administrador");
        $administrador = $logar->selectOneUsuario($login, $senha);

        $_SESSION["lista_usuarios"] = $lista_usuarios;
        $_SESSION["administrador"] = $administrador[0];
        header("Location: painel_administrador.php");
      } else {
        $estudante = $logar->selectUsuarioEstudante($login, $senha);
        foreach ($estudante[0] as $key => $value) {
          if ($key == "idusuario") {
            $_SESSION["estudante"]["idusuario"] = $value;
            continue;
          }
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
        $stringlen = strlen($senha);
        if ($stringlen === 5) {
          header("Location: palterar_senha.php");
        } else {
          header("Location: perfil_estudante.php");
        }
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
          if ($tipo == "Administrador") {
            header("Location: actions.php?action=selecionar_usuario&tipo=administradores");
          } else {
            header("Location: actions.php?action=selecionar_usuario&tipo=organizadores");
          }
          break;
        }
      } else {
        $registrar->setAllUsuarioData($nome, $login, $senha, $tipo);
        $registrar->addUsuario();
        echo "Registro realizado com sucesso";
      }
      
      header("Location: painel_administrador.php");
      break;
    case 'registrar_estudante':
      $registrar_estudante = new Usuario();
      
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

      foreach ($_SESSION["dados_inscricao"] as $key => $value) {
        $estudante[$key] = $value;
      }

     
      $login = $_SESSION["dados_inscricao"]["login"];
 
      if (in_array($login, $logins)) {
        $check = in_array($login, $logins);
        while ($check === true) {
          $login = gerarLoginEstudante($_SESSION["dados_inscricao"]["nome"]);
          $check = in_array($login, $logins);
          if (!$check) {
            $_SESSION["dados_inscricao"]["login"] = $login;
            break;
          }
        }
      }
      $senha = mt_rand(11111, 99999);
      $tipo = "Estudante";
      $nome = $estudante["nome"];
      $login = $_SESSION['dados_inscricao']['login'];

      $registrar_estudante->setAllUsuarioData($nome, $login, $senha, $tipo);
      $ultimo_usuario = $registrar_estudante->insertAndReturnUsuario();

      foreach ($ultimo_usuario[0] as $key => $value) {
        $usuario[$key] = $value;
      }

      if ($estudante["idcurso"] == "Teatro") {
        $_SESSION["dados_inscricao"]["idcurso"] = 1;
      } else if ($estudante["idcurso"] == "Artes") {
        $_SESSION["dados_inscricao"]["idcurso"] = 4;
      } else if ($estudante["idcurso"] == "Música") {
        $_SESSION["dados_inscricao"]["idcurso"] = 3;
      } else {
        $_SESSION["dados_inscricao"]["idcurso"] = 2;
      }
      $idcurso = $_SESSION["dados_inscricao"]["idcurso"];
      $idusuario = $usuario["idusuario"];
      $fone = $estudante["fone"];
      $data = $estudante["dtnascimento"];
      $dateString = $_SESSION["dados_inscricao"]["dtnascimento"];
      $myDateTime = DateTime::createFromFormat('d/m/Y', $dateString);
      $dtnascimento = $myDateTime->format('Y-m-d');
      $endereco = $estudante["endereco"];
      $biografia = $estudante["biografia"];
      $rm = $_SESSION["dados_inscricao"]["rm"];
      $rm = checkRm($rm, $rms);
      $imagem = "user-icon.png";

      $registrar_estudante->setAllInscricaoData($fone, $dtnascimento, $endereco, $nome, $biografia, $idcurso);
      $registrar_estudante->setAllEstudanteData($rm, $idusuario, $imagem);
      $registrar_estudante->addEstudante();     
      $registrar_estudante->deleteInscricaoById($_SESSION["dados_inscricao"]["idinscricao"]);
      unset($_SESSION["dados_inscricao"]);
      header("Location: actions.php?action=selecionar_usuario&tipo=estudantes");
      break;
    case 'apagar_inscricao':
      $id = $_GET["idinscricao"];
      $inscricao = new Inscricao();
      $inscricao->deleteInscricaoById($id);
      header("Location: actions.php?action=selecionar_usuario&tipo=inscrições");
      break;
    case 'apagar_estudante':
      $idusuario = $_GET["idusuario"];
      $idestudante = $_GET["idestudante"];
      $estudante = new Usuario();
      $estudante->deleteEstudanteById($idestudante);
      $estudante->deleteUsuarioById($idusuario);
      if (isset($_SESSION["administrador"])) {
        header("Location: actions.php?action=selecionar_usuario&tipo=estudantes");
      }
      
      break;
    case 'apagar_usuario':
      $idusuario = $_GET["idusuario"];
      $usuario = new Usuario();
      $dados = $usuario->selectOnlyUsuarioById($idusuario);
      $usuario->deleteUsuarioById($idusuario); 
      if ($dados[0]["tipo"] == "Organizador") {
        header("Location: actions.php?action=selecionar_usuario&tipo=organizadores");
      } else if ($dados[0]["tipo"] == "Administrador"){ 
        header("Location: actions.php?action=selecionar_usuario&tipo=administradores");
      }
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
        header("Location: perfil_estudante.php?mensagem=dados_trocados");
      } else {
        header("Location: perfil_estudante.php?err=erro_alterar_dados");
      }
      break;
    case 'deslogar':
      if (isset($_SESSION["administrador"]) || isset($_SESSION["lista_usuarios"]) || isset($_SESSION["organizador"])) {
        unset($_SESSION["organizador"]);
        unset($_SESSION["administrador"]);
        unset($_SESSION["lista_usuarios"]);
        session_destroy();
        header("Location: plogin.php");
      }
      if (isset($_SESSION["estudante"])) {
        unset($_SESSION["estudante"]);
        session_destroy();
        header("Location: plogin.php");
      }
      break;
    case 'alterar_senha':
      $novasenha = $_POST["senha"];
      $senhaConf = $_POST["senhaConf"];
      $idusuario = $_SESSION["estudante"]["idusuario"];
      if ($novasenha != $senhaConf) {
        header("Location: palterar_senha.php?err=senha_diferente");
      } else { 
        $usuario = new Usuario();
        $verificar = $usuario->alterarSenhaUsuario($idusuario, $novasenha);
        if ($verificar) {
          header("Location: perfil_estudante.php?mensagem=senha_trocada");
        } else {
          header("Location: perfil_estudante.php?err=trocar_senha");
        }
      }
      break;
    case 'selecionar_usuario':
      $tipo = $_GET["tipo"];

      if ($tipo == "administradores") {
        $listar_usuarios = new Usuario();
        $lista_usuarios = $listar_usuarios->selectUsuariosByTipo("Administrador");
        $_SESSION["lista_usuarios"] = $lista_usuarios;
        $_SESSION["tipo"] = "Administrador";
        header("Location: painel_administrador.php");
      } else if ($tipo == "organizadores") {
        $listar_usuarios = new Usuario();
        $lista_usuarios = $listar_usuarios->selectUsuariosByTipo("Organizador");
        $_SESSION["lista_usuarios"] = $lista_usuarios;
        $_SESSION["tipo"] = "Organizador";
        header("Location: painel_administrador.php");
      } else if ($tipo == "inscrições"){
        $listar_inscricoes = new Inscricao();
        $inscricoes = $listar_inscricoes->selectAllInscricoes();
        $_SESSION["lista_usuarios"] = $inscricoes;
        $_SESSION["tipo"] = "Inscrição";
        header("Location: painel_organizador.php");
      } else {

        $listar_usuarios = new Usuario();
        $lista_usuarios = $listar_usuarios->selectAllEstudantes();
        $_SESSION["lista_usuarios"] = $lista_usuarios;
        $_SESSION["tipo"] = "Estudante";
        if (isset($_SESSION["administrador"])) {
          header("Location: painel_administrador.php");
        } else {
          header("Location: painel_organizador.php");
        }
        
      }
      break;
    default:
      # code...
      break;
  }