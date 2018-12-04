<!doctype html>
<html lang="pt-BR">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="css-js/css-aditional.css">
  </head>
  <?php
    require_once("config.php");
    if (!isset($_SESSION["organizador"])) {
      header("Location: plogin.php");
    }
    if (isset($_GET["confirmar_inscricao"]) && $_GET["confirmar_inscricao"] == "sim") {
      header("Location: actions.php?action=registrar_estudante");
    } else if (isset($_GET["confirmar_inscricao"]) && $_GET["confirmar_inscricao"] == "nao") {
      unset($_SESSION["dados_inscricao"]);
      header("Location: painel_organizador.php");
    }
    if (isset($_GET["gerar_preview"]) && $_GET["gerar_preview"] == "sim") {
      $inscricao = new Inscricao();
      $dados = $inscricao->selectInscricaoById($_GET["idinscricao"]);
      $dados[0]["login"] = gerarLoginEstudante($dados[0]["nome"]);
      $dados[0]["rm"] = mt_rand(11111, 99999);
      $dateConvert = new DateTime($dados[0]["dtnascimento"]);
      $dados[0]["dtnascimento"] = $dateConvert->format("d/m/Y");
      if ($dados[0]["idcurso"] == 1) {
        $dados[0]["idcurso"] = "Teatro"; 
      } else if ($dados[0]["idcurso"] == 2){
        $dados[0]["idcurso"] = "Dança";
      } else if ($dados[0]["idcurso"] == 3){
        $dados[0]["idcurso"] = "Música";
      } else {
        $dados[0]["idcurso"] = "Artes";
      }
      $dadosTratados = json_encode($dados[0]);
      $_SESSION["dados_inscricao"] = $dados[0];
      $_SESSION["dados_inscricao"]["idinscricao"] = $_GET["idinscricao"];
      echo "<script>var jsonDados = new Array(); jsonDados = $dadosTratados</script>";
    }
  ?>
  <body class="bg">
    <div class="ui grid container stackable">
      <div class="sixteen wide column">
        <div class="ui center aligned segment">
          <h4>Painel do organizador, seja bem vindo <?= $_SESSION["organizador"]["nome"] ?></h4>
        </div>
      </div>
      <div class="sixteen wide column">
        <div class="ui floating labeled icon dropdown button left floated">
          <i class="filter icon"></i>
          <span class="text">Filtro</span>
          <div class="menu">
            <div class="header">
              <i class="tags icon"></i>
              Selecionar usuários
            </div>
            <div class="divider"></div>
            <div class="item">
              <i class="attention icon"></i>
              Inscrições
            </div>
            <div class="item">
              <i class="comment icon"></i>
              Estudantes
            </div>
          </div>
        </div>
        <button class="ui positive button left floated" id="filterButton">Filtrar</button>
        <button class="ui negative button right floated" id="signOutButton">Deslogar</button>
      </div>
      <div class="sixteen wide column">
        <table class="ui unstackable table">
          <?php
            require_once("listagem_organizador.php");
          ?>
        </table>
      </div>
    </div>

    <!-- Janelas modais -->
    <div class="ui modal">
      <i class="close icon"></i>
      <div class="header">
        Preview dos dados a serem criados do estudante selecionado!
      </div>
      <div class="content">
        <h4 id="rmEstudante">RM:  </h4>
        <h4 id="loginEstudante">Login:  </h4>
        <h4 id="nomeEstudante">Nome:  </h4>
        <h4 id="datanascimentoEstudante">Data de nascimento:  </h4>
        <h4 id="cursoEstudante">Curso:  </h4>
        <h4 id="foneEstudante">Fone:  </h4>
        <h4 id="enderecoEstudante">Endereço:  </h4>
        <h4 id="biografiaEstudante">Biografia:  </h4>
      </div>
      <div class="actions">
        <div class="ui buttons">
          <button class="ui positive button" id="confirmarInscricao">Confirmar</button>
          <button class="ui negative button" id="cancelarInscricao">Cancelar</button>  
        </div>
      </div>
    </div>

    <script src="css-js/jquery-3.3.1.min.js"></script>
    <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="css-js/js-aditional.js"></script>
    <script>
      $(".ui.icon").dropdown();
      $('.ui.accordion').accordion();

      $("#filterButton").click(function(){
        var userType = $(".ui.icon").dropdown('get text').trim().toLowerCase();
        var type = userType.toLowerCase();
        window.location.href = "http://localhost/projeto_grily/actions.php?action=selecionar_usuario&tipo=" + type;
      });
      $("#signOutButton").click(function(){
        window.location.href = "http://localhost/projeto_grily/actions.php?action=deslogar";
      });
      $("#confirmarInscricao").click(function(){
        window.location.href = "http://localhost/projeto_grily/painel_organizador.php?confirmar_inscricao=sim";
      });
      $("#cancelarInscricao").click(function(){
        window.location.href = "http://localhost/projeto_grily/painel_organizador.php?confirmar_inscricao=nao";
      });
    <?php
      if (isset($_GET["gerar_preview"]) && $_GET["gerar_preview"] == "sim") {
        echo " $('#rmEstudante').append(jsonDados.rm);";
        echo " $('#loginEstudante').append(jsonDados.login);";
        echo " $('#nomeEstudante').append(jsonDados.nome);";
        echo " $('#cursoEstudante').append(jsonDados.idcurso);";
        echo " $('#foneEstudante').append(jsonDados.fone);";
        echo " $('#enderecoEstudante').append(jsonDados.endereco);";
        echo " $('#biografiaEstudante').append(jsonDados.biografia);";
        echo " $('#datanascimentoEstudante').append(jsonDados.dtnascimento);";
        echo " $('.ui.modal').modal('show');";
      }
    ?>
    </script>
  </body>
</html>