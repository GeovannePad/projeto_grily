<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel Administrador</title>
  <link rel="stylesheet" href="css-js/Semantic-UI-CSS-master/semantic.min.css">
  <link rel="stylesheet" href="css-js/css-aditional.css">
</head>
  <?php
    require_once("config.php");
    if (!isset($_SESSION["administrador"])) {
      header("Location: plogin.php");
    }
  ?>

<body class="bg">

  <div class="ui grid container stackable">
    <div class="sixteen wide column">
      <div class="ui center aligned segment">
        <h4>Painel do administrador, seja bem vindo <?=$_SESSION["administrador"]["nome"]?></h4>
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
            Administradores
          </div>
          <div class="item">
            <i class="comment icon"></i>
            Organizadores
          </div>
          <div class="item">
            <i class="conversation icon"></i>
            Estudantes
          </div>
        </div>
      </div>
      <button class="ui positive button left floated" id="filterButton">Filtrar</button>
      <button class="ui negative button right floated" id="signOutButton">Deslogar</button>
      <button class="ui primary button right floated" id="addUserButton">Adicionar Usuário</button>
    </div>
    <div class="sixteen wide column">
      <table class="ui unstackable table">
        <?php
          require_once("listagem_administrador.php");
        ?>
      </table>
      
    </div>
  </div>

  <?php
    if (isset($_GET["preview_dados"]) && $_GET["preview_dados"] == "sim") {
      $idusuario = $_GET["idusuario"];
      $usuario = new Usuario();
      $dados = $usuario->selectUsuarioEstudanteById($idusuario);
      $dataConvert = new DateTime($dados[0]["dtregistro"]);
      $dataConvertida = $dataConvert->format("d-m-Y");
      $dados[0]["dtregistro"] = $dataConvertida;
      if ($dados[0]["imagem"] == "user-icon.png") {
        $_SESSION["imagemEstudante"] = "midia/" . $dados[0]["imagem"];
      } else {
        $_SESSION["imagemEstudante"] = "midia/imagens_estudantes/" . $dados[0]["imagem"];
      } 
      $dadosTratados = json_encode($dados);      
      echo "<script>var jsonDados = new Array(); jsonDados = $dadosTratados</script>";
    }
  ?>
    
  <!-- Janela Modais -->
  <div class="ui modal">
    <div id="dadosPHP" style="display:none;"><?=$dadosTratados?></div>
    <i class="close icon"></i>
    <div class="header">
      Dados do estudante
    </div>
    <div class="image content">
      <div class="ui medium circular image">
        <img src=<?= $_SESSION["imagemEstudante"] ?> alt="User perfil image" id="imagemEstudante">
      </div>
      <div class="description">
        <div class="ui header">Dados</div>
        <h4 id="nomeEstudante">Nome:  </h4>
        <h4 id="loginEstudante">Login:  </h4>
        <h4 id="dtregistroEstudante">Data de registro:  </h4>
      </div>
    </div>
    <div class="actions">
      <div class="ui black deny button">
        Sair
      </div>
    </div>
  </div>
  
  <script src="css-js/jquery-3.3.1.min.js"></script>
  <script src="css-js/Semantic-UI-CSS-master/semantic.min.js"></script>
  <script src="css-js/js-aditional.js"></script>
  <script>
    $(document).ready(function(){
      <?php
        if (isset($_GET["preview_dados"]) && $_GET["preview_dados"] == "sim") {
          echo " $('#nomeEstudante').append(jsonDados[0].nome);";
          echo " $('#loginEstudante').append(jsonDados[0].login);";
          echo " $('#dtregistroEstudante').append(jsonDados[0].dtregistro);";
          echo " $('.ui.modal').modal('show');";        
        }
      ?>
      $(".ui.icon").dropdown();
      $("#filterButton").click(function(){
        var userType = $(".ui.icon").dropdown('get text').trim().toLowerCase();
        var type = userType.toLowerCase();
        window.location.href = "http://localhost/projeto_grily/actions.php?action=selecionar_usuario&tipo=" + type;
      });
      $("#addUserButton").click(function(){
        window.location.href = "http://localhost/projeto_grily/pregistro.php";
      }); 
      $("#signOutButton").click(function(){
        window.location.href = "http://localhost/projeto_grily/actions.php?action=deslogar";
      });
      $('.ui.accordion').accordion();
      $('.userAccount').click(function(){
        // var id = $('.userAccount').attr("value");
        // window.location.href = "http://localhost/projeto_grily/painel_administrador.php?dados_estudante="+ id;
      });
      $('.ui.black.deny.button').click(function(){
        window.location.href = "http://localhost/projeto_grily/actions.php?action=selecionar_usuario&tipo=estudantes";
      });
    });
  </script>
</body>
</html>